<?php


namespace App\Filters;


use App\Filters\Contracts\IntegerFilterable;
use Illuminate\Database\Eloquent\Builder;

class IntegerColumn implements IntegerFilterable
{
    public function filtration(Builder $builder, string $column, int $value): Builder
    {
        return $builder->where($column, $value);
    }
}
