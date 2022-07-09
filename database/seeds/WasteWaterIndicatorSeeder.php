<?php

use Illuminate\Database\Seeder;
use App\Models\WasteWaterIndicator;
class WasteWaterIndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wastewater_indicators')->truncate();
        $indicator = [
        [
        'name' => 'New Sewer Customer'
        ],
        [
        'name' => 'Replacement of manhole covers'
        ],
        [
        'name' => 'Cleaning of sewer network'
        ],
        [
        'name' => 'Replacement of collapsed sewer'
        ],
        [
        'name' => 'Construction of manholes'
        ],
        [
        'name' => 'Unblocking reported sewer'
        ],
        [
        'name' => 'Repair of reported collapsed sewer'
        ]
        
        ];

        foreach ($indicator as $key => $value) {
            WasteWaterIndicator::create($value);
        }
        
        echo "Waste water Indicator Seeder Completed Successfully</br>";
    }
}
