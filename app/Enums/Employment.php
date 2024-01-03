<?php

namespace App\Enums;

enum Employment: string
{
    case PELNY_ETAT = 'Pełny etat';
    case CZESC_ETATU = 'Część etatu';
    case DODATKOWA = 'Dodatkowa';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
