<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('adminadmin'),
                'profilepicture' => '1545447511_black.jpg',
                'gender' => 'M',
                'dateofbirth' => '1998-09-28',
                'address' => 'Admin Street',
                'role' => 'admin'
            ],
            [
                'name' => 'qwe',
                'email' => 'qwe@qwe.com',
                'password' => bcrypt('qweqwe'),
                'profilepicture' => '1545447548_black.jpg',
                'gender' => 'F',
                'dateofbirth' => '2008-01-01',
                'address' => 'Qweqwe Street',
                'role' => 'user'
            ],
            [
                'name' => 'asd',
                'email' => 'asd@asd.com',
                'password' => bcrypt('asdasd'),
                'profilepicture' => '1545758590_black.jpg',
                'gender' => 'M',
                'dateofbirth' => '2008-02-02',
                'address' => 'Asdasd Street',
                'role' => 'user'
            ]
        ]); 

        DB::table('brands')->insert([
            ['name' => 'Apple'],
            ['name' => 'Samsung'],
            ['name' => 'Google'],
            ['name' => 'Huawei'],
            ['name' => 'Razer'],
            ['name' => 'OnePlus'],
            ['name' => 'RED']
        ]);

        DB::table('phones')->insert([
            [
                'name' => 'iPhone X',
                'brand_id' => 1,
                'image' => '1545447678_x.png',
                'description' => 'Apple iPhone X',
                'price' => 10900000,
                'discount' => 10,
                'stock' => 10
            ],
            [
                'name' => 'Galaxy Note 9',
                'brand_id' => 2,
                'image' => '1545447694_note9.png',
                'description' => 'Samsung Galaxy Note 9',
                'price' => 10640000,
                'discount' => 8,
                'stock' => 16
            ],
            [
                'name' => 'Mate 20 Pro',
                'brand_id' => 4,
                'image' => '1545447719_mate20pro.png',
                'description' => 'Huawei Mate 20 Pro',
                'price' => 10350000,
                'discount' => 12,
                'stock' => 25
            ],
            [
                'name' => 'iPhone XS Max',
                'brand_id' => 1,
                'image' => '1545447740_xsmax.png',
                'description' => 'Apple iPhone XS Max',
                'price' => 29499000,
                'discount' => 3,
                'stock' => 15
            ],
            [
                'name' => 'P20 Pro',
                'brand_id' => 4,
                'image' => '1545447759_p20pro.png',
                'description' => 'Huawei P20 Pro',
                'price' => 9700000,
                'discount' => 11,
                'stock' => 15
            ],
            [
                'name' => 'Razer Phone 2',
                'brand_id' => 5,
                'image' => '1545447782_razerphone2.png',
                'description' => 'Razer Phone 2',
                'price' => 13000000,
                'discount' => 5,
                'stock' => 25
            ],
            [
                'name' => 'iPhone XR',
                'brand_id' => 1,
                'image' => '1545447797_xr.png',
                'description' => 'Apple iPhone XR',
                'price' => 18299000,
                'discount' => 3,
                'stock' => 18
            ],
            [
                'name' => 'Galaxy S9 Plus',
                'brand_id' => 2,
                'image' => '1545447825_s9plus.png',
                'description' => 'Samsung Galaxy S9 Plus',
                'price' => 10180000,
                'discount' => 7,
                'stock' => 21
            ],
            [
                'name' => 'OnePlus 6T',
                'brand_id' => 6,
                'image' => '1545447851_6t.png',
                'description' => 'OnePlus 6T',
                'price' => 8769000,
                'discount' => 9,
                'stock' => 35
            ],
            [
                'name' => 'Pixel 3XL',
                'brand_id' => 3,
                'image' => '1545447894_pixel3xl.png',
                'description' => 'Google Pixel 3 XL',
                'price' => 15500000,
                'discount' => 8,
                'stock' => 27
            ],
            [
                'name' => 'Hydrogen One',
                'brand_id' => 7,
                'image' => '1545450117_hydrogen.png',
                'description' => 'RED Hydrogen One',
                'price' => 22600000,
                'discount' => 2,
                'stock' => 5
            ]
        ]);
    }
}
