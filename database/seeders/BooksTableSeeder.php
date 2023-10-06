<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $isbns = [
            '978-3-16-148410-0', // Replace these with actual ISBNs of art books
            '978-4-17-148410-1',
            '978-5-18-148410-2',
            // Add more ISBNs here...
        ];

        // Add 90 more random ISBNs
        for ($i = 0; $i < 90; $i++) {
            $isbns[] = '978-' . rand(100000000, 999999999);
        }

        foreach ($isbns as $isbn) {
            Book::create([
                'isbn' => $isbn,
                'recommend' => rand(0, 4),
            ]);
        }
    }
}
