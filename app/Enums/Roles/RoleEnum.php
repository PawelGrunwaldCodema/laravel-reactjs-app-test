<?php

namespace App\Enums\Roles;

use Spatie\Enum\Enum;

/**
 * @method static self author()
 * @method static self editor()
 * @method static self subscriber()
 * @method static self administrator()
 */
class RoleEnum extends Enum
{
    public static function allValues(): array
    {
        return [
            self::author()->value,
            self::editor()->value,
            self::subscriber()->value,
            self::administrator()->value,
        ];
    }
}
