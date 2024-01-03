<?php

namespace App\Enums;

enum Contract: string
{
    case UMOWA_O_PRACE = 'Umowa o pracę';
    case UMOWA_O_DZIELO = 'Umowa o dzieło';
    case UMOWA_ZLECENIE = 'Umowa zlecenie';
    case UMOWA_O_STAZ_PRAKTYKI = 'Umowa o staż/praktyki';
    case UMOWA_AGENCYJNA = 'Umowa agencyjna';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
