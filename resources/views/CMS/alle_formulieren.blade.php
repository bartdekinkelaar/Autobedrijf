@extends('basics.cms.basepage')
@section('title', $pagename)
@section('main')
            <div class="row cmsFormulieren cmsComponent">
                <div class="formulieren cnt fC componentenCnt">
                    <div class="fC_part componentenPart">
                        <div class="fC_nieuw fC_item componentenItem">
                            <table class="table cI_tabel">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Naam</th>
                                    <th scope="col">Actief</th>
                                    <th scope="col">Gemaakt op</th>
                                    <th scope="col">Aangepast op</th>
                                    <th scope="col" colspan="2">Opties</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($formulieren) && !isset($formulieren))
                                    @foreach($formulieren as $formulier)
                                        <th scope="row">
                                            {{$formulier->form_id}}
                                        </th>
                                        <td>
                                            {{$formulier->naam}}
                                        </td>
                                        <td>
                                            {{$formulier->actief}}
                                        </td>
                                        <td>
                                            {{$formulier->created_at}}
                                        </td>
                                        <td>
                                            {{$formulier->updated_at}}
                                        </td>
                                        <td>
                                            <i>Niet beschikbaar</i>
                                        </td>
                                    @endforeach
                                @else
                                    <td colspan="6">
                                        Geen formulieren gevonden
                                    </td>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection