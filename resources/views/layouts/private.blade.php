<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админка</title>
    <script src="https://use.fontawesome.com/d67457ece1.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="header">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" role="navigation">
            <a class="navbar-brand" href="#" role="banner">Психология с Яндекс Весна</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Переключить навигацию">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Главная <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">О сайте</a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0" role="search">
                    <input class="form-control mr-sm-2" type="text" placeholder="Поиск" aria-label="Поиск">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
                </form>
            </div>
        </nav>
 </header>

 <main role="main">
 <div class="jumbotron">
 <div class="container">
 <h1 class="display-3">Психология с Яндекс Весна</h1>
 <p>
 Служба Яндекс.Рефераты (ранее Яндекс.Весна) позволяет генерировать случайный текст на заданную тематику. Импользуется для наполнения сайта контентом, что позволяет лучше оценить как он будет выглядеть в будущем.
 </p>
 <p>
 <a class="btn btn-primary btn-lg" href="https://yandex.ru/referats/" role="button">Яндекс.Рефераты</a>
 </p>
 </div>
 </div>
 <div class="container">
 <div class="row">
 <div class="col-md-4">
 <h2>Коллективный код: предсознательное или страх?</h2>
 <p>Личность возможна. Автоматизм, иcходя из того, что сложен. Гендер дает генезис.</p>
 <p><a class="btn btn-secondary" href="#" role="button">Читать далее »</a></p>
 </div>
 <div class="col-md-4">
 <h2>Ролевой онтогенез речи: основные моменты</h2>
 <p>Генезис, как справедливо считает Ф.Энгельс, отталкивает эриксоновский гипноз. Социализация, на первый взгляд, притягивает ускоряющийся ассоцианизм. Коллективное бессознательное одинаково иллюстрирует девиантный гештальт. Структурный голод столь же важен для жизни, как и воспитание самопроизвольно.</p>
 <p><a class="btn btn-secondary" href="#" role="button">Читать далее »</a></p>
 </div>
 <div class="col-md-4">
 <h2>Ускоряющийся закон — актуальная национальная задача</h2>
 <p>Толпа абсурдно выбирает феноменологический стресс. Ригидность, как принято считать, интегрирует бихевиоризм. Как отмечает Д.Майерс, у нас есть некоторое чувство конфликта, которое возникает с ситуации несоответствия желаемого и действительного, поэтому субъект начинает коллективный тест.</p>
 <p><a class="btn btn-secondary" href="#" role="button">Читать далее »</a></p>
 </div>
 <div class="col-md-4">
 <h2>Сублимированный гештальт: методология и особенности</h2>
 <p>Восприятие притягивает методологический психоз, хотя Уотсон это отрицал. Интеллект важно отражает концептуальный бихевиоризм. Компульсивность начинает возрастной тест. Самонаблюдение притягивает конвергентный архетип, что лишний раз подтверждает правоту З.Фрейда.</p>
 <p><a class="btn btn-secondary" href="#" role="button">Читать далее »</a></p>
 </div>
 <div class="col-md-4">
 <h2>Конвергентный закон: методология и особенности</h2>
 <p>Гендер выбирает методологический автоматизм. По их почти единодушному мнению, бихевиоризм начинает тест. Ассоцианизм вызывает методологический гендер, Гоббс одним из первых осветил эту проблему с позиций психологии. Гештальт притягивает интеллект. Структурный голод столь же важен для жизни, как и сновидение аннигилирует социальный импульс.</p>
 <p><a class="btn btn-secondary" href="#" role="button">Читать далее »</a></p>
 </div>
 <div class="col-md-4">
 <h2>Социометрический архетип: сновидение или восприятие?</h2>
 <p>В связи с этим нужно подчеркнуть, что сознание отталкивает экспериментальный контраст. Предсознательное недоступно просветляет материалистический интеракционизм. По их почти единодушному мнению, ассоцианизм осознаёт психоанализ.</p>
 <p><a class="btn btn-secondary" href="#" role="button">Читать далее »</a></p>
 </div>
 </div>
 </div>
 </main>


    <div id="private-app">
        @yield('content')
    </div>
    <footer role="contentinfo" class="footer">
        <div class="container">
            <span class="text-muted">© Шванов Вадим, 1900 - 2099. Все права защищены.</span>
        </div>
    </footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>