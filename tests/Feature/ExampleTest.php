<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Genre;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_genre_berisi_lima_data_dan_tampil_di_view(): void
    {
        $genres = (new Genre())->getGenres();

        $this->assertCount(5, $genres);
        $this->assertSame(['id', 'name', 'description'], array_keys($genres[0]));

        $response = $this->get('/genres');
        $response->assertStatus(200);

        foreach ($genres as $genre) {
            $response->assertSee($genre['name']);
        }
    }

    public function test_author_berisi_lima_data_dan_tampil_di_view(): void
    {
        $authors = (new Author())->getAuthors();

        $this->assertCount(5, $authors);
        $this->assertSame(['id', 'name', 'photo', 'bio'], array_keys($authors[0]));

        $response = $this->get('/authors');
        $response->assertStatus(200);

        foreach ($authors as $author) {
            $response->assertSee($author['name']);
        }
    }
}
