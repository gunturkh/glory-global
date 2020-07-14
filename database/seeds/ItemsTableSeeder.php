<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\ProductSubCategory;
use App\Item;

class ItemsTableSeeder extends Seeder
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
        	$item = Item::create([
        		'name'=>$faker->word,
                'description'=>$faker->text($maxNbChars = 90),
                'filename'=>$faker->word,
                'mime'=>$faker->mimeType,
                'original_filename'=>$faker->word.'.'.$faker->fileExtension,
                'product_sub_category_id'=>ProductSubCategory::all()->random()->id,
        	]);
        }
    }
}
