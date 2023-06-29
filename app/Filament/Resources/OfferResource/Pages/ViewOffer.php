<?php

namespace App\Filament\Resources\OfferResource\Pages;

use App\Filament\Resources\OfferResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOffer extends ViewRecord
{
    protected static string $resource = OfferResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
