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
    }
}
