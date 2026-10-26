<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Bumi Manusia',
                'description' => 'Kisah Minke, pribumi terpelajar, di masa kolonial Hindia Belanda.',
                'price' => 125000.00,
                'stock' => 12,
                'cover_photo' => 'bumi-manusia.jpg',
                'genre_id' => 1,
                'author_id' => 1,
            ],
            [
                'title' => 'Laskar Pelangi',
                'description' => 'Perjuangan sepuluh anak Belitung menempuh pendidikan di sekolah sederhana.',
                'price' => 85000.00,
                'stock' => 20,
                'cover_photo' => 'laskar-pelangi.jpg',
                'genre_id' => 1,
                'author_id' => 2,
            ],
            [
                'title' => 'Supernova: Ksatria, Puteri, dan Bintang Jatuh',
                'description' => 'Dua sahabat bertemu lewat obrolan daring dan membahas semesta serta cinta.',
                'price' => 98000.00,
                'stock' => 8,
                'cover_photo' => 'supernova.jpg',
                'genre_id' => 3,
                'author_id' => 3,
            ],
            [
                'title' => 'Cantik Itu Luka',
                'description' => 'Saga keluarga di kota rekaan Halimunda yang berlapis sejarah kelam.',
                'price' => 110000.00,
                'stock' => 6,
                'cover_photo' => 'cantik-itu-luka.jpg',
                'genre_id' => 1,
                'author_id' => 4,
            ],
            [
                'title' => 'Pulang',
                'description' => 'Kisah Bujang yang meninggalkan kampung halaman demi kehormatan keluarga.',
                'price' => 95000.00,
                'stock' => 15,
                'cover_photo' => 'pulang.jpg',
                'genre_id' => 2,
                'author_id' => 5,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
