<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="shortcut icon" href="/img/favicon_0.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery-3.6.1.min.js"></script>
    <script src="/js/bootstrap-select.js"></script>
    {{-- <script src="js/bootstrap.bundle.min.js"></script> --}}
    <title>@yield('title') - Белорусская Государственная Академия Связи</title>
</head>

<body>
    <div class="wrapper">
        <header class="d-flex flex-wrap justify-content-center py-3 border-bottom px-5">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="img/bsac_logo.svg" alt="bsac logo" width="40" height="40" class="me-3">
                <span class="fs-4">БГАС - ФПК</span>
            </a>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <input class="form-control me-2" id="search_string" name="search_string" type="search" placeholder="Поиск по странице" aria-label="Search">
                    <button class="btn btn-outline-success" type="button" id="clearSearchFiled">Очистить</button>
                </div>
            </nav>
        </header>
        <main class="d-flex flex-nowrap">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
                <a href="/"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <img src="img/house.svg" alt="house icon" class="me-2">
                    <span class="fs-4">Главная</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ route('courses.index') }}" class="nav-link link-dark" aria-current="page">
                            <img src="img/book.svg" alt="house icon" class="me-2">
                            Курсы
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('students.index') }}" class="nav-link link-dark">
                            <img src="img/people.svg" alt="house icon" class="me-2">
                            Слушатели
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('organizations.index') }}" class="nav-link link-dark">
                            <img src="img/building.svg" alt="house icon" class="me-2">
                            Организации
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('groups.index') }}" class="nav-link link-dark">
                            <img src="img/collection.svg" alt="house icon" class="me-2">
                            Группы
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('professionalDevelopmentPrograms.index') }}" class="nav-link link-dark">
                            <img src="img/card-text.svg" alt="house icon" class="me-2">
                            Программы повышения квалификации
                        </a>
                    </li>
                    <li>
                        @role('admin')
                            <a href="{{ route('users.index') }}" class="nav-link link-dark">
                                <img src="img/person-circle.svg" alt="house icon" class="me-2">
                                Методисты
                            </a>
                        @endrole
                    </li>
                    <li>
                        <a href="{{ route('print') }}" class="nav-link link-dark">
                            <img src="img/printer.svg" alt="house icon" class="me-2">
                            Печать отчетов
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="img/person-fill.svg" alt="" class="rounded-circle me-2" width="32"
                            height="32">
                        <strong>{{ Auth::user()->name }}</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" style="">
                        {{-- <li><a class="dropdown-item" href="#">Действие</a></li> --}}
                        {{-- <li><a class="dropdown-item" href="#">Действие</a></li> --}}
                        {{-- <li><a class="dropdown-item" href="#">Действие</a></li> --}}
                        {{-- <li>
                            <hr class="dropdown-divider">
                        </li> --}}
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Выйти</a></li>
                    </ul>
                </div>
            </div>
            <section id="content">
                <div class="container pt-2">
                    @section('content')
                    @show
                </div>
            </section>
        </main>
    </div>
</body>

<script>
    // поиск на страницах управления
    $("#search_string").on("keyup", function () {
        let value = $(this).val().toLowerCase();
        $(".search_row").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // кнопка "очистить поиск"
    $('#clearSearchFiled').click(function () {
        $(".search_row").show();
        $("#search_string").val('')
    })
</script>

</html>
