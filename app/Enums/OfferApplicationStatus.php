<?php

namespace App\Enums;

enum OfferApplicationStatus: string
{
    case DELIVERED = 'dostarczono';
    case CONSIDERED = 'rozpatrywany';
    case REJECTED = 'odrzucony';
    case ANNULLED = 'anulowany';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
