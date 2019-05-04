@extends('basics.CMS.basepage')
@section('title', $pagename)
@section('main')
    <div class="row cmsVoertuigen cmsComponent">
        <div class="voertuigen_container cnt vC componentenCnt">
            <div class="vC_part componentenPart">
                <div class="vC_nieuw vC_item componentenItem">
                    <table class="table cI_tabel">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Naam</th>
                            <th scope="col">Prijs</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Bouwjaar</th>
                            <th scope="col">Transmissie</th>
                            <th scope="col">Deuren</th>
                            <th scope="col" colspan="2">Opties</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($voertuigen as $voertuig)
                            <tr>
                                <?php
                                $nice_price = number_format($voertuig->prijs,0,",",".");
                                $merknaam   = DB::table('voertuig_merken')->where('merk_id', '=', $voertuig->merk_id)->value('merknaam');
                                $merken     = DB::table('voertuig_merken')->get()
                                ?>
                                <th scope="row">{{$voertuig->naam}}</th>
                                <td>€ {{$nice_price}}</td>
                                <td>{{$merknaam}}</td>
                                <td>{{$voertuig->bouwjaar}}</td>
                                <td>{{$voertuig->transmissie}}</td>
                                <td>{{$voertuig->deuren}} deurs</td>
                                <td class="componentOpties cO_een">
                                    <a href="{{ url('CMS/voertuig', ['id' => $voertuig->id]) }}">
                                        Bewerken
                                    </a>
                                </td>
                                <td class="componentOpties">
                                    <a href="{{route('CMS.delete',$voertuig->id)}}">
                                        {{--<a href="{{ url('CMS/delete_occasion', ['id' => $voertuig->id]) }}">--}}
                                        Verwijderen
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection