@extends('basics.CMS.basepage')
@section('main')
    <div class="col-10 cmsHome">
        <div class="container cmsContainer">
            <div class="row cmsHeading">
                <h3> {{$car->name}} </h3>
                <h4> uit {{$build_date->year}} </h4>
                <a href="{{ route('CMS.cars') }}">
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
                                        <input type="text" name="naam" class="naam" placeholder="Naam: {{$car->name}}"/>

                                        <input type="text" name="prijs" class="prijs" placeholder="Prijs: {{$car->price}}"/>
                                </div>
                                <div class="form-group">
                                        <?php
                                            $brand  = $carBrands->where('brand_id', '=', $car->brand_id)->first();
                                            $brands = $carBrands;
                                        ?>
                                        <input type="text" name="merk" class="merk" placeholder="Merknaam:{{$brand->brandname}}"/>

                                        <input type="text" name="bouwjaar" class="bouwjaar" placeholder="Bouwjaar: {{$car->year}}"/>
                                </div>
                                <div class="form-group">
                                        <input type="text" name="brandstof" class="brandstof" placeholder="Brandstof: {{$carInfo->fuel}}"/>

                                        <input type="text" name="transmissie" class="transmissie" placeholder="Transmissie: {{$carInfo->transmission}}"/>
                                </div>
                                <div class="form-group">
                                        <input type="text" name="km_stand" class="km_stand" placeholder="Kilometerstand: {{$carInfo->transmission}}"/>

                                        <input type="text" name="kleur" class="kleur" placeholder="Kleur: {{$carInfo->color}}"/>
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