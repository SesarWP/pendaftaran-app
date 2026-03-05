<?php

namespace App\Filament\Resources\RegistrationRequirements;

use App\Filament\Resources\RegistrationRequirements\Pages\CreateRegistrationRequirement;
use App\Filament\Resources\RegistrationRequirements\Pages\EditRegistrationRequirement;
use App\Filament\Resources\RegistrationRequirements\Pages\ListRegistrationRequirements;
use App\Models\RegistrationRequirement;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RegistrationRequirementResource extends Resource
{
    protected static ?string $model = RegistrationRequirement::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'Edit Persyaratan';
    protected static ?string $modelLabel = 'Persyaratan';
    protected static ?string $pluralModelLabel = 'Persyaratan';
    protected static string|\UnitEnum|null $navigationGroup = 'Konten Halaman';
    protected static ?int $navigationSort = 20;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('category')
                ->label('Kategori')
                ->options([
                    'Pelajar' => 'Pelajar',
                    'Mahasiswa' => 'Mahasiswa',
                    'Tips' => 'Tips',
                ])
                ->required(),

            TextInput::make('title')
                ->label('Judul')
                ->required()
                ->maxLength(255),

            Textarea::make('content')
                ->label('Konten (boleh menggunakan tag HTML)')
                ->required()
                ->rows(6)
                ->columnSpanFull(),

            TextInput::make('sort_order')
                ->label('Urutan')
                ->numeric()
                ->default(0)
                ->required(),

            Toggle::make('is_active')
                ->label('Aktif')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable()
                    ->width('60px'),

                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->sortable(),

                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->wrap(),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRegistrationRequirements::route('/'),
            'create' => CreateRegistrationRequirement::route('/create'),
            'edit' => EditRegistrationRequirement::route('/{record}/edit'),
        ];
    }
}
