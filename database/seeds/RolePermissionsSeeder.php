<?php

use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\Permission;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $role = Role::where('name','admin')->first();
       $permissions= Permission::select('id')->pluck('id');
       $role->perms()->sync($permissions);

    }
}
