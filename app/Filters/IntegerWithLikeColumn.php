<?php


namespace App\Filters;


use App\Filters\Contracts\IntegerFilterable;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class IntegerWithLikeColumn
 * @package App\Filters
 */
class IntegerWithLikeColumn implements IntegerFilterable
{
    public function filtration(Builder $builder, string $column, int $value): Builder
    {
        return $builder->where($column, 'LIKE', "%{$value}%");
    }
}
