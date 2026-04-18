<?php

namespace App\Enums;

enum ArticleSubCategory: string
{
    case Travelogue = 'travelogue';
    case Location   = 'location';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}