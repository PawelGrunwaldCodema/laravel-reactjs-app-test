<?php

namespace App\Http\Controllers\Interfaces;

interface StoreInterface
{
    public function store(array $data): mixed;
}
