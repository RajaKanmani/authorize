<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Product = factory(\App\Product::class,10)->create([    
        'product_name' => Str::random(10).'test',
        'product_price' =>Str::random(10).'123',
        'seller_name' =>Str::random(10).'test',
        'description' =>Str::random(10),]);

    }
    
}
