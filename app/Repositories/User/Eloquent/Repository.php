<?php


namespace App\Repositories\User\Eloquent;


use App\Models\User;
use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Support\Collection;

class Repository implements RepositoryInterface
{
    public function all(array $columns, int $limit = 20, int $offset = 0): Collection
    {
        return User::select($columns)
            ->latest()
            ->limit($limit)
            ->offset($offset)
            ->get();
    }

    public function find(int $id, array $columns): User
    {
        return User::findOrFail($id, $columns);
    }
}
