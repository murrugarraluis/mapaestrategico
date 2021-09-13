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
        $data ='{ "class": "GraphLinksModel",
                  "nodeDataArray": [
                        {"key":"Pool1","text":"Mapa Estrategico","isGroup":true,"category":"Pool","loc":"26.59644317626953 0.5"},
                        {"key":"Financiera","text":"Financiera","isGroup":true,"group":"Pool1","color":"lightblue","loc":"53.11929067457747 0.5","size":"807 123","expanded":true,"savedBreadth":123},
                        {"key":"Clientes","text":"Clientes","isGroup":true,"group":"Pool1","color":"lightgreen","loc":"53.11929067457747 122.5","size":"807 103","expanded":true,"savedBreadth":103},
                        {"key":"Procesos Internos","text":"Procesos Internos","isGroup":true,"group":"Pool1","color":"yellow","loc":"53.11929067457747 224.5","size":"807 187","expanded":true,"savedBreadth":187},
                        {"key":"Aprendizaje y Crecimiento","text":"Aprendizaje y Crecimiento","isGroup":true,"group":"Pool1","color":"orange","loc":"53.119290674577485 410.5","size":"807 254","expanded":true,"savedBreadth":254},
                        {"group":"Financiera","key":"Crecimiento de Productividad e Ingresos","loc":"114.11929067457747 71.5"},
                        {"group":"Financiera","key":"Valorización de la marca","loc":"421.4889195808275 65.5"},
                        {"group":"Clientes","key":"Satisfacción del Cliente","loc":"237.11929067457748 161.5"},
                        {"group":"Procesos Internos","key":"Capacitación del Personal","loc":"155.11929067457748 280.5"},
                        {"group":"Procesos Internos","key":"Eficiencia de procesos","loc":"327.6024449714525 281.5"},
                        {"group":"Aprendizaje y Crecimiento","key":"Habilidades y Capacidades","loc":"156.11929067457748 432.5"},
                        {"group":"Aprendizaje y Crecimiento","key":"Clima Laboral","loc":"369.7892125495775 431.5"}
                        ],
                        "linkDataArray": []}'
        ;
        $node = '       {"key":"Pool1","text":"Mapa Estrategico","isGroup":true,"category":"Pool","loc":"26.59644317626953 0.5"},
                        {"key":"Financiera","text":"Financiera","isGroup":true,"group":"Pool1","color":"lightblue","loc":"53.11929067457747 0.5","size":"807 123","expanded":true,"savedBreadth":123},
                        {"key":"Clientes","text":"Clientes","isGroup":true,"group":"Pool1","color":"lightgreen","loc":"53.11929067457747 122.5","size":"807 103","expanded":true,"savedBreadth":103},
                        {"key":"Procesos Internos","text":"Procesos Internos","isGroup":true,"group":"Pool1","color":"yellow","loc":"53.11929067457747 224.5","size":"807 187","expanded":true,"savedBreadth":187},
                        {"key":"Aprendizaje y Crecimiento","text":"Aprendizaje y Crecimiento","isGroup":true,"group":"Pool1","color":"orange","loc":"53.119290674577485 410.5","size":"807 254","expanded":true,"savedBreadth":254},
                        {"group":"Financiera","key":"Crecimiento de Productividad e Ingresos","loc":"114.11929067457747 71.5"},
                        {"group":"Financiera","key":"Valorización de la marca","loc":"421.4889195808275 65.5"},
                        {"group":"Clientes","key":"Satisfacción del Cliente","loc":"237.11929067457748 161.5"},
                        {"group":"Procesos Internos","key":"Capacitación del Personal","loc":"155.11929067457748 280.5"},
                        {"group":"Procesos Internos","key":"Eficiencia de procesos","loc":"327.6024449714525 281.5"},
                        {"group":"Aprendizaje y Crecimiento","key":"Habilidades y Capacidades","loc":"156.11929067457748 432.5"},
                        {"group":"Aprendizaje y Crecimiento","key":"Clima Laboral","loc":"369.7892125495775 431.5"}';
        $strategic_map = $process->strategicmap()->create([
            'data' => $data,
            'node' =>$node,
        ]);
        $strategic_map->indicators()->attach([1,2,3,4,5,6,7]);
    }
}
