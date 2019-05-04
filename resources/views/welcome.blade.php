<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>@yield('title') - Autobedrijf Caddie</title>
        @include('basics.Web.headpart')
    </head>
    <body>
        @include('basics.Web.header')
            @yield('main')
    </body>
</html>