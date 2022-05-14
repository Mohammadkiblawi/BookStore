<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book1 = Book::create([
            'category_id' => Category::where('name', 'Leading Businesses')->first()->id,
            'publisher_id' => Publisher::where('name', 'Mohammad Kiblawi')->first()->id,
            'title' => 'Remote Jobs',
            'description' => 'In recent years, the system of remote work has spread globally, as many companies and institutions - as well as individuals - resort to the assistance of individuals working remotely from home or anywhere in the world via the Internet.
            Companies resort to remote workers in various disciplines, including but not limited to programming, text editing, network marketing, e-marketing, engineering, design and advertising, translation, interior decoration, data entry, some secretarial work, and airline ticket reservations. Writing articles, some online public relations work, web design and website management, market studies and analyzes and other disciplines.',
            'number_of_copies' => '300',
            'number_of_pages' => '275',
            'price' => '17',
            'isbn' => '10000000001',
            'cover_image' => 'images/covers/1.png',
        ]);
        $author = Author::where('name', 'Ahmad Hassoun')->first();
        $book1->authors()->attach($author->id);

        $book2 = Book::create([
            'category_id' => Category::where('name', 'Design')->first()->id,
            'publisher_id' => Publisher::where('name', 'Mohammad Kiblawi')->first()->id,
            'title' => 'Introduction to UI/UX',
            'description' => 'This brief book puts the reader on the threshold of the world of UX design, which is a science with its rules, assets and tools. First and the commercial service objective, which means a successful product.',
            'number_of_copies' => '300',
            'number_of_pages' => '350',
            'price' => '25',
            'isbn' => '10000000002',
            'cover_image' => 'images/covers/2.png',
        ]);
        $author2 = Author::where('name', 'Mohammad Halabi')->first();
        $book2->authors()->attach($author2->id);

        $book3 = Book::create([
            'category_id' => Category::where('name', 'Freelance')->first()->id,
            'publisher_id' => Publisher::where('name', 'Mohammad Kiblawi')->first()->id,
            'title' => 'Introduction to Freelance',
            'description' => 'This brief book puts the reader on the threshold of the world of UX design, which is a science with its rules, assets and tools. First and the commercial service objective, which means a successful product.',
            'number_of_copies' => '280',
            'number_of_pages' => '200',
            'price' => '30',
            'isbn' => '10000000003',
            'cover_image' => 'images/covers/3.png',
        ]);

        $author3 = Author::where('name', 'Ahmad Daher')->first();
        $book3->authors()->attach($author3->id);

        $book4 = Book::create([
            'category_id' => Category::where('name', 'Design')->first()->id,
            'publisher_id' => Publisher::where('name', 'Mohammad Kiblawi')->first()->id,
            'title' => 'Introduction to UI/UX',
            'description' => 'This brief book puts the reader on the threshold of the world of UX design, which is a science with its rules, assets and tools. First and the commercial service objective, which means a successful product.',
            'number_of_copies' => '300',
            'number_of_pages' => '350',
            'price' => '25',
            'isbn' => '10000000004',
            'cover_image' => 'images/covers/4.png',
        ]);
        $author4 = Author::where('name', 'Ziad Yaman')->first();
        $book4->authors()->attach($author4->id);


        $book5 = Book::create([
            'category_id' => Category::where('name', 'Digital Marketing')->first()->id,
            'publisher_id' => Publisher::where('name', 'Mohammad Kiblawi')->first()->id,
            'title' => 'Introduction to Digital Marketing',
            'description' => 'This brief book puts the reader on the threshold of the world of UX design, which is a science with its rules, assets and tools. First and the commercial service objective, which means a successful product.',
            'number_of_copies' => '300',
            'number_of_pages' => '233',
            'price' => '18',
            'isbn' => '10000000005',
            'cover_image' => 'images/covers/5.png',
        ]);
        $author5 = Author::where('name', 'Nasser Arkadan')->first();
        $book5->authors()->attach($author5->id);


        $book6 = Book::create([
            'category_id' => Category::where('name', 'Programming')->first()->id,
            'publisher_id' => Publisher::where('name', 'Mohammad Kiblawi')->first()->id,
            'title' => 'Introduction to Programming',
            'description' => 'This brief book puts the reader on the threshold of the world of UX design, which is a science with its rules, assets and tools. First and the commercial service objective, which means a successful product.',
            'number_of_copies' => '250',
            'number_of_pages' => '240',
            'price' => '17',
            'isbn' => '10000000006',
            'cover_image' => 'images/covers/6.png',
        ]);
        $author6 = Author::where('name', 'Ali Habli')->first();
        $book6->authors()->attach($author6->id);
    }
}
