<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres = [
        [
            'id' => 1,
            'name' => 'Novel',
            'description' => 'Karya fiksi panjang yang menceritakan rangkaian peristiwa kehidupan tokoh secara utuh.',
        ],
        [
            'id' => 2,
            'name' => 'Fantasi',
            'description' => 'Cerita fiksi yang mengandung unsur magis, dunia rekaan, dan makhluk imajinatif.',
        ],
        [
            'id' => 3,
            'name' => 'Sains Fiksi',
            'description' => 'Fiksi yang dibangun dari spekulasi ilmu pengetahuan dan teknologi masa depan.',
        ],
        [
            'id' => 4,
            'name' => 'Sejarah',
            'description' => 'Buku yang membahas peristiwa, tokoh, dan latar masa lampau berdasarkan sumber.',
        ],
        [
            'id' => 5,
            'name' => 'Biografi',
            'description' => 'Kisah perjalanan hidup seseorang yang ditulis berdasarkan fakta.',
        ],
    ];

    public function getGenres()
    {
        return $this->genres;
    }
}
