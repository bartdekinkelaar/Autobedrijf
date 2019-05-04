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
                        <div class="occasion_filter col-md-2">
                            <button class="filtershow" type="button" data-toggle="collapse" data-target="#autofilter" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                Filter bekijken 
                                <i class="fas fa-angle-down"></i>
                            </button>
                        <div class="formpart collapse" id="autofilter">
                        <form action="{{action('AutoController@indexfilter')}}" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group kleingroup">
                                <label for="MerkLabel">MERK</label><BR/>
                                <select class="merk" name="merk">
                                    @foreach($merk as $merken)
                                    <option value="{{$merken}}">{{$merken}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group kleingroup">
                                <label for="TransmissieLabel">TRANSMISSIE</label><BR/>
                                <select name="transmissie">
                                    @foreach($transmissie as $transmissies)
                                    <option value="{{$transmissies}}">{{$transmissies}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group grootgroup">
                                <label for="PrijsLabel">PRIJS</label><BR/>
                                <input type="number" name="minPrijs" class="minPrijs" placeholder="Min. prijs"/>
                                <input type="number" name="maxPrijs" class="maxPrijs" placeholder="Max. prijs"/>
                            </div>
                            <div class="form-group grootgroup">
                                <label for="JaarLabel">BOUWJAAR</label><BR/>
                                <input type="number" name="minJaar" class="minJaar" placeholder="Min. jaar" />
                                <input type="number" name="maxJaar" class="maxJaar" placeholder="Max. jaar" />
                            </div>
                            <div class="form-group grootgroup">
                                <label for="KilometerLabel">AANTAL KILOMETERS</label><BR/>
                                <input type="number" name="minKM" class="minKM" placeholder="Min. km" />
                                <input type="number" name="maxKM" class="maxKM" placeholder="Max. km" />
                            </div>
                            <div class="form-group buttongroup">
                                <button type="submit" class="btn btn-primary">Filteren</button>
                            </div>
                        </form>
                        </div>
                    </div>
                        <div class="col-md-9 auto_overzicht">
                            @foreach($autos as $auto)
                            <ul class='auto_vak'>
                                <li class='auto_foto'>
                                    <img src="{{URL::asset('/img/car_1.png')}}" />
                                </li>
                                <li class='auto_naam auto_tekst'>
                                    {{$auto->naam}}
                                </li>
                                <li class='auto_bouwjaar auto_tekst'>
                                    <b>Bouwjaar:</b> {{date('Y', strtotime($auto->bouwjaar))}}
                                </li>
                                <li class='auto_merk auto_tekst'>
                                    <b>Merk:</b> {{$auto->merk}}
                                </li>
                                <li class='auto_kilometers auto_tekst'>
                                    <b>Kilometerstand:</b> {{$auto->kilometerstand}}
                                </li>
                                <li class='auto_prijs auto_tekst'>
                                    <b>Prijs:</b> € {{$auto->prijs}}
                                </li>
                                <li class='auto_button auto_tekst'>
                                    <button>
                                        <a href="{{ url('./voertuig', ['id' => $auto->id]) }}">Bekijk voertuig</a>
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