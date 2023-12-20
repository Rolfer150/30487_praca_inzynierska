<?php

namespace App\Enums;

enum ProgrammingSkills: string
{
    case PYTHON = 'Python';
    case CPLUSPLUS = 'C++';
    case JAVA = 'Java';
    case JAVASCRIPT = 'Javascript';
    case GIT = 'Git';
    case DOCKER = 'Docker';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
