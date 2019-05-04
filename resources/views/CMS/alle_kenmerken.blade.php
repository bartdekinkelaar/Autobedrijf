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
                        @foreach($kenmerken as $kenmerk)
                            <?php $kenmerk_counter = $kenmerk->kenmerk_id;?>
                            @if($kenmerk_counter <= 10 && $number == 0)
                                <tr>
                                    <th scope="row"> {{$kenmerk->kenmerk_id}}</th>
                                    <td> {{$kenmerk->kenmerk_naam}} </td>
                                    <td> {{$kenmerk->kenmerk_standaard}} </td>
                                    <td class="cI_tabelUitleg"> {{$kenmerk->kenmerk_uitleg}} </td>
                                    <td class="componentOpties cO_een">
                                        <a href="{{ url('CMS/kenmerk', ['id' => $kenmerk->kenmerk_id]) }}">
                                            Bewerken
                                        </a>
                                    </td>
                                    <td class="componentOpties">
                                        <a href="{{route('CMS.delete',$kenmerk->kenmerk_id)}}">
                                            Verwijderen
                                        </a>
                                    </td>
                                </tr>
                                @if($kenmerk_counter == 10)
                                    <tr>
                                        <td colspan="6">
                                            <a href="{{ url('CMS/alle_kenmerken/'.$next_page) }}">Volgende pagina</a>
                                        </td>
                                    </tr>
                                @endif
                            @elseif($kenmerk_counter > 10 && $number > 0)
                                <?php $last_page = $number - 1;?>
                                <tr>
                                    <th scope="row"> {{$kenmerk->kenmerk_id}}</th>
                                    <td> {{$kenmerk->kenmerk_naam}} </td>
                                    <td> {{$kenmerk->kenmerk_standaard}} </td>
                                    <td class="cI_tabelUitleg"> {{$kenmerk->kenmerk_uitleg}} </td>
                                    <td class="componentOpties cO_een">
                                        <a href="{{ url('CMS/occasion', ['id' => $kenmerk->kenmerk_id]) }}">
                                            Bewerken
                                        </a>
                                    </td>
                                    <td class="componentOpties">
                                        <a href="{{route('CMS.delete',$kenmerk->kenmerk_id)}}">
                                            Verwijderen
                                        </a>
                                    </td>
                                </tr>
                                @if($kenmerk_counter == $count)
                                    <?php $last_page = $number - 1;?>
                                    <tr>
                                        <td colspan="6">
                                            @if($last_page == 0)
                                                <a href="{{ route('alle_kenmerken') }}">Vorige pagina</a>
                                            @else
                                                <a href="{{ url('CMS/alle_kenmerken/'.$last_page) }}">Vorige pagina</a>
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