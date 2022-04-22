<?php

namespace App\Http\Repositories\User;

use App\Http\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository
{
    protected function setEntityName()
    {
        $this->entityName = 'User';
    }

    public function newModel(): User
    {
        return new ($this->getEntityName())();
    }

    public function save(User $user)
    {
        $user->save();
    }

}
