<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PaymentType: string implements HasLabel
{
    case HBRUTTO = 'brutto/godz';
    case MBRUTTO = 'brutto/mies';
    case HNETTO = 'netto/godz';
    case MNETTO = 'netto/mies';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::HBRUTTO => 'Brutto/Godz',
            self::MBRUTTO => 'Brutto/Mies',
            self::HNETTO => 'Netto/Mies',
            self::MNETTO => 'Netto/Godz'
        };
    }

}
