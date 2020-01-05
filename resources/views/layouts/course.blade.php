<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.head')

<body>
    <div id="app">
        <header class="header">
            @include('menu.course_nav')
        </header>

        <main class="container">
            @yield('content')
        </main>

        <footer>
            @include('layouts.footer')
        </footer>
    </div>
</body>
</html>