<?php

namespace App\Filament\Resources\WorkmodeResource\Pages;

use App\Filament\Resources\WorkModeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageWorkModes extends ManageRecords
{
    protected static string $resource = WorkModeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
