@extends('welcome')
    @section('title', 'Service')
        @section('main')
            @parent
            <div class="col-md-12">
                <div class="row">
                    <div class="over_kop">
                        ONZE DIENSTEN
                    </div>
                </div>
                <ul class="diensten_overzicht">
                    <li class="img img_reparaties">  
                    </li>
                    <li class="tekst backrood">Bij Autobedrijf Caddie kun je terecht voor reparaties van verschillende merken auto's.
                        <br>
                        Of je nou een Mercedes, BMW, Volkswagen of Toyota hebt, bijna altijd kun je bij Autobedrijf Caddie terecht!
                        <div class="dienst_button">
                            <a href="{{ url('./contact') }}">Maak een afspraak</a>
                        </div>
                    </li>
                    <li class="tekst backwit">Ook voor APK-keuringen ben je bij Autobedrijf Caddie aan het juiste adres.
                        <br>
                        Ongeacht welke merk of model, voor een APK-keuring ben je altijd bij Autobedrijf Caddie aan het juiste adres.
                        <div class="dienst_button">
                            <a href="{{ url('./contact') }}">Maak een afspraak</a>
                        </div>
                    </li>
                    <li class="img img_apk">
                    </li>
                </ul>
            </div>
            @include('footer')
    @endsection