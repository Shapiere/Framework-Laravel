<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Database\Seeders\GenreSeeder;
use Database\Seeders\AuthorSeeder;
use Database\Seeders\BookSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed([
            GenreSeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
        ]);
    }

    public function test_seeder_mengisi_lima_data_per_tabel(): void
    {
        $this->assertSame(5, Genre::count());
        $this->assertSame(5, Author::count());
        $this->assertSame(5, Book::count());
    }

    public function test_api_genre_mengembalikan_json(): void
    {
        $this->getJson('/api/genres')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Get All Resource',
            ])
            ->assertJsonCount(5, 'data');
    }

    public function test_api_author_mengembalikan_json(): void
    {
        $this->getJson('/api/authors')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Get All Resource',
            ])
            ->assertJsonCount(5, 'data');
    }

    public function test_api_book_mengembalikan_relasi_author_dan_genre(): void
    {
        $response = $this->getJson('/api/books')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Get All Resource',
            ])
            ->assertJsonCount(5, 'data');

        $this->assertNotNull($response->json('data.0.author'));
        $this->assertNotNull($response->json('data.0.genre'));
    }
}
