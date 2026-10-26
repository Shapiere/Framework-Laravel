# Framework Laravel — MVC Genre, Author & Book

Tugas Framework Laravel: tabel `genres`, `authors`, dan `books` dibuat dengan Migration, diisi 5 data dummy lewat Seeder, lalu ditampilkan ke View melalui Model, Controller, dan Routing.

## Struktur

| Komponen | File |
|---|---|
| Migration | `database/migrations/*_create_genres_table.php`, `*_create_authors_table.php`, `*_create_books_table.php` |
| Seeder | `database/seeders/GenreSeeder.php`, `AuthorSeeder.php`, `BookSeeder.php` |
| Model | `app/Models/Genre.php`, `Author.php`, `Book.php` |
| Controller | `app/Http/Controllers/GenreController.php`, `AuthorController.php`, `BookController.php` |
| View | `resources/views/genres.blade.php`, `authors.blade.php`, `books.blade.php` |
| Routing | `routes/web.php` |

## Skema (mengikuti Brief BookSales)

- **genres**: `id`, `name`, `description`
- **authors**: `id`, `name`, `photo`, `bio`
- **books**: `id`, `title`, `description`, `price`, `stock`, `cover_photo`, `genre_id` (FK → genres), `author_id` (FK → authors)

Tabel `genres` dibuat karena `books.genre_id` adalah foreign key ke tabel tersebut.

## Relasi

- `Book belongsTo Author`, `Book belongsTo Genre`
- `Author hasMany Book`, `Genre hasMany Book`

## Route

| Method | URI | Controller |
|---|---|---|
| GET | `/genres` | `GenreController@index` |
| GET | `/authors` | `AuthorController@index` |
| GET | `/books` | `BookController@index` |

## Menjalankan

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite   # Windows: type nul > database\database.sqlite
php artisan migrate:fresh --seed
php artisan serve
```

Buka http://127.0.0.1:8000/genres, `/authors`, dan `/books`.

Laravel 12, PHP >= 8.2, database SQLite.
