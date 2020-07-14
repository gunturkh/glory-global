<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        foreach(range(1,10) as $index){
        	$item = Product::create([
        		'name'=>$faker->word,
                'icon'=>$faker->word,
        	]);
        }
    }
}
