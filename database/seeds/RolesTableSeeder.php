<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::firstOrNew(['name' => 'super_admin']);
        if (!$role->exists) {
            $role->fill([
                    'display_name' => 'Super Administrator',
                    'description' => 'The Super administrator of the System',
                ])->save();
        }
        $role = Role::firstOrNew(['name' => 'admin']);
        if (!$role->exists) {
            $role->fill([
                    'display_name' => 'Administrator',
                    'description' => 'The Administrator of the System',
                ])->save();
        }

        $role = Role::firstOrNew(['name' => 'user']);
        if (!$role->exists) {
            $role->fill([
                    'display_name' => 'Normal User',
                    'description' => 'Normal System User',
                ])->save();
        }

        $role = Role::firstOrNew(['name' => 'general_dashboard_viewer']);
        if (!$role->exists) {
            $role->fill([
                    'display_name' => 'View All Reports',
                    'description' => 'View All Reports',
                ])->save();
        }
        
     echo "Roles Seeder Completed Successfully</br>";
    } 
}
