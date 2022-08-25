<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        //Brands
	    	Brand::create([
	            'brand_name' => 'Razer'
	        ]);
            Brand::create([
	            'brand_name' => 'Ford'
	        ]);
            Brand::create([
	            'brand_name' => 'Dell'
	        ]);
            Brand::create([
	            'brand_name' => 'Nvidia'
	        ]);
            Brand::create([
	            'brand_name' => 'Acer'
	        ]);
            Brand::create([
                'brand_name' => 'Google'
	        ]);
            Brand::create([
	            'brand_name' => 'Ikea'
	        ]);
            Brand::create([
                'brand_name' => 'Masonite'
	        ]);
        //Categories
        Category::create([
            'category_name' => 'Headphones'
        ]);
        Category::create([
            'category_name' => 'Cars'
        ]);
        Category::create([
            'category_name' => 'Computers'
        ]);
        Category::create([
            'category_name' => 'Computer parts'
        ]);
        Category::create([
            'category_name' => 'Furniture'
        ]);
        
    }
}
