@extends('basics.CMS.basepage')
@section('title', $pagename)
@section('main')
    <div class="row cmsKenmerken cmsComponent">
        <div class="kenmerken_container cnt kC componentenCnt">
            <div class="kC_part componentenPart">
                <div class="kc_nieuw kC_item componentenItem">
                    <table class="table cI_tabel">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kenmerk</th>
                            <th scope="col">Standaard</th>
                            <th scope="col">Uitleg</th>
                            <th scope="col" colspan="2">Opties</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(empty($number))
                        {
                            $number = 0;
                            $page_number = 0;
                        }
                        else
                        {
                            $page_number = $number;
                        }
                        $next_page = $page_number + 1;
                        ?>
                        @foreach($features as $feature)
                            <?php $feature_counter = $feature->kenmerk_id;?>
                            @if($feature_counter <= 10 && $number == 0)
                                <tr>
                                    <th scope="row"> {{$feature->kenmerk_id}}</th>
                                    <td> {{$feature->kenmerk_naam}} </td>
                                    <td> {{$feature->kenmerk_standaard}} </td>
                                    <td class="cI_tabelUitleg"> {{$feature->kenmerk_uitleg}} </td>
                                    <td class="componentOpties cO_een">
                                        <a href="{{ url('CMS/kenmerk', ['id' => $feature->kenmerk_id]) }}">
                                            Bewerken
                                        </a>
                                    </td>
                                    <td class="componentOpties">
                                        <a href="{{route('CMS.delete',$feature->kenmerk_id)}}">
                                            Verwijderen
                                        </a>
                                    </td>
                                </tr>
                                @if($feature_counter == 10)
                                    <tr>
                                        <td colspan="6">
                                            <a href="{{ url('CMS/allFeatures/'.$next_page) }}">Volgende pagina</a>
                                        </td>
                                    </tr>
                                @endif
                            @elseif($feature_counter > 10 && $number > 0)
                                <?php $last_page = $number - 1;?>
                                <tr>
                                    <th scope="row"> {{$feature->kenmerk_id}}</th>
                                    <td> {{$feature->kenmerk_naam}} </td>
                                    <td> {{$feature->kenmerk_standaard}} </td>
                                    <td class="cI_tabelUitleg"> {{$feature->kenmerk_uitleg}} </td>
                                    <td class="componentOpties cO_een">
                                        <a href="{{ url('CMS/occasion', ['id' => $feature->kenmerk_id]) }}">
                                            Bewerken
                                        </a>
                                    </td>
                                    <td class="componentOpties">
                                        <a href="{{route('CMS.delete',$feature->kenmerk_id)}}">
                                            Verwijderen
                                        </a>
                                    </td>
                                </tr>
                                @if($feature_counter == $count)
                                    <?php $last_page = $number - 1;?>
                                    <tr>
                                        <td colspan="6">
                                            @if($last_page == 0)
                                                <a href="{{ route('allFeatures') }}">Vorige pagina</a>
                                            @else
                                                <a href="{{ url('CMS/allFeatures/'.$last_page) }}">Vorige pagina</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection