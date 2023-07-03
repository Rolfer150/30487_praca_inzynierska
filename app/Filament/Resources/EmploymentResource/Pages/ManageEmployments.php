<?php

namespace App\Filament\Resources\EmploymentResource\Pages;

use App\Filament\Resources\EmploymentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageEmployments extends ManageRecords
{
    protected static string $resource = EmploymentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
