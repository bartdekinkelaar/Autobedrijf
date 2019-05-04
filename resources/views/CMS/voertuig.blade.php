@extends('basics.cms.basepage')
@section('main')
    <div class="col-10 cmsHome">
        <div class="container cmsContainer">
            <div class="row cmsHeading">
                <h3> {{$voertuignaam}} </h3>
                <h4> uit {{$bouwjaar}} </h4>
                <a href="{{ route('alle_voertuigen') }}">
                    <button class="backTo_allItems">
                        <i class="fas fa-arrow-left"></i>
                        Terug
                    </button>
                </a>
            </div>
            <div class="row cmsVoertuigen cmsComponent">
                <div class="voertuigen_container cnt vC componentenCnt">
                    <div class="vC_part componentenPart">
                        <div class="vC_nieuw col-10 vC_item componentenItem">
                            <form action="voertuig" method="POST">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                        <input type="text" name="naam" class="naam" placeholder="Naam: {{$naam}}"/>

                                        <input type="text" name="prijs" class="prijs" placeholder="Prijs: {{$prijs}}"/>
                                </div>
                                <div class="form-group">
                                        <?php
                                            $merknaam   = DB::table('voertuig_merken')->where('merk_id', '=', $merk_id)->value('merknaam');
                                            $merken     = DB::table('voertuig_merken')->get();
                                        ?>
                                        <input type="text" name="merk" class="merk" placeholder="Merknaam:{{$merknaam}}"/>

                                        <input type="text" name="bouwjaar" class="bouwjaar" placeholder="Bouwjaar: {{$bouwdatum}}"/>
                                </div>
                                <div class="form-group">
                                        <input type="text" name="brandstof" class="brandstof" placeholder="Brandstof: {{$brandstof}}"/>

                                        <input type="text" name="transmissie" class="transmissie" placeholder="Transmissie: {{$transmissie}}"/>
                                </div>
                                <div class="form-group">
                                        <input type="text" name="km_stand" class="km_stand" placeholder="Kilometerstand: {{$km_stand}}"/>

                                        <input type="text" name="kleur" class="kleur" placeholder="Kleur: {{$kleur}}"/>
                                </div>
                                <div class="form-group fg-button">
                                        <button type="submit" class="btn btn-primary">Verzenden</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection