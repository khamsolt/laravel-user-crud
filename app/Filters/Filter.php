<?php

namespace App\Filters;

use App\Filters\Contracts\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


abstract class Filter
{
    protected Request $request;
    protected array $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function make(Builder $builder): Builder
    {
        foreach ($this->getColumnKeys() as $key => $value) {
            $this->resolveFilter($key)->filtration($builder, $key, $value);
        }
        return $builder;
    }

    protected function getColumnKeys(): array
    {
        return array_filter($this->request->only(array_keys($this->filters)), function ($value) {
            return ($value !== null && $value !== '');
        });
    }

    protected function resolveFilter(string $filter): Filterable
    {
        return new $this->filters[$filter];
    }
}
