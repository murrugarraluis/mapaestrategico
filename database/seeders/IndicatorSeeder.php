<?php

namespace Database\Seeders;

use App\Models\Indicator;
use App\Models\Process;
use Illuminate\Database\Seeder;

class IndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $process = Process::find(1);
        $process->indicators()->create([
            'name'=>'Crecimiento de Productividad e Ingresos',
            'level'=>'Financiera'
        ]);
        $process->indicators()->create([
            'name'=>'Valorización de la marca',
            'level'=>'Financiera'
        ]);
        $process->indicators()->create([
            'name'=>'Satisfacción del Cliente',
            'level'=>'Clientes'
        ]);
        $process->indicators()->create([
            'name'=>'Capacitación del Personal',
            'level'=>'Procesos Internos'
        ]);
        $process->indicators()->create([
            'name'=>'Eficiencia de procesos',
            'level'=>'Procesos Internos'
        ]);
        $process->indicators()->create([
            'name'=>'Habilidades y Capacidades',
            'level'=>'Aprendizaje y Crecimiento'
        ]);
        $process->indicators()->create([
            'name'=>'Clima Laboral',
            'level'=>'Aprendizaje y Crecimiento'
        ]);
    }
}
