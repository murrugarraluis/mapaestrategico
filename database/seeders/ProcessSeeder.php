<?php

namespace Database\Seeders;

use App\Models\Process;
use Illuminate\Database\Seeder;

class ProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Process::create([
           'name'=>'Administración del Personal'
        ]);
        Process::create([
            'name'=>'Logística de Abastecimiento'
        ]);
        Process::create([
            'name'=>'Ventas'
        ]);
        Process::create([
            'name'=>'Diseño de Piezas'
        ]);
    }
}
