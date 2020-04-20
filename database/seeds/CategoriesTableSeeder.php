<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 10; $i++) {
            $categories[] = ['name' => 'Category #' . $i];
        }

        DB::table('categories')->insert($categories);
    }
}
