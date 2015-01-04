<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="http://libs.useso.com/js/bootstrap/3.2.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/main.css"/>
</head>
<body>

    @include('layouts.partials.nav')

    <div class="container">
        @yield('content')
    </div>
    <script src="http://libs.useso.com/js/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>