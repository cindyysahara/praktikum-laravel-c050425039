<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('judul', 'Aplikasi Akademik')</title>
</head>

<body>

    <header>

        <h2>Sistem Informasi Akademik</h2>

        @include('partials.navbar')

        <hr>

    </header>

    <main>
        @yield('content')
    </main>

    <footer>

        <hr>
        <p>&copy; {{ date('Y') }} Praktikum Pemrograman Web</p>
    </footer>

</body>
</html>
