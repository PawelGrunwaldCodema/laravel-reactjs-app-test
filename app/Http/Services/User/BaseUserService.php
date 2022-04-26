<?php

namespace App\Http\Services\User;

use App\Http\Repositories\User\UserRepository;

abstract class BaseUserService
{
    protected UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }
}
