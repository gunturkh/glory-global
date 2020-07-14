<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\ProductCategory;
use App\ProductSubCategory;

class ProductSubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        foreach(range(1,30) as $index){
        	$item = ProductSubCategory::create([
        		'name'=>$faker->word,
                'product_category_id'=>ProductCategory::all()->random()->id,
        	]);
        }
    }
}
