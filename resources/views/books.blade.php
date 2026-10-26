<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <style>
        body { font-family: system-ui, sans-serif; margin: 32px; }
        table { border-collapse: collapse; }
        th, td { border: 1px solid #999; padding: 8px 12px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h1>Daftar Buku</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Cover</th>
                <th>Genre</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>{{ $book->cover_photo }}</td>
                    <td>{{ $book->genre->name }}</td>
                    <td>{{ $book->author->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
