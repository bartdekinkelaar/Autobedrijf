@extends('basics.cms.basepage')
@section('title', $pagename)
@section('main')
    <div class="row cmsPages cmsComponent">
        <div class="pages cnt pC componentenCnt">
            <div class="pC_part componentenPart">
                <div class="pC_nieuw pC_item componentenItem">
                    <table class="table cI_tabel">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Naam</th>
                            <th scope="col">Template naam</th>
                            <th scope="col">Gepubliceerd</th>
                            <th scope="col">Gemaakt op</th>
                            <th scope="col">Aangepast op</th>
                            <th scope="col" colspan="2">Opties</th>
                        </tr>
                        </thead>
                        @if(!empty($pages) && isset($pages))
                            @foreach($pages as $page)
                                <?php
                                $created    = date("d-m-Y", strtotime($page->created_at));
                                $updated    = date("d-m-Y", strtotime($page->updated_at));
                                $temp_id    = $page->template_id;
                                $template   = $templates->where('template_id','=', $temp_id)->first();
                                $public = $page->public;
                                if($public == 1)
                                {
                                    $publiek = "Ja";
                                }
                                else {
                                    $publiek = "Nee";
                                }
                                ?>
                                <tr>
                                    <th scope="row">
                                        {{$page->page_id}}
                                    </th>
                                    <td>
                                        {{$page->name}}
                                    </td>
                                    <td>
                                        {{$template->naam}}
                                    </td>
                                    <td>
                                        {{$publiek}}
                                    </td>
                                    <td>
                                        {{$created}}
                                    </td>
                                    <td>
                                        {{$updated}}
                                    </td>
                                    <td>
                                        <i>Niet beschikbaar</i>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="6">
                                Geen pagina's gevonden
                            </td>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection