@extends('basics.CMS.basepage')
@section('main')
    <div class="row cmsKenmerken cmsComponent">
        <div class="kenmerken_container cnt kC componentenCnt">
            <div class="kC_part componentenPart">
                <div class="kC_nieuw col-10 kC_item componentenItem">
                    <form action="{{action('CMSController@store_kenmerk')}}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" name="naam" class="naam" placeholder="Kenmerknaam"/>

                            <input type="text" name="waarde" class="waarde" placeholder="Standaard waarde"/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="uitleg" class="uitleg" placeholder="Uitleg"/>
                        </div>
                        <div class="form-group fg-button">
                            <button type="submit" class="btn btn-primary">Toevoegen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection