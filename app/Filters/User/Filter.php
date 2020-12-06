<?php


namespace App\Filters\User;


use App\Filters\Filter as BaseFilter;
use App\Filters\IntegerColumn;
use App\Filters\IntegerWithLikeColumn;
use App\Filters\StringWithLikeColumn;

/**
 * Class UserFilter
 * @package App\Filters\User
 */
class Filter extends BaseFilter
{
    /**
     * @var array
     */
    protected $filters = [
        'id' => IntegerWithLikeColumn::class,
        'firstname' => StringWithLikeColumn::class,
        'lastname' => StringWithLikeColumn::class,
        'email' => StringWithLikeColumn::class,
        'type' => IntegerColumn::class,
        'status' => IntegerColumn::class,
    ];
}
