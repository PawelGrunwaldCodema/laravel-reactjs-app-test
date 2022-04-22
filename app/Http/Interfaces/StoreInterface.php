<?php

namespace App\Http\Interfaces;

interface StoreInterface
{
    public function store(array $data): mixed;
}
