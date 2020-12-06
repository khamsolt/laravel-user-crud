<?php


namespace App\Filters;


use App\Filters\Contracts\StringFilterable;
use Illuminate\Database\Eloquent\Builder;

class StringWithLikeColumn implements StringFilterable
{

    /**
     * @inheritDoc
     */
    public function filtration(Builder $builder, string $column, string $value): Builder
    {
        return $builder->where($column, 'LIKE', "%{$value}%");
    }
}
