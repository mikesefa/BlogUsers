<?php

namespace Database\Seeders;


use Carbon\Carbon;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class tagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate(); //limpiar tags

        //lenar db tags table con estos datos
        $etiqueta1 = new Tag;
        $etiqueta1->name = "#ComidaSaludable";
        $etiqueta1->created_at = Carbon::now();
        $etiqueta1->save();

        $etiqueta2 = new Tag;
        $etiqueta2->name = "#Deporte";
        $etiqueta2->created_at = Carbon::now();
        $etiqueta2->save();

        $etiqueta3 = new Tag;
        $etiqueta3->name = "#Arte";
        $etiqueta3->created_at = Carbon::now();
        $etiqueta3->save();

        $etiqueta4 = new Tag;
        $etiqueta4->name = "#Musica";
        $etiqueta4->created_at = Carbon::now();
        $etiqueta4->save();
    }
}
