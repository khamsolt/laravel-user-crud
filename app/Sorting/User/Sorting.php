<?php


namespace App\Sorting\User;


use App\Sorting\Sorting as BaseSorting;

class Sorting extends BaseSorting
{
    protected array $columns = [
        'id',
        'firstname',
        'lastname',
        'email',
        'status',
        'type',
        'created_at',
    ];
}
