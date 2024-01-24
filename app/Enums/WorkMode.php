<?php

namespace App\Enums;

enum WorkMode: string
{
    case PRACA_STACJONARNA = 'Praca stacjonarna';
    case PRACA_ZDAlNA = 'Praca zdalna';
    case PRACA_HYBRYDOWA = 'Praca hybrydowa';
    case PRACA_MOBILNA = 'Praca mobilna';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
