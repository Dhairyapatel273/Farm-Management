<html>
    <head>
        @include('components.head')
        @include('components.navbar')
    </head>
    <body>
        @yield('content')
        @include('components.script')
        @yield('js')
    </body>
</html>