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
            [
                'nome'=>'nao pereciveis',
                'created_at'=> now(),
                'updated_at'=> now(),

            ],
            [
                'nome'=>'cereais',
                'created_at'=> now(),
                'updated_at'=> now(),

            ],
            [
                'nome'=>'massas',
                'created_at'=> now(),
                'updated_at'=> now(),

            ]


        ]);
        DB::table('produtos')->insert([
        [
            'nome' => 'Café Santa Clara',
            'categoria_id' => 1,
            'imagem' => 'https://th.bing.com/th/id/OIP.B7mXHW5aw80UOGBp_XZnpwHaLa?w=116&h=180&c=7&r=0&o=7&cb=12&pid=1.7&rm=3',
            'preco' => 17.50,
            'quantidade' => 500.00,
            'unidade' => 'G',
            'estoque' => 2,
            'created_at' => '2025-10-06 18:10:09',
            'updated_at' => '2025-10-08 12:39:52',
        ],
        [
            'nome' => 'Arroz Camil',
            'categoria_id' => 1,
            'imagem' => 'https://www.bing.com/th?id=OPHS.5qyyvdJ9W%2fUriw474C474&o=5&pid=21.1&w=140&h=200&qlt=100&dpr=1&o=2&c=8&pcl=f5f5f5',
            'preco' => 10.00,
            'quantidade' => 1.00,
            'unidade' => 'KG',
            'estoque' => 14,
            'created_at' => '2025-10-07 17:44:03',
            'updated_at' => '2025-10-07 17:44:03',
        ],
        [
            'nome' => 'Cereal Nescau',
            'categoria_id' => 2,
            'imagem' => 'https://th.bing.com/th?id=OPHS.6NjE5b%2f9EaMGyQ474C474&w=176&h=220&c=17&cb=12&pid=21.1',
            'preco' => 44.55,
            'quantidade' => 770.00,
            'unidade' => 'G',
            'estoque' => 14,
            'created_at' => '2025-10-09 11:29:44',
            'updated_at' => '2025-10-09 11:29:44',
        ],
        [
            'nome' => 'Macarrão Barilla',
            'categoria_id' => 3,
            'imagem' => 'https://th.bing.com/th/id/OPHS.8ZwbBYqkZm0PHQ474C474?w=248&h=248&c=17&o=5&cb=12&pid=21.1',
            'preco' => 17.44,
            'quantidade' => 500.00,
            'unidade' => 'G',
            'estoque' => 1,
            'created_at' => '2025-10-09 11:32:37',
            'updated_at' => '2025-10-09 11:34:50',
        ],
        [
            'nome' => 'Oleo Soja',
            'categoria_id' => 1,
            'imagem' => 'https://carrefourbrfood.vtexassets.com/arquivos/ids/211616/141836_1.jpg?v=637272514200130000',
            'preco' => 7.49,
            'quantidade' => 900.00,
            'unidade' => 'ML',
            'estoque' => 200,
            'created_at' => '2025-10-09 08:30:00',
            'updated_at' => '2025-10-09 08:30:00',
        ],
        [
            'nome' => 'Açucar União',
            'categoria_id' => 1,
            'imagem' => 'https://propao.agilecdn.com.br/1744_1.jpg?v=27-2230402076',
            'preco' => 4.39,
            'quantidade' => 1.00,
            'unidade' => 'KG',
            'estoque' => 150,
            'created_at' => '2025-10-09 08:30:00',
            'updated_at' => '2025-10-09 08:30:00',
        ],
        [
            'nome' => 'Café tradicional',
            'categoria_id' => 1,
            'imagem' => 'https://mercafefaststore.vtexassets.com/arquivos/ids/550034/Cafe_Torrado_e_Moido_Cafe_Brasileiro_Tradicional_Pacote_500g.png?v=638167513370770000',
            'preco' => 17.50, // valor não informado no INSERT, adicionei exemplo
            'quantidade' => 500.00,
            'unidade' => 'G',
            'estoque' => 100,
            'created_at' => '2025-10-09 08:30:00',
            'updated_at' => '2025-10-09 08:30:00',
        ],
        [
            'nome' => 'Leite integral',
            'categoria_id' => 1,
            'imagem' => 'https://giassi.vtexassets.com/arquivos/ids/2030455-1200-auto?v=638588232367100000&width=1200&height=auto&aspect=true',
            'preco' => 5.99, // valor não informado no INSERT, adicionei exemplo
            'quantidade' => 1.00,
            'unidade' => 'L',
            'estoque' => 80,
            'created_at' => '2025-10-09 08:30:00',
            'updated_at' => '2025-10-09 08:30:00',
        ],
    ]);

}
}
