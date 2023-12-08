<?php

namespace App\Enums;

enum EducationalStage: string
{
    case PRIMARY_EDUCATION = 'wykształcenie podstawowe';
    case VOCATIONAL_EDUCATION = 'wykształcenie zasadnicze zawodowe';
    case BRANCH_EDUCATION = 'wykształcenie branżowe';
    case SECONDARY_BRANCH_EDUCATION = 'wykształcenie średnie branżowe';
    case SECONDARY_EDUCATION = 'wykształcenie średnie';
    case HIGHER_EDUCATION = 'wykształcenie wyższe';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
