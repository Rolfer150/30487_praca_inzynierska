<?php

namespace App\Enums;

enum QuestionType: string
{
    case MULTI_OPTIONS = 'multipleOptions';
    case ONE_OPTION = 'oneOption';
    case OWN_ANSWER = 'ownAnswer';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
