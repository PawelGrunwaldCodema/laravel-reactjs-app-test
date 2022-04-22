<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Builder;

abstract class BaseRepository
{
    protected $entity;

    abstract protected function setEntity();

    protected function getEntity()
    {
        return $this->entity;
    }

    protected function prepareQuery(): Builder
    {
        return $this->entity::query();
    }
}
