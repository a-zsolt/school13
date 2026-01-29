<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'id' => 1,
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'published_year' => 1925,
                'price' => 1099,
            ],
            [
                'id' => 2,
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'published_year' => 1960,
                'price' => 1250,
            ],
            [
                'id' => 3,
                'title' => '1984',
                'author' => 'George Orwell',
                'published_year' => 1949,
                'price' => 899,
            ],
            [
                'id' => 4,
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'published_year' => 1813,
                'price' => 750,
            ],
            [
                'id' => 5,
                'title' => 'The Catcher in the Rye',
                'author' => 'J.D. Salinger',
                'published_year' => 1951,
                'price' => 1100,
            ],
            [
                'id' => 6,
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'published_year' => 1937,
                'price' => 1499,
            ],
            [
                'id' => 7,
                'title' => 'Fahrenheit 451',
                'author' => 'Ray Bradbury',
                'published_year' => 1953,
                'price' => 999,
            ],
            [
                'id' => 8,
                'title' => 'Jane Eyre',
                'author' => 'Charlotte Brontë',
                'published_year' => 1847,
                'price' => 850,
            ],
            [
                'id' => 9,
                'title' => 'Animal Farm',
                'author' => 'George Orwell',
                'published_year' => 1945,
                'price' => 699,
            ],
            [
                'id' => 10,
                'title' => 'Brave New World',
                'author' => 'Aldous Huxley',
                'published_year' => 1932,
                'price' => 1050,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
