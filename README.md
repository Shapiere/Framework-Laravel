# Framework Laravel — MVC Genre & Author

Tugas Framework Laravel: sistem MVC sederhana yang menampilkan data array dari Model melalui View, dengan studi kasus tabel **Genre** dan **Author** (Brief BookSales).

## Struktur

| Komponen | File |
|---|---|
| Routing | `routes/web.php` |
| Controller | `app/Http/Controllers/GenreController.php`, `AuthorController.php` |
| Model | `app/Models/Genre.php`, `app/Models/Author.php` |
| View | `resources/views/genres.blade.php`, `authors.blade.php` |

Data disimpan sebagai array di dalam Model (5 data per model, tanpa database). Controller memanggil `getGenres()` / `getAuthors()` lalu mengirimnya ke View, dan View menampilkannya dengan `@foreach`.

Field mengikuti desain database pada Brief:

- **genres**: `id`, `name`, `description`
- **authors**: `id`, `name`, `photo`, `bio`

## Route

| Method | URI | Controller |
|---|---|---|
| GET | `/genres` | `GenreController@index` |
| GET | `/authors` | `AuthorController@index` |

## Menjalankan

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Buka http://127.0.0.1:8000/genres dan http://127.0.0.1:8000/authors.

Laravel 12, PHP >= 8.2
