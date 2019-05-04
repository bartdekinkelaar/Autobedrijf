<!doctype html>
<html lang="{{ app()->getLocale() }}">
    @include('basics.websites.headpart')
    <body>
        @include('basics.websites.header')
        <div class="col-md-12">
            <div class="voertuigpage row">
                <div class="row">
                    <div class="voertuig_slider col-md-7">
                        <img src="../img/car_2.png"/>
                    </div>
                    @include('voertuig_kenmerken')
                </div>
            </div>
        </div>
        @include('footer')
</body>
</html>