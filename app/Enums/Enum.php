<?php


namespace App\Enums;


class Enum extends \Spatie\Enum\Laravel\Enum
{
    public function __toString(): string
    {
        return $this->label;
    }
}
