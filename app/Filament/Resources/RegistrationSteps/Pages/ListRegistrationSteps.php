<?php

namespace App\Filament\Resources\RegistrationSteps\Pages;

use App\Filament\Resources\RegistrationSteps\RegistrationStepResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRegistrationSteps extends ListRecords
{
    protected static string $resource = RegistrationStepResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
