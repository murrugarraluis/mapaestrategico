<?php

namespace Database\Seeders;

use App\Models\Indicator;
use Illuminate\Database\Seeder;

class ControPanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indicator = Indicator::find(1);
        $indicator->controlpanel()->create([
            'formula'=>'(Productividad/Ventas) *100',
            'objective'=>'Aumentar producción e ingresos..',
            'frequency'=>'Trimestral',
            'goal'=>'30% de incremento en ingresos.',
            'bad_range'=>'0% de incremento.',
            'regular_range'=>'Menos de 15% de incremento',
            'good_range'=>'30% de incremento',
            'iniciatives'=>'iniciatica_1;iniciativa_2',
            'responsable'=>'Carlos Arturo Neira Asencios',
        ]);
        $indicator = Indicator::find(2);
        $indicator->controlpanel()->create([
            'formula'=>'(Productividad/Ventas) *100',
            'objective'=>'Incrementar la confianza en la marca.',
            'frequency'=>'Trimestral',
            'goal'=>'Motivar al 100% del personal.',
            'bad_range'=>'50% personal motivado',
            'regular_range'=>'75% personal motivado',
            'good_range'=>'100% personal motivado',
            'iniciatives'=>'iniciatica_1;iniciativa_2',
            'responsable'=>'Carlos Arturo Neira Asencios',
        ]);
        $indicator = Indicator::find(3);
        $indicator->controlpanel()->create([
            'formula'=>'(Productividad/Productividad Personal) *100',
            'objective'=>'Brindar personal capacitado para atención.',
            'frequency'=>'Mensual',
            'goal'=>'Motivar al 100% del personal.',
            'bad_range'=>'50% personal motivado',
            'regular_range'=>'75% personal motivado',
            'good_range'=>'100% personal motivado',
            'iniciatives'=>'iniciatica_1;iniciativa_2',
            'responsable'=>'Carlos Arturo Neira Asencios',
        ]);
        $indicator = Indicator::find(4);
        $indicator->controlpanel()->create([
            'formula'=>'(Resultado de evaluaciones/#personas) *100',
            'objective'=>'Mantener al personal en constante aprendizaje.',
            'frequency'=>'Semestral',
            'goal'=>'90% del personal altamente capacitado',
            'bad_range'=>'Menos del 50% del personal capacitado.',
            'regular_range'=>'70% personal capacitado.',
            'good_range'=>'90% personal capacitado.',
            'iniciatives'=>'iniciatica_1;iniciativa_2',
            'responsable'=>'Carlos Arturo Neira Asencios',
        ]);
        $indicator = Indicator::find(5);
        $indicator->controlpanel()->create([
            'formula'=>'(Eficiencia/Habilidad) *100',
            'objective'=>'Asignar las áreas de trabajo de acuerdo a las capacidades del personal.',
            'frequency'=>'Semestral',
            'goal'=>'80% del personal asignado a su área de desenvolvimiento laboral.',
            'bad_range'=>'Menos de 40% del personal asignado.',
            'regular_range'=>'70% del personal asignado.',
            'good_range'=>'80% del personal asignado.',
            'iniciatives'=>'iniciatica_1;iniciativa_2',
            'responsable'=>'Carlos Arturo Neira Asencios',
        ]);
        $indicator = Indicator::find(6);
        $indicator->controlpanel()->create([
            'formula'=>'(Productividad/Productividad Personal) *100',
            'objective'=>'Reconocer al personal destacado.',
            'frequency'=>'Trimestral',
            'goal'=>'Motivar al 100% del personal.',
            'bad_range'=>'50% personal motivado',
            'regular_range'=>'75% personal motivado',
            'good_range'=>'100% personal motivado',
            'iniciatives'=>'iniciatica_1;iniciativa_2',
            'responsable'=>'Carlos Arturo Neira Asencios',
        ]);
        $indicator = Indicator::find(7);
        $indicator->controlpanel()->create([
            'formula'=>'(# incidencias conflictivas/personal) *100',
            'objective'=>'Mejorar el ambiente laboral.',
            'frequency'=>'Semestral',
            'goal'=>'90% de armonía laboral',
            'bad_range'=>'Menos de 40% de armonía laboral.',
            'regular_range'=>'Entre 40% y 60% de armonía laboral.',
            'good_range'=>'90% de armonía laboral.',
            'iniciatives'=>'iniciatica_1;iniciativa_2',
            'responsable'=>'Carlos Arturo Neira Asencios',
        ]);
    }
}
