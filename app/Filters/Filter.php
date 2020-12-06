<?php

namespace App\Filters;

use App\Filters\Contracts\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class Filter
 * @package App\Filters
 */
abstract class Filter
{
    /** @var Request */
    protected $request;
    /** @var array */
    protected $filters = [];

    /**
     * Filter constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function make(Builder $builder): Builder
    {
        foreach ($this->getColumnKeys() as $key => $value) {
            $this->resolveFilter($key)->filtration($builder, $key, $value);
        }
        return $builder;
    }

    /**
     * @return array
     */
    protected function getColumnKeys(): array
    {
        return array_filter($this->request->only(array_keys($this->filters)), function ($value) {
            return ($value !== null && $value !== '');
        });
    }

    /**
     * @param string $filter
     * @return Filterable
     */
    protected function resolveFilter(string $filter): Filterable
    {
        return new $this->filters[$filter];
    }
}
