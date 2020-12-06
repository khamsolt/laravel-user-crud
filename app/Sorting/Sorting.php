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

    /** @var Request */
    protected $request;
    /** @var array */
    protected $columns = [];
    /** @var array */
    protected $options = [
        'up' => 'desc',
        'down' => 'asc',
    ];
    /** @var string */
    protected $key;
    /** @var string */
    protected $direction;

    /**
     * Sorting constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return bool
     */
    protected function validate(): bool
    {
        return in_array($this->getKey(), $this->columns, true) && array_key_exists($this->getValue(), $this->options);
    }

    /**
     * @return array
     */
    protected function getKey(): string
    {
        return $this->key ?? $this->request->get(self::KEY, '');
    }

    /**
     * @return string
     */
    protected function getValue(): string
    {
        return $this->direction ?? $this->request->get(self::VALUE, '');
    }

    /**
     * @return string
     */
    protected function getDirection(): string
    {
        return $this->options[$this->getValue()];
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function make(Builder $builder): Builder
    {
        if ($this->validate()) {
            return $builder->orderBy($this->getKey(), $this->getDirection());
        }
        return $builder;
    }
}
