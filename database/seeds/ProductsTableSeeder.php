<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            0 => [
                'name' => 'TV 40" Toshiba',
                'image' => 'https://static.wmobjects.com.br/imgres/arquivos/ids/6838461-344-344/.jpg',
                'price' => 996.36,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
            ],
            1 => [
                'name' => 'Geladeira Panasonic 425l',
                'image' => 'https://www.pontofrio-imagens.com.br/Eletrodomesticos/GeladeiraeRefrigerador/2Portas/12149312/883878846/refrigerador-panasonic-nr-bb53gv3b-frost-free-com-porta-de-vidro-preto-425l-12149312.jpg',
                'price' => 1986.36,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
            ],
            2 => [
                'name' => 'TV 50" Toshiba',
                'image' => 'https://static.wmobjects.com.br/imgres/arquivos/ids/6838461-344-344/.jpg',
                'price' => 1996.36,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
            ],
            3 => [
                'name' => 'Notebook Dell Inspiron',
                'image' => 'https://images-americanas.b2w.io/produtos/01/00/offers/01/00/item/133280/7/133280747_2GG.jpg',
                'price' => 3976.46,
                'description' => 'Intel Core 7ª i5 4GB 1TB Tela LED 15.6" Windows 10.'
            ]
        ];
        DB::table('products')->insert($products);
    }
}
