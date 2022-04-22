<?php

namespace App\Http\Services\User;

use App\Http\Interfaces\StoreInterface;
use App\Models\User;

class StoreService extends BaseService implements StoreInterface
{
    public function store(array $data): User
    {
        $user = $this->userRepository->newModel();
        $user->full_name = $data['full_name'];
        $user->email = $data['email'];
        $user->assignRole($data['roles']);

        $this->userRepository->save($user);

        return $user;
    }
}
