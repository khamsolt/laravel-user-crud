<?php


namespace App\Filters\Contracts;


use Illuminate\Database\Eloquent\Builder;

/**
 * Interface StringFilterable
 * @package App\Filters\Contracts
 */
interface StringFilterable extends Filterable
{
    /**
     * @param Builder $builder
     * @param string $column
     * @param string $value
     * @return Builder
     */
    public function filtration(Builder $builder, string $column, string $value): Builder;
}
