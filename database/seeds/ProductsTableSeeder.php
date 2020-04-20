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
        for ($i=1; $i <= 100; $i++) {
            $products[] = ['name' => 'Product #' . $i];
        }

        DB::table('categories')->insert($products);
    }
}
