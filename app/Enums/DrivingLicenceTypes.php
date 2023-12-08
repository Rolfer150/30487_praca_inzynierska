<?php

namespace App\Enums;

enum DrivingLicenceTypes: string
{
    case AM = 'kat. AM';
    case A1 = 'kat. A1';
    case A2 = 'kat. A2';
    case A = 'kat. A';
    case B1 = 'kat. B1';
    case B = 'kat. B';
    case BE = 'kat. BE';
    case C1 = 'kat. C1';
    case C1E = 'kat. C1E';
    case C = 'kat. C';
    case CE = 'kat. CE';
    case D1 = 'kat. D1';
    case D1E = 'kat. D1E';
    case D = 'kat. D';
    case DE = 'kat. DE';
    case T = 'kat. T';
    case L = 'kat. L';
    case S = 'kat. S';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
