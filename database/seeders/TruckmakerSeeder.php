<?php

namespace Database\Seeders;

use App\Models\Truckmaker;
use Illuminate\Database\Seeder;

class TruckmakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $truckMaker = new Truckmaker();
        $truckMaker->truck_name = "Volvo";
        $truckMaker->save();

        $truckMaker1 = new TruckMaker();
        $truckMaker1->truck_name = "VAZ";
        $truckMaker1->save();

        $truckMaker2 = new TruckMaker();
        $truckMaker2->truck_name = "Mercedes";
        $truckMaker2->save();

        $truckMaker3 = new TruckMaker();
        $truckMaker3->truck_name = "GAZ";
        $truckMaker3->save();
    }
}
