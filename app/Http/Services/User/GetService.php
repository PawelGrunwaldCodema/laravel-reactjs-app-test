<?php

namespace App\Http\Services\User;

use App\Http\Interfaces\GetInterface;
use Illuminate\Database\Eloquent\Collection;

class GetService extends BaseUserService implements GetInterface
{
    public function get(?array $filters = null): Collection
    {
        return $this->userRepository->get($filters);
    }
}
