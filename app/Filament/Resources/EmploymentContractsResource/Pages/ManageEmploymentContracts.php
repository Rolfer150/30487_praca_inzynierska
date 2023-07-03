<?php

namespace App\Filament\Resources\EmploymentContractsResource\Pages;

use App\Filament\Resources\EmploymentContractResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageEmploymentContracts extends ManageRecords
{
    protected static string $resource = EmploymentContractResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
