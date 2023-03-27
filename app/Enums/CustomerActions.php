<?php

namespace App\Enums;

enum CustomerActions:string {
    case Call = 'call';
    case Visit = 'visit';
    case FollowUp = 'followup';

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}