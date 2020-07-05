<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Flagship',
            'slug' => str_slug('Flagship'),
            'description' => 'Flagship Phone'
        ]);

        Category::create([
            'name' => 'Midrange',
            'slug' => str_slug('Midrange'),
            'description' => 'Midrange Phone'
        ]);

        Category::create([
            'name' => 'Low End',
            'slug' => str_slug('Low End'),
            'description' => 'Low End Phone'
        ]);

        Category::create([
            'name' => 'Asus',
            'slug' => str_slug('Asus'),
            'description' => 'Asus Phone'
        ]);

        Category::create([
            'name' => 'Iphone',
            'slug' => str_slug('Iphone'),
            'description' => 'Iphone Phone'
        ]);

        Category::create([
            'name' => 'Vivo',
            'slug' => str_slug('Vivo'),
            'description' => 'Vivo Phone'
        ]);

        Category::create([
            'name' => 'Oppo',
            'slug' => str_slug('Oppo'),
            'description' => 'Oppo Phone'
        ]);

        Category::create([
            'name' => 'Lenovo',
            'slug' => str_slug('Lenovo'),
            'description' => 'Lenovo Phone'
        ]);

        Category::create([
            'name' => 'Realme',
            'slug' => str_slug('Realme'),
            'description' => 'Realme Phone'
        ]);

        Category::create([
            'name' => 'Nokia',
            'slug' => str_slug('Nokia'),
            'description' => 'Nokia Phone'
        ]);

        Category::create([
            'name' => 'Readmi',
            'slug' => str_slug('Readmi'),
            'description' => 'Readmi Phone'
        ]);

        Category::create([
            'name' => 'Xiaomi',
            'slug' => str_slug('Xiaomi'),
            'description' => 'Xiaomi Phone'
        ]);

        Category::create([
            'name' => 'Evercross',
            'slug' => str_slug('Evercross'),
            'description' => 'Evercross Phone'
        ]);

        Category::create([
            'name' => 'Sony',
            'slug' => str_slug('Sony'),
            'description' => 'Sony Phone'
        ]);
    }
}
