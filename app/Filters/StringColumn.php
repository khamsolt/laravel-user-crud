<?php


namespace App\Filters;


use App\Filters\Contracts\StringFilterable;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class StringColumn
 * @package App\Filters
 */
class StringColumn implements StringFilterable
{
    public function filtration(Builder $builder, string $column, string $value): Builder
    {
        return $builder->where($column, $value);
    }
}
