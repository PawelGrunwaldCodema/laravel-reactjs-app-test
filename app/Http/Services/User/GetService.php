<?php

namespace App\Http\Services\User;

use App\Http\Interfaces\GetInterface;
use Illuminate\Database\Eloquent\Collection;

class GetService extends BaseService implements GetInterface
{
    public function get(array $filters): Collection
    {
        return $this->userRepository->get($filters);
    }
}
