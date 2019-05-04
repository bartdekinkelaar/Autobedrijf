@extends('basics.CMS.basepage')
@section('main')
    <div class="row cmsFormulieren cmsComponent">
        <div class="kenmerken_container cnt fC componentenCnt">
            <div class="fC_part componentenPart">
                <div class="fC_nieuw col-10 fC_item componentenItem">
                    <form action="{{action('CMSController@store_formulier')}}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" name="naam" class="naam" placeholder="Naam"/>

                            <input type="text" name="actief" class="actief" placeholder="Actief"/>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<input type="text" name="uitleg" class="uitleg" placeholder="Uitleg"/>--}}
                        {{--</div>--}}
                        <div class="form-group fg-button">
                            <button type="submit" class="btn btn-primary">Toevoegen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection