<?php

use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 100; $i++) {
            $data[] = [
                'product_id'    => $i,
                'category_id'   => mt_rand(1, 10),
            ];
        }

        DB::table('product_category')->insert($data);
    }
}
