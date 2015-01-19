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
        @include('flash::message')
        @yield('content')
    </div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="http://libs.useso.com/js/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        $('#flash-overlay-modal').modal();

        $('.comment__create-form').on('keydown', function(e){
            if(e.keyCode == 13){
                e.preventDefault();
                $(this).submit();
            }
        });
    </script>
</body>
</html>