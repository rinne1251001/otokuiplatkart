<?php

namespace App\Enums;

enum ArticleCategory: string
{
    case Foreign  = 'foreign';
    case Domestic = 'domestic';
    case Others   = 'others';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}