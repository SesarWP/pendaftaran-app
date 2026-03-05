<?php

namespace App\Filament\Resources\RegistrationSteps\Pages;

use App\Filament\Resources\RegistrationSteps\RegistrationStepResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRegistrationStep extends CreateRecord
{
    protected static string $resource = RegistrationStepResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
