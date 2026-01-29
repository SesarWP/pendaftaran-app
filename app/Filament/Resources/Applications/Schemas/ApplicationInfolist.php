<?php

namespace App\Filament\Resources\Applications\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\ViewEntry;


class ApplicationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label('Nama Pemohon'),

                TextEntry::make('user.email')
                    ->label('Email'),

                TextEntry::make('opd.nama')
                    ->label('OPD Tujuan'),

                TextEntry::make('kategori')
                    ->label('Kategori')
                    ->formatStateUsing(fn (?string $state) => match ($state) {
                        'mahasiswa' => 'Mahasiswa',
                        'smk' => 'SMK',
                        default => $state,
                    }),

                TextEntry::make('institusi')
                    ->label('Institusi / Sekolah'),

                TextEntry::make('jurusan')
                    ->label('Jurusan')
                    ->placeholder('-'),

                TextEntry::make('telepon')
                    ->label('Telepon')
                    ->placeholder('-'),

                TextEntry::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->date('d M Y'),

                TextEntry::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->date('d M Y'),

                TextEntry::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn (?string $state) => match ($state) {
                        'diproses' => 'Diproses',
                        'disetujui' => 'Disetujui',
                        'ditolak' => 'Ditolak',
                        'selesai' => 'Selesai',
                        default => $state,
                    }),

                // Download Surat Jawaban (Filament v4: pakai HtmlString + ->html())
                TextEntry::make('surat_jawaban_link')
                    ->label('Surat Jawaban')
                    ->state(function ($record) {
                        $file = $record->fileByType(\App\Enums\ApplicationFileType::SURAT_JAWABAN_IZIN->value);

                        if (! $file?->path) {
                            return '-';
                        }

                        // $url = Storage::disk('public')->url($file->path);
                        $url = asset('storage/' . ltrim($file->path, '/'));


                        return new HtmlString(
                            '<a href="'.$url.'" target="_blank" rel="noopener" class="underline">
                                Download Surat Jawaban
                            </a>'
                        );
                    })
                    ->html(),

                // Download Surat Selesai (Filament v4: tanpa ->url())
                TextEntry::make('surat_selesai_link')
                    ->label('Surat Selesai')
                    ->state(function ($record) {
                        $file = $record->fileByType(\App\Enums\ApplicationFileType::SURAT_SELESAI->value);

                        if (! $file?->path) {
                            return '-';
                        }

                        // $url = Storage::disk('public')->url($file->path);
                        $url = asset('storage/' . ltrim($file->path, '/'));


                        return new HtmlString(
                            '<a href="'.$url.'" target="_blank" rel="noopener" class="underline">
                                Download Surat Selesai
                            </a>'
                        );
                    })
                    ->html(),

                TextEntry::make('alasan_penolakan')
                    ->label('Alasan Penolakan')
                    ->placeholder('-'),

                TextEntry::make('catatan_persetujuan')
                    ->label('Catatan Persetujuan')
                    ->placeholder('-'),

                TextEntry::make('catatan_admin')
                    ->label('Catatan Admin')
                    ->placeholder('-'),

                TextEntry::make('created_at')
                    ->label('Diajukan')
                    ->dateTime('d M Y H:i'),

                TextEntry::make('updated_at')
                    ->label('Terakhir diubah')
                    ->dateTime('d M Y H:i'),
            ]);
    }
}
