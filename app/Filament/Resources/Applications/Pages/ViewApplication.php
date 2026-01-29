<?php

namespace App\Filament\Resources\Applications\Pages;

use App\Filament\Resources\Applications\ApplicationResource;
use App\Models\ApplicationFile;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use App\Enums\ApplicationFileType;
use App\Enums\ApplicationStatus;


class ViewApplication extends ViewRecord
{
    protected static string $resource = ApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // SETUJUI
            Action::make('setujui')
                ->label('Setujui')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->requiresConfirmation()
                // ->visible(fn () => $this->record->status === 'diproses')
                ->visible(fn () => $this->record->status === ApplicationStatus::DIPROSES->value)

                ->action(function (): void {
                    $this->record->update([
                        'status' => 'disetujui',
                        'alasan_penolakan' => null,
                    ]);

                    Notification::make()
                        ->title('Permohonan disetujui')
                        ->success()
                        ->send();
                }),

            // TOLAK
            Action::make('tolak')
                ->label('Tolak')
                ->color('danger')
                ->icon('heroicon-o-x-circle')
                // ->visible(fn () => $this->record->status === 'diproses')
                ->visible(fn () => $this->record->status === ApplicationStatus::DIPROSES->value)

                ->schema([
                    Textarea::make('alasan_penolakan')
                        ->label('Alasan Penolakan')
                        ->required()
                        ->rows(3),
                ])
                ->action(function (array $data): void {
                    $this->record->update([
                        'status' => 'ditolak',
                        'alasan_penolakan' => $data['alasan_penolakan'],
                    ]);

                    Notification::make()
                        ->title('Permohonan ditolak')
                        ->danger()
                        ->send();
                }),

            // UPLOAD SURAT JAWABAN (muncul setelah disetujui/ditolak)
            Action::make('uploadSuratJawaban')
                ->label('Upload Surat Jawaban')
                ->icon('heroicon-o-arrow-up-tray')
                ->visible(fn () => in_array($this->record->status, ['disetujui', 'ditolak'], true))
                ->schema([
                    FileUpload::make('file')
                        ->label('Surat Jawaban (PDF)')
                        ->required()
                        ->disk('public')
                        ->directory('applications/surat-jawaban')
                        ->acceptedFileTypes(['application/pdf'])
                        ->maxSize(4096),
                ])
                ->action(function (array $data): void {
                    $path = $data['file'];

                    ApplicationFile::updateOrCreate(
                        [
                            'application_id' => $this->record->id,
                            'type' => ApplicationFileType::SURAT_JAWABAN_IZIN->value,
                        ],
                        [
                            'path' => $path,
                            'original_name' => basename($path),
                            'uploaded_by' => 'admin',
                        ]
                    );

                    Notification::make()
                        ->title('Surat jawaban berhasil diupload')
                        ->success()
                        ->send();
                }),

            // UPLOAD SURAT SELESAI (muncul saat disetujui/selesai)
            Action::make('uploadSuratSelesai')
                ->label('Upload Surat Selesai')
                ->icon('heroicon-o-arrow-up-tray')
                ->visible(fn () => in_array($this->record->status, ['disetujui', 'selesai'], true))
                ->schema([
                    FileUpload::make('file')
                        ->label('Surat Selesai (PDF)')
                        ->required()
                        ->disk('public')
                        ->directory('applications/surat-selesai')
                        ->acceptedFileTypes(['application/pdf'])
                        ->maxSize(4096),
                ])
                ->action(function (array $data): void {
                    $path = $data['file'];

                    ApplicationFile::updateOrCreate(
                        [
                            'application_id' => $this->record->id,
                            'type' => ApplicationFileType::SURAT_KETERANGAN_SELESAI->value,

                        ],
                        [
                            'path' => $path,
                            'original_name' => basename($path),
                            'uploaded_by' => 'admin',
                        ]
                    );

                    Notification::make()
                        ->title('Surat selesai berhasil diupload')
                        ->success()
                        ->send();
                }),

            // SELESAI (hanya boleh kalau surat selesai sudah ada)
            Action::make('selesai')
                ->label('Tandai Selesai')
                ->color('primary')
                ->icon('heroicon-o-flag')
                ->requiresConfirmation()
                ->visible(function (): bool {
                    if ($this->record->status !== 'disetujui') {
                        return false;
                    }

                    return ApplicationFile::query()
                        ->where('application_id', $this->record->id)
                        ->where('type', ApplicationFileType::SURAT_KETERANGAN_SELESAI->value)
                        ->exists();
                })
                ->action(function (): void {
                    $this->record->update([
                        'status' => ApplicationStatus::SELESAI->value,
                    ]);

                    Notification::make()
                        ->title('Permohonan ditandai selesai')
                        ->success()
                        ->send();
                }),
        ];
    }

    public function getTitle(): string
    {
        return 'Permohonan dari ' . $this->record->user->name;
    }

}
