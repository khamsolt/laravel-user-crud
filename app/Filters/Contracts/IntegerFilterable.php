<?php


namespace App\Filters\Contracts;


use Illuminate\Database\Eloquent\Builder;

/**
 * Interface IntegerFilterable
 * @package App\Filters\Contracts
 */
interface IntegerFilterable extends Filterable
{
    /**
     * @param Builder $builder
     * @param string $column
     * @param int $value
     * @return Builder
     */
    public function filtration(Builder $builder, string $column, int $value): Builder;
}
