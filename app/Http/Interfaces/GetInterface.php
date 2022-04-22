<?php

namespace App\Http\Interfaces;

interface GetInterface
{
    public function get(array $filters): mixed;
}
