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
                    <div class="col-md-2 formpart">
                    <form action="{{action('AutoController@indexfilter')}}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="MerkLabel">MERK</label><BR/>
                            <select class="merk" name="merk">
                                @foreach($merk as $merken)
                                <option value="{{$merken}}">{{$merken}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="PrijsLabel">PRIJS</label><BR/>
                            <input type="number" name="minPrijs" class="minPrijs" placeholder="Min. prijs"/>
                            <input type="number" name="maxPrijs" class="maxPrijs" placeholder="Max. prijs"/>
                        </div>
                        <div class="form-group">
                            <label for="JaarLabel">BOUWJAAR</label><BR/>
                            <input type="number" name="minJaar" class="minJaar" placeholder="Min. jaar" />
                            <input type="number" name="maxJaar" class="maxJaar" placeholder="Max. jaar" />
                        </div>
                        <div class="form-group">
                            <label for="TransmissieLabel">TRANSMISSIE</label><BR/>
                            <select name="transmissie">
                                @foreach($transmissie as $transmissies)
                                <option value="{{$transmissies}}">{{$transmissies}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="KilometerLabel">AANTAL KILOMETERS</label><BR/>
                            <input type="number" name="minKM" class="minKM" placeholder="Min. km" />
                            <input type="number" name="maxKM" class="maxKM" placeholder="Max. km" />
                        </div>
                        <button type="submit" class="btn btn-primary">Filteren</button>
                    </form>
                    </div>
                    <div class="col-md-9">
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
                                    <b>Merk:</b> {{$Gekozen_merk}}
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
        <div class="diensten-row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="dienstkop">ONZE DIENSTEN</div>
                    </div>

                </div>
            </div>
        </div>
    @include('footer')
@endsection