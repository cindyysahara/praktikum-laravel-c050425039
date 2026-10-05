<!DOCTYPE html>
<html>
<head>
    <title>Uji XSS</title>
</head>
<body>

    <h1>Pengujian XSS</h1>

    <p>Menggunakan kurung kurawal Blade:</p>
    <p>{{ $teks }}</p>

    <p>Menggunakan Blade tanpa escape:</p>
    <p>{!! $teks !!}</p>

</body>
</html>