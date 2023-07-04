<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComentariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comentarios')->insert([
            'produto_id'=>13,
            'usuario'=>"Thiago",
            'comentario'=>"Produto de otima qualidade",
            'classificassao'=>5,
            'created_at'=>date("Y/m/d h:i:s"),
            'updated_at'=>date("Y/m/d h:i:s")
        ]);
        DB::table('comentarios')->insert([
            'produto_id'=>13,
            'usuario'=>"Pereira",
            'comentario'=>"Produto de pessima qualidade",
            'classificassao'=>1,
            'created_at'=>date("Y/m/d h:i:s"),
            'updated_at'=>date("Y/m/d h:i:s")
        ]);
        DB::table('comentarios')->insert([
            'produto_id'=>13,
            'usuario'=>"Iago",
            'comentario'=>"Produto normal",
            'classificassao'=>4,
            'created_at'=>date("Y/m/d h:i:s"),
            'updated_at'=>date("Y/m/d h:i:s")
        ]);
    }
}
