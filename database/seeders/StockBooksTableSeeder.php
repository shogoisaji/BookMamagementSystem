<?php

namespace Database\Seeders;

use Supabase\SupabaseClient;
use Illuminate\Database\Seeder;


class StockBooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supabase = new SupabaseClient('https://your-project.supabase.co', 'your-public-anon-key');

        $data = [
            'title' => 'Sample Book',
            'author' => 'Sample Author',
            'isbn' => '1234567890',
            'image' => 'https://example.com/image.jpg',
        ];

        $insert = $supabase->from('stock_books')->insert($data)->execute();

        if ($insert['error']) {
            // Handle error
            echo $insert['error'];
        } else {
            // Handle success
            echo 'Data inserted successfully';
        }

        // 他のテストデータも同様に作成できます
    }
}