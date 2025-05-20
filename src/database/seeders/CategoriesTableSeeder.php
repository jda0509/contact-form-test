<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('categories')->count() === 0){
            $categories = [
                '1.商品のお届けについて',
                '2.商品の交換について',
                '3.商品トラブル',
                '4.ショップへのお問い合わせ',
                '5.その他',
            ];

            foreach($categories as $type){
                DB::table('categories')->insert([
                    'category_type' => $type,
                ]);
            }
        }
    }
}