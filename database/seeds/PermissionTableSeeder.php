<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Response;

use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        // DB::table('permissions')->truncate();
        $permissions =  Permission::all();
        $perms = [];
        $routes = Route::getRoutes();
        $count = $routes->count();
        $recorded = 0;
        foreach ($routes as $route) {
            if(isset($route->getAction()['as'])){
                if(!$permissions->contains('name',$route->getAction()['controller']) and $route->getAction()['prefix']=='/cms'){
                    $perms[]=[
                        'name'=>$route->getAction()['controller'],
                        'display_name'=>$route->getAction()['as'],
                        'created_at' => date("Y-m-d h:i"),
                        'updated_at' => date("Y-m-d h:i"),
                    ];
                    $recorded++;
                }
            }
        }  
        Permission::insert($perms);

        echo "<br> \\n Total: ".$count." Recorded: ".$recorded." <br> \\n";
    }
}
