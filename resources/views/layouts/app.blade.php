<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Landing Page - Start Bootstrap Theme</title>
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

<div class="wrapper flex-grow-1">

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="{{route('form.base')}}">Прямой запрос к api</a>
            <a class="navbar-brand" href="{{route('form.async')}}">Асинхронный запрос к api</a>
        </div>
    </nav>


    <div class="container">
        @yield('content')
    </div>
</div>




<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                <ul class="list-inline mb-2">
                    <li class="list-inline-item">
                        <a target="_blank" href="http://mellarius.ru/random-inn">Генератор ИНН</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="https://vladivostok.hh.ru/resume/397a532cff00d054c70039ed1f796572505659">Мое резюме</a>
                    </li>
                </ul>
                <p class="text-muted small mb-4 mb-lg-0">Тестовое задание 2020.</p>
                <br>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('/js/app.js')}}"></script>

</body>

</html>
