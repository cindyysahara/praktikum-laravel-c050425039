<!DOCTYPE html>
<>
<head>
    <title>Belajar Blade</title>
</head>
<>

    {{-- Ini komentar Blade, tidak akan tampil di browser --}}

    <h1>Halo, {{ $nama }}!</h1>

    @php
        $tahunSekarang = date('Y');
    @endphp

    <p>Julukan: {{ $julukan ?? 'Belum ada julukan' }}</p>

    <p>Escaped: {{ $kontenHtml }}</p>

    <p>Tidak di-escape: {!! $kontenHtml !!}</p>

</body>
</html>