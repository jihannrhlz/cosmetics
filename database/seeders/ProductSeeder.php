<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Lipstick 1', 'slug'=>'lipstick-1', 'category_id'=> '3', 'price'=> '12.99', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit voluptates reprehenderit cum enim veniam ad! Et dolore suscipit repudiandae labore.', 'image'=> 'products-images/lip-1.jpg'],
            ['name' => 'Lipstick 2', 'slug'=>'lipstick-2', 'category_id'=> '3', 'price'=> '12.99', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit voluptates reprehenderit cum enim veniam ad! Et dolore suscipit repudiandae labore.', 'image'=> 'products-images/lip-2.jpg'],
            ['name' => 'Lipstick 3', 'slug'=>'lipstick-3', 'category_id'=> '3', 'price'=> '12.99', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit voluptates reprehenderit cum enim veniam ad! Et dolore suscipit repudiandae labore.', 'image'=> 'products-images/lip-3.jpg'],
            ['name' => 'Lipstick 4', 'slug'=>'lipstick-4', 'category_id'=> '3', 'price'=> '12.99', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit voluptates reprehenderit cum enim veniam ad! Et dolore suscipit repudiandae labore.', 'image'=> 'products-images/lip-4.jpg'],
            ['name' => 'Lipstick 5', 'slug'=>'lipstick-5', 'category_id'=> '3', 'price'=> '12.99', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit voluptates reprehenderit cum enim veniam ad! Et dolore suscipit repudiandae labore.', 'image'=> 'products-images/lip-5.jpg'],
            ['name' => 'Lipstick 6', 'slug'=>'lipstick-6', 'category_id'=> '3', 'price'=> '12.99', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit voluptates reprehenderit cum enim veniam ad! Et dolore suscipit repudiandae labore.', 'image'=> 'products-images/lip-6.jpg'],
        ];
        DB::table('products')->insert($data);        
    }
}
