<?php

namespace App\Http\Services\Role;

use App\Http\Interfaces\GetInterface;
use Illuminate\Database\Eloquent\Collection;

class GetService extends BaseRoleService implements GetInterface
{
    public function get(?array $filters = null): Collection
    {
        return $this->roleRepository->get();
    }
}
