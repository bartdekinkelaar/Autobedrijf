<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('basics.CMS.head')
    </head>
    <body>
        <div class="cmsFull col-12">
            @include('basics.CMS.header')
            <div class="col-10 cmsHome">
                <div class="container cmsContainer">
                    @include('basics.CMS.header_title')
                    @yield('main')
                </div>
            </div>
        </div>
    </body>
</html>