@extends('basics.CMS.basepage')
@section('main')
    <div class="row cmsVoertuigen cmsComponent">
        <div class="voertuigen_container cnt vC componentenCnt">
            <div class="vC_part componentenPart">
                <div class="vC_nieuw col-10 vC_item componentenItem">
                    <form action="{{action('CMSController@store')}}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" name="naam" class="naam" placeholder="Naam"/>

                            <input type="text" name="prijs" class="prijs" placeholder="Prijs"/>
                        </div>
                        <div class="form-group">
                            <select name="merken">
                                    <option value="Merken" selected>Merken</option>
                                @foreach($merken as $merk)
                                    <option value="{{$merk->merk_id}}">{{$merk->merknaam}}</option>
                                @endforeach
                            </select>

                            <input type="number" name="zitplaatsen" class="zitplaatsen" placeholder="Zitplaatsen"/>
                        </div>
                        <div class="form-group">
                            <input type="date" name="APK" class="apk" placeholder="APK"/>

                            <input type="date" name="bouwdatum" class="bouwjaar" placeholder="Bouwjaar"/>

                        </div>
                        <div class="form-group">
                            <select name="brandstof">
                                <option value="Brandstof" selected>Brandstof</option>
                                <option value="benzine">Benzine</option>
                                <option value="diesel">Diesel</option>
                                <option value="elektrisch">Elektrisch</option>
                            </select>

                            <select name="transmissie">
                                <option value="Transmissie" selected>Transmissie</option>
                                <option value="handgeschakeld">Handgeschakeld</option>
                                <option value="automaat">Automaat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="kilometerstand" class="km_stand" placeholder="Kilometerstand"/>

                            <input type="text" name="kleur" class="kleur" placeholder="Kleur"/>
                        </div>
                        <div class="form-group">
                            <input type="number" name="deuren" class="deuren" placeholder="Deuren"/>

                            <button type="submit" class="btn btn-primary">Verzenden</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection