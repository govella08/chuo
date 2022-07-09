<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //seed user table
        $this->call(UsersTableSeeder::class);

        //seed permissions
        $this->call(PermissionTableSeeder::class);

        //seed roles
        //$this->call(RoleTableSeeder::class);

        //seed roles permissions
        $this->call(RolePermissionsSeeder::class);

        //seed user roles
        $this->call(RoleUserTableSeeder::class);

        //seed languages
        $this->call(LanguageSeeder::class);
    }
}
