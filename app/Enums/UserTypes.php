<?php

namespace App\Enums;

enum UserTypes:string {
    case Admin = 'admin';
    case Employee = 'employee';

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}