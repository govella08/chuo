<?php

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
         DB::table('regions')->truncate();
        $regions = [
        [
        'region_name' => 'Corporate'
        ],
        [
        'region_name' => 'Ilala'
        ],
        [
        
        'region_name' => 'Kinondoni'
        ],
        [
        
        'region_name' => 'Kawe'
        ],
        [
        
        'region_name' => 'Tegeta'
        ],
        [
        
        'region_name' => 'Bagamoyo'
        ],
        [
        
        'region_name' => 'Kibaha'
        ],
        [
        
        'region_name' => 'Tabata'
        ],
        [
        
        'region_name' => 'Ubungo'
        ],
        [
        
        'region_name' => 'Magomeni'
        ],
        [
        'region_name' => 'Temeke'
        ],
        [
        'region_name' => 'Lower Ruvu'
        ],
        [
        'region_name' => 'Upper Ruvu'
        ],
        [
        'region_name' => 'Mtoni'
        ],
        [
        'region_name' => 'Bore Holes'
        ]
        ];

        foreach ($regions as $key => $value) {
            Region::create($value);
        }
        
        echo "Regions Seeder Completed Successfully</br>";
    }
}
