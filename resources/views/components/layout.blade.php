<html>
    <head>
        @include('components.head')
    </head>
    <body>
        @yield('content')
        @include('components.script')
        @yield('js')
    </body>
</html>