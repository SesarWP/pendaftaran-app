<?php

namespace App\Filament\Resources\Applications\Pages;

use App\Enums\ApplicationStatus;
use App\Filament\Resources\Applications\ApplicationResource;
use App\Models\Application;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListApplications extends ListRecords
{
    protected static string $resource = ApplicationResource::class;

    protected function getHeaderActions(): array
    {
        // hitung badge (biar mirip contoh)
        $countAll = Application::count();
        $countDiproses = Application::where('status', ApplicationStatus::DIPROSES->value)->count();
        $countDitolak = Application::where('status', ApplicationStatus::DITOLAK->value)->count();
        $countDisetujui = Application::where('status', ApplicationStatus::DISETUJUI->value)->count();
        $countSelesai = Application::where('status', ApplicationStatus::SELESAI->value)->count();

        return [
            Action::make('semua')
                ->label("Semua Permohonan ({$countAll})")
                ->url(fn () => static::getUrl())
                ->color(request('status') ? 'gray' : 'primary'),

            Action::make('diproses')
                ->label("Diproses ({$countDiproses})")
                ->url(fn () => static::getUrl(['status' => ApplicationStatus::DIPROSES->value]))
                ->color(request('status') === ApplicationStatus::DIPROSES->value ? 'primary' : 'gray'),

            Action::make('ditolak')
                ->label("Ditolak ({$countDitolak})")
                ->url(fn () => static::getUrl(['status' => ApplicationStatus::DITOLAK->value]))
                ->color(request('status') === ApplicationStatus::DITOLAK->value ? 'primary' : 'gray'),

            Action::make('disetujui')
                ->label("Disetujui ({$countDisetujui})")
                ->url(fn () => static::getUrl(['status' => ApplicationStatus::DISETUJUI->value]))
                ->color(request('status') === ApplicationStatus::DISETUJUI->value ? 'primary' : 'gray'),

            Action::make('selesai')
                ->label("Selesai ({$countSelesai})")
                ->url(fn () => static::getUrl(['status' => ApplicationStatus::SELESAI->value]))
                ->color(request('status') === ApplicationStatus::SELESAI->value ? 'primary' : 'gray'),
        ];
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Belum ada permohonan';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Permohonan magang / PKL dari user akan muncul di sini.';
    }

    // inilah pengganti getTabs(): filter berdasarkan query string
    protected function getTableQuery(): Builder
    {
        $query = parent::getTableQuery();

        $status = request()->query('status');

        if ($status) {
            $query->where('status', $status);
        }

        return $query;
    }
}
