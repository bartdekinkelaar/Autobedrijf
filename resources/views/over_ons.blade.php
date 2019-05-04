@extends('welcome')
    @section('title', 'Service')
        @section('main')
            @parent
            <div class="col-12">
                <div class="row">
                    <div class="over_kop">
                        OVER AUTOBEDRIJF CADDIE
                    </div>
                </div>
                <div class="over_tekst col-8">
                    Autobedrijf Caddie is een vakkundige autogarage in Duiven.
                    <br/>
                    Autobedrijf Caddie staat bekend om zijn uitstekende kwaliteit en service en hecht veel waarde aan service richting de klant, de klant staat bij ons centraal. <br>
                    <br/>
                    &nbsp;
                    Bij reparaties word de klant altijd op de hoogte gehouden en word er duidelijk gecommuniceerd over de reparatie, zoals over wat er vervangen en gerepareerd moet worden. <br/>
                    &nbsp;
                    &nbsp;
                    <br/>
                    Kom eens langs aan de Ringbaan 66 in Duiven (bij Arnhem), de koffie staat klaar.
                </div>
            </div>
            @include('basics.websites.contact_opnemen')
        @endsection
        @include('footer')