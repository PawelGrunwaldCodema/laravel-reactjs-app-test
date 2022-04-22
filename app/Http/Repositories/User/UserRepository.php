<?php

namespace App\Http\Repositories\User;

use App\Http\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setEntityName();
    }

    protected function setEntityName()
    {
        $this->entityName = User::class;
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
