<?php

namespace App\Enums\User;

use Spatie\Enum\Laravel\Enum;

/**
 * Class Status
 * @package App\Enums\User
 *
 * @method static self DEFAULT()
 * @method static self ACTIVE()
 * @method static self INACTIVE()
 */
final class Status extends Enum
{
    protected static function values(): array
    {
        return [
            'DEFAULT' => 0,
            'ACTIVE' => 1,
            'INACTIVE' => 2
        ];
    }

    protected static function labels(): array
    {
        return [
            'DEFAULT' => __('Default'),
            'ACTIVE' => __('Active'),
            'INACTIVE' => __('Inactive')
        ];
    }
}
