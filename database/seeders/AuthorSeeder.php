<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create(['name' => 'Ahmad Hassoun']);
        Author::create(['name' => 'Ahmad Daher']);
        Author::create(['name' => 'Ali Habli']);
        Author::create(['name' => 'Mohammad Halabi']);
        Author::create(['name' => 'Nasser Arkadan']);
        Author::create(['name' => 'Ziad Yaman']);
    }
}
