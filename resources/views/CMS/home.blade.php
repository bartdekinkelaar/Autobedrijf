@extends('basics.CMS.basepage')
@section('title', $pagename)
@section('main')
    <div class="row cmsDashboard cmsComponent">
        <div class="dashboard_container cnt dC componentenCnt">
            <div class="dC_top dC_part componentenPart">
                <div class="dC_stats col-3 dC_item componentenItem">
                    <div class="itemVak">
                        <p class="iV_icon">
                            <i class="fas fa-users"></i>
                        </p>
                        <h4> 120 </h4>
                        <p class="sI_naam"> bezoekers</p>
                        <p class="sI_overig"> 20 nieuwe deze maand</p>
                    </div>
                </div>
                <div class="dC_stats col-3 dC_item componentenItem">
                    <div class="itemVak">
                        <p class="iV_icon">
                            <i class="fas fa-users"></i>
                        </p>
                        <h4> 120 </h4>
                        <p class="sI_naam"> bezoekers</p>
                        <p class="sI_overig"> 20 nieuwe deze maand</p>
                    </div>
                </div>
                <div class="dC_stats col-3 dC_item componentenItem">
                    <div class="itemVak">
                        <p class="iV_icon">
                            <i class="fas fa-briefcase"></i>
                        </p>
                        <h4>120</h4>
                        <p class="sI_naam"> projecten</p>
                        <p class="sI_overig">20 nieuwe deze maand</p>
                    </div>
                </div>
            </div>
            <div class="dC_middle dC_part">
                <div class="dC_occasions col-3 dC_item componentenItem">
                    <div class="itemVak">
                        <p class="iV_head"> Laatste voertuigen </p>
                        <p class="iV_subHead">Laatste update: <?php echo date('d-m-Y');?> </p>
                        <table class="lastVoertuigen">
                            <tr>
                                <th> Naam </th>
                                <th> Prijs </th>
                                <th> Toegevoegd </th>
                            </tr>
                            @foreach($voertuigen as $voertuig)
                                <?php
                                $nice_price = number_format($voertuig->prijs,0,",",".");
                                $toegevoegd = date("d F", strtotime($voertuig->created_at));
                                ?>
                                <tr>
                                    <td> {{$voertuig->naam}} </td>
                                    <td> € {{$nice_price}} </td>
                                    <td> {{$toegevoegd}} </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="dC_sold col-3 dC_item componentenItem">
                    <div class="itemVak">
                        <p class="iV_head"> Laatst verkocht </p>
                        <p class="iV_subHead">Laatste update: <?php echo date('d-m-Y');?> </p>
                        <table class="lastVoertuigen">
                            @if(!empty($verkocht) && isset($verkocht))
                            <tr>
                                <th> # </th>
                                <th> Prijs </th>
                                <th> Verkocht op </th>
                            </tr>
                                @foreach($verkochte as $verkocht)
                                    <?php
                                    $nice_verkocht = number_format($verkocht->prijs,0,",",".");
                                    $verkocht = date("d F", strtotime($voertuig->updated_at));
                                    ?>
                                    <tr>
                                        <td> {{$verkocht->voertuig_id}} </td>
                                        <td> € {{$nice_verkocht}} </td>
                                        <td> {{$verkocht}} </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td> Geen  voertuigen verkocht </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
                <div class="dC_contacts col-3 dC_item componentenItem">
                    <div class="itemVak">
                        <p class="iV_head"> Laatste berichten </p>
                        <p class="iV_subHead">Laatste update: <?php echo date('d-m-Y');?> </p>
                        <table class="lastVoertuigen">
                            <tr>
                                <th> Naam </th>
                                <th> Prijs </th>
                                <th> Toegevoegd </th>
                            </tr>
                            @foreach($voertuigen as $voertuig)
                                <?php
                                $nice_price = number_format($voertuig->prijs,0,",",".");
                                $toegevoegd = date("d F", strtotime($voertuig->created_at));
                                ?>
                                <tr>
                                    <td> {{$voertuig->naam}} </td>
                                    <td> € {{$nice_price}} </td>
                                    <td> {{$toegevoegd}} </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection