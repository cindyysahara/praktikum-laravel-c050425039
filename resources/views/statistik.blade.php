<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Statistik Mahasiswa</title>
</head>
<body>
    <h1>Statistik Mahasiswa</h1>

    <p>Total mahasiswa: {{ $total }}</p>

    <h2>Jumlah Mahasiswa per Program Studi</h2>

    <table border="1" cellpadding="8">
        <tr>
            <th>Program Studi</th>
            <th>Jumlah Mahasiswa</th>
        </tr>

        @foreach ($perProdi as $data)
            <tr>
                <td>{{ $data->prodi }}</td>
                <td>{{ $data->jumlah }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>