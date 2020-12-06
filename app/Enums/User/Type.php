<?php

namespace App\Enums\User;

use Spatie\Enum\Laravel\Enum;

/**
 * Class Type
 * @package App\Enums\User
 *
 * @method static self DEFAULT()
 * @method static self CUSTOMER()
 * @method static self STAFF()
 * @method static self MANAGER()
 *
 */
final class Type extends Enum
{
    protected static function values(): array
    {
        return [
            'DEFAULT' => 0,
            'CUSTOMER' => 1,
            'STAFF' => 2,
            'MANAGER' => 3,
        ];
    }

    protected static function labels(): array
    {
        return [
            'DEFAULT' => __('Default'),
            'CUSTOMER' => __('Customer'),
            'STAFF' => __('Staff'),
            'MANAGER' => __('Manager')
        ];
    }
}
