<?php

namespace Database\Seeders;

use App\Models\Process;
use Illuminate\Database\Seeder;

class StrategicMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $process = Process::find(1);
        $strategic_map = $process->strategicmap()->create();
        $strategic_map->indicators()->attach([1,2,3,4,5,6,7]);
    }
}
