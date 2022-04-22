<?php

namespace App\Http\Repositories;

abstract class BaseRepository
{
    protected $entityName;
    protected $entity;

    abstract protected function setEntityName();

    protected function getEntityName(): string
    {
        return $this->entityName;
    }

    protected function getEntity()
    {
        return $this->entityName::class;
    }
}
