<?php
/**
 * Created by PhpStorm.
 * User: Bartj
 * Date: 4-5-2019
 * Time: 16:37
 */
?>
@extends('welcome')
@section('title', 'Occasions')
@section('main')
    @parent
    <div class="col-md-12">
        <div class="filterpage row">
            <div class="over_kop">
                ONZE OCCASIONS
            </div>
            <div class="row">
                @include('cars.filter')
                <div class="col-md-9 auto_overzicht">
                    @foreach($cars as $car)
                        <ul class='auto_vak'>
                            <li class='auto_foto'>
                                <img src="{{URL::asset('/img/car_1.png')}}" />
                            </li>
                            <li class='auto_naam auto_tekst'>
                                {{$car->naam}}
                            </li>
                            <li class='auto_bouwjaar auto_tekst'>
                                <b>Bouwjaar:</b> {{date('Y', strtotime($car->bouwjaar))}}
                            </li>
                            <li class='auto_merk auto_tekst'>
                                <b>Merk:</b> {{$car->merk}}
                            </li>
                            <li class='auto_kilometers auto_tekst'>
                                <b>Kilometers:</b> {{$car->kilometerstand}}
                            </li>
                            <li class='auto_prijs auto_tekst'>
                                <b>Prijs:</b> € {{$car->prijs}}
                            </li>
                            <li class='auto_button auto_tekst'>
                                <button>
                                    <a href="{{ url('./voertuig', ['id' => $car->id]) }}">Bekijk voertuig</a>
                                </button>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('footer')
@endsection