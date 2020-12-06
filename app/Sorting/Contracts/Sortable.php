<?php


namespace App\Sorting\Contracts;


use Illuminate\Database\Eloquent\Builder;

interface Sortable
{
    public function make(Builder $builder): Builder;
}
