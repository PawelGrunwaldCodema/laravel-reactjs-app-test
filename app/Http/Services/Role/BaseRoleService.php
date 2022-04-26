<?php

namespace App\Http\Services\Role;

use App\Http\Repositories\Role\RoleRepository;

abstract class BaseRoleService
{
    protected RoleRepository $roleRepository;

    public function __construct(
        RoleRepository $roleRepository
    ) {
        $this->roleRepository = $roleRepository;
    }
}
