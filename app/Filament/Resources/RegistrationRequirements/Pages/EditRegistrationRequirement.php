<?php

namespace App\Filament\Resources\RegistrationRequirements\Pages;

use App\Filament\Resources\RegistrationRequirements\RegistrationRequirementResource;
use Filament\Resources\Pages\EditRecord;

class EditRegistrationRequirement extends EditRecord
{
    protected static string $resource = RegistrationRequirementResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
