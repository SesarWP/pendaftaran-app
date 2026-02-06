<?php

namespace App\Filament\Pages;

use App\Models\Application;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class InternshipReport extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-chart-bar';
    // Tidak pakai navigationGroup supaya sejajar dengan menu lain
    protected static ?string $navigationLabel = 'Laporan Magang';
    protected static ?string $title = 'Laporan Magang';
    protected static ?int $navigationSort = 20;

    public function getView(): string
    {
        return 'filament.pages.internship-report';
    }

    public function mount(): void
    {
        $this->tableFilters = [
            'periode' => [
                'from' => now()->startOfMonth()->toDateString(),
                'to'   => now()->endOfMonth()->toDateString(),
            ],
            'durasi' => ['value' => 'all'],
            'kategori' => ['value' => 'all'],
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->query($this->baseQuery())
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Nama')->searchable()->wrap(),
                Tables\Columns\TextColumn::make('kategori')->label('Kategori')->badge(),
                Tables\Columns\TextColumn::make('institusi')->label('Institusi')->wrap(),
                Tables\Columns\TextColumn::make('jurusan')->label('Jurusan')->wrap(),
                Tables\Columns\TextColumn::make('opd.nama')->label('OPD')->wrap(),
                Tables\Columns\TextColumn::make('tanggal_mulai')->label('Mulai')->date('d M Y'),
                Tables\Columns\TextColumn::make('tanggal_selesai')->label('Selesai')->date('d M Y'),
                Tables\Columns\TextColumn::make('durasi_bulan')
                    ->label('Durasi (bulan)')
                    ->state(function (Application $record) {
                        $start = Carbon::parse($record->tanggal_mulai);
                        $end   = Carbon::parse($record->tanggal_selesai);
                        return $start->diffInMonths($end) ?: 0;
                    }),
                Tables\Columns\TextColumn::make('status')->label('Status')->badge(),
            ])
            ->filters([
                Tables\Filters\Filter::make('periode')
                    ->form([
                        DatePicker::make('from')->label('Dari')->native(false),
                        DatePicker::make('to')->label('Sampai')->native(false),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        if (blank($data['from']) && blank($data['to'])) {
                            return $query;
                        }

                        $from = filled($data['from']) ? Carbon::parse($data['from'])->startOfDay() : null;
                        $to   = filled($data['to']) ? Carbon::parse($data['to'])->endOfDay() : null;

                        // Overlap: mulai <= to AND selesai >= from
                        if ($from && $to) {
                            return $query
                                ->whereDate('tanggal_mulai', '<=', $to)
                                ->whereDate('tanggal_selesai', '>=', $from);
                        }

                        if ($from) {
                            return $query->whereDate('tanggal_selesai', '>=', $from);
                        }

                        return $query->whereDate('tanggal_mulai', '<=', $to);
                    }),

                Tables\Filters\Filter::make('durasi')
                    ->form([
                        Select::make('value')
                            ->label('Durasi (bulan)')
                            ->options(fn () => $this->durationOptions())
                            ->searchable()
                            ->default('all'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        $value = $data['value'] ?? 'all';

                        if ($value === 'all') {
                            return $query;
                        }

                        return $query->whereRaw(
                            'TIMESTAMPDIFF(MONTH, tanggal_mulai, tanggal_selesai) = ?',
                            [(int) $value]
                        );
                    }),

                Tables\Filters\Filter::make('kategori')
                    ->form([
                        Select::make('value')
                            ->label('Kategori')
                            ->options([
                                'all' => 'Semua',
                                'mahasiswa' => 'Mahasiswa',
                                'smk' => 'SMK',
                            ])
                            ->default('all'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        $value = $data['value'] ?? 'all';
                        return $value === 'all' ? $query : $query->where('kategori', $value);
                    }),
            ])
            ->headerActions([
                Action::make('download')
                    ->label('Download CSV')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(fn () => $this->downloadCsv()),
            ])
            ->defaultSort('tanggal_mulai', 'desc');
    }

    protected function baseQuery(): Builder
    {
        return Application::query()->with(['user', 'opd']);
    }

    protected function durationOptions(): array
    {
        $durations = Application::query()
            ->selectRaw('DISTINCT TIMESTAMPDIFF(MONTH, tanggal_mulai, tanggal_selesai) AS durasi')
            ->orderBy('durasi')
            ->pluck('durasi')
            ->filter(fn ($v) => $v !== null)
            ->values()
            ->all();

        $options = ['all' => 'Semua'];
        foreach ($durations as $d) {
            $options[(string) $d] = $d . ' bulan';
        }

        return $options;
    }

    protected function downloadCsv()
    {
        $records = $this->getFilteredTableQuery()
            ->with(['user', 'opd'])
            ->get();

        $rows = $records->map(function (Application $a) {
            $start  = Carbon::parse($a->tanggal_mulai);
            $end    = Carbon::parse($a->tanggal_selesai);
            $months = $start->diffInMonths($end) ?: 0;

            return [
                'Nama' => $a->user?->name,
                'Kategori' => $a->kategori,
                'Institusi' => $a->institusi,
                'Jurusan' => $a->jurusan,
                'OPD' => $a->opd?->nama,
                'Mulai' => $start->format('Y-m-d'),
                'Selesai' => $end->format('Y-m-d'),
                'Durasi (bulan)' => $months,
                'Status' => $a->status,
            ];
        });

        $filters = $this->tableFilters['periode'] ?? [];
        $from = $filters['from'] ?? null;
        $to   = $filters['to'] ?? null;

        $suffix = ($from && $to) ? ($from . '_sd_' . $to) : now()->format('Ymd');
        $filename = 'laporan-magang-' . $suffix . '-' . now()->format('His') . '.csv';

        $delimiter = ';'; // Excel-friendly di banyak locale Indonesia

        return response()->streamDownload(function () use ($rows, $delimiter) {
            $out = fopen('php://output', 'w');

            // UTF-8 BOM biar Excel aman
            fwrite($out, "\xEF\xBB\xBF");

            $header = array_keys($rows->first() ?? [
                'Nama' => null, 'Kategori' => null, 'Institusi' => null, 'Jurusan' => null, 'OPD' => null,
                'Mulai' => null, 'Selesai' => null, 'Durasi (bulan)' => null, 'Status' => null,
            ]);

            fputcsv($out, $header, $delimiter);

            foreach ($rows as $row) {
                fputcsv($out, array_values($row), $delimiter);
            }

            fclose($out);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
