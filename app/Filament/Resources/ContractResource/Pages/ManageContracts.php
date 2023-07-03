<?php

namespace App\Filament\Resources\ContractResource\Pages;

use App\Filament\Resources\ContractResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageContracts extends ManageRecords
{
    protected static string $resource = ContractResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
