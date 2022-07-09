<?php

use Illuminate\Database\Seeder;
use App\Models\Indicator;
class IndicatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('indicators')->truncate();
        $indicator = [
        [
        'name' => 'Water Sales'
        ],
        [
        'name' => 'New Connection'
        ],
        [
        'name' => 'Revenue Collection'
        ],
        [
        'name' => 'Leakage Control'
        ],
        [
        'name' => 'Meter Replacement'
        ],
        [
        'name' => 'Meter Readings'
        ],
        [
        'name' => 'Water Production'
        ]
        
        ];

        foreach ($indicator as $key => $value) {
            Indicator::create($value);
        }
        
        echo "Indicator Seeder Completed Successfully</br>";
    
    }
}
