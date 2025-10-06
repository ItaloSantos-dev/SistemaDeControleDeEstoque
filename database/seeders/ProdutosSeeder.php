<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            'nome'=>'nao pereciveis',
            'created_at'=> now(),
            'updated_at'=> now(),



        ]);
        DB::table('produtos')->insert([
            'nome'=>'Café Santa Clara',
            'categoria_id'=>1,
            'imagem'=>'https://th.bing.com/th/id/OIP.B7mXHW5aw80UOGBp_XZnpwHaLa?w=116&h=180&c=7&r=0&o=7&cb=12&pid=1.7&rm=3',
            'preco'=>17.5,
            'quantidade'=>500,
            'unidade'=>'G',
            'estoque'=>5,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
    }
}
