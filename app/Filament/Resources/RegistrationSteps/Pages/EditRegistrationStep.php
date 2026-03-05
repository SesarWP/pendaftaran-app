<?php

namespace App\Filament\Resources\RegistrationSteps\Pages;

use App\Filament\Resources\RegistrationSteps\RegistrationStepResource;
use Filament\Resources\Pages\EditRecord;

class EditRegistrationStep extends EditRecord
{
    protected static string $resource = RegistrationStepResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
