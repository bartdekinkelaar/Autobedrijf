<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>@yield('title') - Autobedrijf Caddie</title>
        @include('basics.websites.headpart')
    </head>
    <body>
        @include('basics.websites.header')
            @yield('main')
    </body>
</html>