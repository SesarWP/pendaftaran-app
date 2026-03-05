<?php

namespace App\Filament\Resources\RegistrationSteps;

use App\Filament\Resources\RegistrationSteps\Pages\CreateRegistrationStep;
use App\Filament\Resources\RegistrationSteps\Pages\EditRegistrationStep;
use App\Filament\Resources\RegistrationSteps\Pages\ListRegistrationSteps;
use App\Models\RegistrationStep;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RegistrationStepResource extends Resource
{
    protected static ?string $model = RegistrationStep::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $navigationLabel = 'Edit Alur Pendaftaran';
    protected static ?string $modelLabel = 'Alur Pendaftaran';
    protected static ?string $pluralModelLabel = 'Alur Pendaftaran';
    protected static string|\UnitEnum|null $navigationGroup = 'Konten Halaman';
    protected static ?int $navigationSort = 10;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('step_number')
                ->label('Nomor Langkah')
                ->numeric()
                ->default(1)
                ->required(),

            TextInput::make('title')
                ->label('Judul Langkah')
                ->required()
                ->maxLength(255),

            Textarea::make('description')
                ->label('Deskripsi')
                ->required()
                ->rows(3)
                ->columnSpanFull(),

            Toggle::make('is_active')
                ->label('Aktif')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('step_number')
                    ->label('No.')
                    ->sortable()
                    ->width('60px'),

                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->wrap(),

                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(60)
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
            ->defaultSort('step_number')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRegistrationSteps::route('/'),
            'create' => CreateRegistrationStep::route('/create'),
            'edit' => EditRegistrationStep::route('/{record}/edit'),
        ];
    }
}
