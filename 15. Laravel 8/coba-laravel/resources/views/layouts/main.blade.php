<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icon Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>AY Blog | {{ $title }}</title>
</head>

<body>

    {{-- include digunakan untuk menambhak komponen --}}
    @include('partial.navbar')
    <div class="container mt-4">
        @yield('container')
    </div>

    <script src="/js/bootstrap.min.js">
    </script>
</body>

</html>
