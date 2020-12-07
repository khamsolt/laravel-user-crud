<?php

namespace App\Enums\User;

use Spatie\Enum\Laravel\Enum;

/**
 * Class Mode
 * @package App\Enums\User
 *
 * @method static self DEFAULT()
 * @method static self DEVELOPER()
 * @method static self TESTER()
 * @method static self OWNER()
 */
final class Mode extends \App\Enums\Enum
{
    protected static function values(): array
    {
        return [
            'DEFAULT' => 0,
            'DEVELOPER' => 1,
            'TESTER' => 2,
            'OWNER' => 3,
        ];
    }

    protected static function labels(): array
    {
        return [
            'DEFAULT' => __('Default'),
            'DEVELOPER' => __('Developer'),
            'TESTER' => __('Tester'),
            'OWNER' => __('Owner'),
        ];
    }
}
