<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class UserGuide extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationLabel = 'Panduan Pengguna';
    protected static ?string $title = 'Panduan Pengguna';
    protected static ?int $navigationSort = 99;

    public function getView(): string
    {
        return 'filament.pages.user-guide';
    }
}
