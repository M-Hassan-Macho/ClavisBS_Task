<?php

namespace App\Enums;

enum CustomerFeedback:string {
    case Satisfied = 'satisfied';
    case NotSatisfied = 'notsatisfied';

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}