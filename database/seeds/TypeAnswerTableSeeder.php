<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeAnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $types = [
            ['description' => 'Verdadero/Falso'],
            ['description' => 'Op. Mult. Una respuesta correcta'],
            ['description' => 'Op. Mult. Varias respuestas correctas']
        ];

        DB::table('answer_type')->insert($types);
    }
}
