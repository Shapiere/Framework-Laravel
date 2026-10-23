<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        [
            'id' => 1,
            'name' => 'Pramoedya Ananta Toer',
            'photo' => 'pramoedya-ananta-toer.jpg',
            'bio' => 'Sastrawan Indonesia yang dikenal lewat tetralogi Buru dan karya realisme sosial.',
        ],
        [
            'id' => 2,
            'name' => 'Andrea Hirata',
            'photo' => 'andrea-hirata.jpg',
            'bio' => 'Penulis novel Laskar Pelangi yang mengangkat kisah pendidikan di Belitung.',
        ],
        [
            'id' => 3,
            'name' => 'Dewi Lestari',
            'photo' => 'dewi-lestari.jpg',
            'bio' => 'Penulis dan musisi yang dikenal lewat seri novel Supernova.',
        ],
        [
            'id' => 4,
            'name' => 'Eka Kurniawan',
            'photo' => 'eka-kurniawan.jpg',
            'bio' => 'Penulis novel Cantik Itu Luka yang karyanya diterjemahkan ke banyak bahasa.',
        ],
        [
            'id' => 5,
            'name' => 'Tere Liye',
            'photo' => 'tere-liye.jpg',
            'bio' => 'Penulis produktif dengan karya populer seperti serial Bumi dan Pulang.',
        ],
    ];

    public function getAuthors()
    {
        return $this->authors;
    }
}
