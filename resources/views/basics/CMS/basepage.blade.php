<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('basics.cms.head')
    </head>
    <body>
        <div class="cmsFull col-12">
            @include('basics.cms.header')
            <div class="col-10 cmsHome">
                <div class="container cmsContainer">
                    @include('basics.cms.header_title')
                    @yield('main')
                </div>
            </div>
        </div>
    </body>
</html>