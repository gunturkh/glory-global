<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\ProductCategory;
use App\Product;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        foreach(range(1,20) as $index){
        	$item = ProductCategory::create([
        		'name'=>$faker->word,
                'product_id'=>Product::all()->random()->id,
        	]);
        }
    }
}
