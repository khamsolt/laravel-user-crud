<?php

namespace App\Enums\User;

use Spatie\Enum\Laravel\Enum;

/**
 * Class Male
 * @package App\Enums\User
 *
 * @method static self MALE()
 * @method static self FEMALE()
 */
final class Gender extends \App\Enums\Enum
{
    protected static function values(): array
    {
        return [
            'MALE' => 'male',
            'FEMALE' => 'female'
        ];
    }

    protected static function labels(): array
    {
        return [
            'MALE' => __('Male'),
            'FEMALE' => __('Female'),
        ];
    }
}
