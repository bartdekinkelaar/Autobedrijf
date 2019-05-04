@extends('welcome')
    @section('title', 'Home')
        @section('main')
            @parent
            <div class="slider">
                    <img src="./img/slider_1.png" class="slider1"/>
            </div>
            <div class="col-md-12 hoofdcol">
                <div class="container">
                    <div class="row">
                        <div class="over_kop">
                            AUTOBEDRIJF CADDIE
                        </div>
                    </div>
                    <div class="over_tekst">
                        Bij Autobedrijf Caddie kunt u terecht voor onderhoud, reparatie, APK keuringen en occasions.
                        <br/> Autobedrijf Caddie beschikt over een moderne werkplaats om uw auto optimaal te kunnen verzorgen.
                        <br/> Centraal binnen ons bedrijf staat persoonlijke service: korte lijnen en heldere communicatie vinden wij belangrijk.
                        <br/> Dit zorgt ervoor dat u als klant precies weet wat u van ons kunt verwachten.
                    </div>
                </div>
            </div>
            @include('basics.websites.diensten')
            @include('footer')
        @endsection