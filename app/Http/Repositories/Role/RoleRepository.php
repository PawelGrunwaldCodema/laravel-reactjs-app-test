<?php

namespace App\Http\Repositories\Role;

use App\Http\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setEntity();
    }

    protected function setEntity()
    {
        $this->entity = Role::class;
    }

    public function get(): Collection
    {
        return $this->prepareQuery()->get();
    }
}
