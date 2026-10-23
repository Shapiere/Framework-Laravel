<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Genre</title>
    <style>
        body { font-family: system-ui, sans-serif; margin: 32px; }
        table { border-collapse: collapse; }
        th, td { border: 1px solid #999; padding: 8px 12px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h1>Daftar Genre</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($genres as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['description'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
