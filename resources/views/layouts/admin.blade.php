<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.head')

<body>
    <div id="app">
        <header class="header mb-4">
            @include('menu.admin_nav')
        </header>

        <main class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-4">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger mt-4">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @yield('content')
        </main>

        <footer>
            @include('layouts.footer')
        </footer>
    </div>
    @stack('scripts')
</body>
</html>
