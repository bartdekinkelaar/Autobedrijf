@extends('basics.CMS.basepage')
@section('main')
    <div class="row cmsPages cmsComponent">
        <div class="pages_container cnt pC componentenCnt">
            <div class="pC_part componentenPart">
                <div class="pC_nieuw col-10 pC_item componentenItem">
                    <form action="{{action('CMSController@store_page')}}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" name="naam" class="naam" placeholder="Naam"/>

                            <input type="text" name="naam_kort" class="naam_kort" placeholder="Naam kort"/>
                        </div>
                        <div class="form-group">
                            <select name="templates">
                                <option value="Templates" selected>Templates</option>
                                @foreach($templates as $template)
                                    <option value="{{$template->template_id}}">{{$template->naam}}</option>
                                @endforeach
                            </select>

                            <input type="number" name="publiek" class="publiek" placeholder="Public"/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="titel" class="titel" placeholder="Titel"/>

                            <button type="submit" class="btn btn-primary">Verzenden</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection