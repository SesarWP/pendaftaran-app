<?php

namespace App\Filament\Resources\RegistrationRequirements\Pages;

use App\Filament\Resources\RegistrationRequirements\RegistrationRequirementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRegistrationRequirements extends ListRecords
{
    protected static string $resource = RegistrationRequirementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
