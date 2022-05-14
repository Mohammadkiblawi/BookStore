<?php

namespace Database\Seeders;

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
        Category::create(['name' => 'Leading Businesses']);
        Category::create(['name' => 'Freelance']);
        Category::create(['name' => 'Digital Marketing']);
        Category::create(['name' => 'Design']);
        Category::create(['name' => 'Programming']);
    }
}
