<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body>
    <div id="app">
        @include('partials.header')

        @yield('content')
    </div>
    <div class="navbar-fixed-bottom text-center">
    <p>&copy; {{ \Carbon\Carbon::now()->format('Y') }}<a href="http://jaar.lt"> JAAR</a></p>
    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
