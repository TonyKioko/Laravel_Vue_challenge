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
        $products = [
            [
                'name' => "Foldable Wireless Mouse",
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua consequat.',
                'quantity' => 21,
                'price' => 200.10,
                'image' => 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/74/148842/1.jpg?6146',
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Wired Mouse",
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua consequat.',
                'quantity' => 400,
                'price' => 1600.21,
                'image' => 'https://ke.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/86/210112/1.jpg?7765',
                'created_at' => new DateTime,
                'updated_at' => null,
                
            ],
            [
                'name' => "Lenovo M20 USB 3 Button",
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua consequat.',
                'quantity' => 37,
                'price' => 378.00,
                'image' => 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/19/589662/1.jpg?7785',
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'name' => 'Gaming Mouse ',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua consequat.',
                'quantity' => 10,
                'price' => 21.10,
                'image' => 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/30/206462/1.jpg?2007',
                'created_at' => new DateTime,
                'updated_at' => null,
            ]
        ];

        DB::table('products')->insert($products);
    }
}
