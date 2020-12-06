<?php


namespace App\Sorting;


use App\Sorting\Contracts\Sortable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class Sorting
 * @package App\Sorting
 */
class Sorting implements Sortable
{
    protected const KEY = 'sort';
    protected const VALUE = 'direction';

    protected Request $request;
    protected array $columns = [];
    protected array $options = [
        'up' => 'desc',
        'down' => 'asc',
    ];
    protected string $key;
    protected string $direction;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function validate(): bool
    {
        return in_array($this->getKey(), $this->columns, true) && array_key_exists($this->getValue(), $this->options);
    }

    protected function getKey(): string
    {
        return $this->key ?? $this->request->get(self::KEY, '');
    }

    protected function getValue(): string
    {
        return $this->direction ?? $this->request->get(self::VALUE, '');
    }

    protected function getDirection(): string
    {
        return $this->options[$this->getValue()];
    }

    public function make(Builder $builder): Builder
    {
        if ($this->validate()) {
            return $builder->orderBy($this->getKey(), $this->getDirection());
        }
        return $builder;
    }
}
