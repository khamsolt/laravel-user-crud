<?php


namespace App\Services\User\Eloquent;


use App\Models\User;
use App\Repositories\User\Eloquent\Repository as UserRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CrudService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $data): User
    {
        $user = User::make($data);
        $user->password = Hash::make($data['password']);
        $user->setRememberToken(Str::random(10));
        $user->sendEmailVerificationNotification();
        return $user;
    }

    public function update(int $id, array $data): User
    {
        $user = $this->userRepository->find($id, ['*']);
        $user->forceFill($data);
        if (isset($data['email']) && $data['email'] !== $user->email) {
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }
        $user->saveOrFail();
        return $user;
    }

    public function find(int $id): User
    {
        $user = $this->userRepository->find($id, ['*']);
        return $user;
    }

    public function findAll(int $limit, int $offset): Collection
    {
        $userCollection = $this->userRepository->all(['*'], $limit, $offset);
        return $userCollection;
    }

    public function delete(int $id): bool
    {
        $user = $this->userRepository->find($id, ['*']);
        return $user->delete();
    }
}
