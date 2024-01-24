<?php

namespace App\Enums;

enum SkillLevel: int
{
    case FIRST = 1;
    case SECOND = 2;
    case THIRD = 3;
    case FOURTH = 4;
    case FIFTH = 5;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
