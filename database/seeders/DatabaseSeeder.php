<?php

namespace Database\Seeders;

use App\Models\StrategicMap;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        User::create([
            'name'=>'Luis Murrugarra',
            'email'=>'admin@app.com',
            'password'=>bcrypt('123456'),
        ]);
        $this->call(ProcessSeeder::class);
        $this->call(IndicatorSeeder::class);
        $this->call(ControPanelSeeder::class);
        $this->call(StrategicMapSeeder::class);
    }
}
