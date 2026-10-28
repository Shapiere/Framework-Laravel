# Framework Laravel — REST API Genre, Author & Book

Tugas Framework Laravel: data `genres`, `authors`, dan `books` dibuat lewat Migration, diisi 5 data dummy lewat Seeder, lalu disajikan sebagai **JSON API** (tanpa view).

## Struktur

| Komponen | File |
|---|---|
| Migration | `database/migrations/*_create_genres_table.php`, `*_create_authors_table.php`, `*_create_books_table.php` |
| Seeder | `database/seeders/GenreSeeder.php`, `AuthorSeeder.php`, `BookSeeder.php` |
| Model | `app/Models/Genre.php`, `Author.php`, `Book.php` |
| Controller | `app/Http/Controllers/GenreController.php`, `AuthorController.php`, `BookController.php` |
| Routing | `routes/api.php` |

## Skema (mengikuti Brief BookSales)

- **genres**: `id`, `name`, `description`
- **authors**: `id`, `name`, `photo`, `bio`
- **books**: `id`, `title`, `description`, `price`, `stock`, `cover_photo`, `genre_id` (FK → genres), `author_id` (FK → authors)

## Endpoint

| Method | URI | Controller | Keterangan |
|---|---|---|---|
| GET | `/api/genres` | `GenreController@index` | Read all genre |
| POST | `/api/genres` | `GenreController@store` | Create genre |
| GET | `/api/authors` | `AuthorController@index` | Read all author |
| POST | `/api/authors` | `AuthorController@store` | Create author |
| GET | `/api/books` | `BookController@index` | Read all book |

Semua endpoint mengembalikan JSON dengan format:

```json
{
  "success": true,
  "message": "Get All Resource",
  "data": []
}
```

Create mengembalikan status **201 Created** dengan format yang sama dan `message` bernilai `Resource created successfully`.

Body untuk create:

```json
// POST /api/genres
{ "name": "Horor", "description": "Cerita fiksi yang memicu rasa takut." }

// POST /api/authors
{ "name": "Ayu Utami", "photo": "ayu-utami.jpg", "bio": "Penulis novel Saman." }
```

Data tidak lengkap ditolak dengan status **422** beserta daftar field yang gagal validasi.

`/api/books` menyertakan relasi `author` dan `genre` pada setiap item.

## Menjalankan

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite   # Windows: type nul > database\database.sqlite
php artisan migrate:fresh --seed
php artisan serve
```

Lalu uji dengan Postman (method `GET`):

- http://127.0.0.1:8000/api/genres
- http://127.0.0.1:8000/api/authors
- http://127.0.0.1:8000/api/books

Laravel 12, PHP >= 8.2, database SQLite.
