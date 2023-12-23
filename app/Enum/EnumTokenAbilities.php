<?php

namespace App\Enum;

enum EnumTokenAbilities
{
    const DELETE = 'delete';
    const USER = 'user';
    const ADMIN = 'admin';


    static function server(string ...$abilities): string
    {
        return 'server:' . implode(',', $abilities);
    }

    /** token has all of the listed abilities */
    static function abilities(string ...$abilities): string
    {
        return 'abilities:' . implode(',', $abilities);
    }

    /** token has at least one of the listed abilities */
    static function ability(string ...$abilities): string
    {
        return 'ability:' . implode(',', $abilities);
    }
}
