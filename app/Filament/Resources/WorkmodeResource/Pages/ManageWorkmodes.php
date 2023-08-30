<?php

namespace App\Filament\Resources\WorkmodeResource\Pages;

use App\Filament\Resources\WorkmodeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageWorkmodes extends ManageRecords
{
    protected static string $resource = WorkmodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
