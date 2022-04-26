<?php

namespace App\Http\Repositories\User;

use App\Http\Interfaces\GetInterface;
use App\Http\Repositories\BaseRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository implements GetInterface
{
    public function __construct()
    {
        $this->setEntity();
    }

    protected function setEntity()
    {
        $this->entity = User::class;
    }

    public function newModel(): User
    {
        return new ($this->getEntity())();
    }

    public function save(User $user)
    {
        $user->save();
    }

    public function get(?array $filters = null): Collection
    {
        $users = $this->prepareQuery()->with('roles');
        $this->applyFilters($users, $filters);

        return $users->get();
    }

    private function applyFilters(Builder $builder, ?array $filters): void
    {
        if (isset($filters['roles'])) {
            $builder->whereHas('roles', function (Builder $query) use ($filters) {
                $query->whereIn('name', $filters['roles']);
            });
        }
    }

}
