<?php

namespace Database\Seeders;

use App\Enums\Roles\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (RoleEnum::allValues() as $role) {
            Role::create([
                'name' => $role,
            ]);
        }
    }
}
