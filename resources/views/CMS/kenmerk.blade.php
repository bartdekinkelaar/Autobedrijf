@extends('basics.CMS.basepage')
@section('main')
    <div class="col-10 cmsHome">
        <div class="container cmsContainer">
            <div class="row cmsHeading">
                <h3> {{$feature->kenmerk_naam}} </h3>
                <a href="{{ route('allFeatures') }}">
                    <button class="backTo_allItems">
                        <i class="fas fa-arrow-left"></i>
                        Terug
                    </button>
                </a>
            </div>
            <div class="row cmsKenmerken cmsComponent">
                <div class="kenmerken_container cnt kC componentenCnt">
                    <div class="kC_part componentenPart">
                        <div class="kC_nieuw col-10 kC_item componentenItem">
                            <form action="kenmerk" method="POST">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <input type="text" name="naam" class="naam" placeholder="Naam: {{$feature_naam}}"/>

                                    <input type="text" name="prijs" class="prijs" placeholder="Standaard waarde: {{$feature_standaard}}"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="merk" class="merk" placeholder="Uitleg: {{$feature_uitleg}}"/>
                               </div>
                                <div class="form-group fg-button">
                                    <button type="submit" class="btn btn-primary">Bijwerken</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection