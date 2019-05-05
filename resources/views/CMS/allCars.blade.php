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
                        @foreach($cars as $car)
                            <tr>
                                <?php
                                $nice_price = number_format($car->price,0,",",".");
                                $brand  = $carBrands->find($car->brand_id);
                                $brands = $carBrands;
                                ?>
                                <th scope="row">{{$car->name}}</th>
                                <td>€ {{$nice_price}}</td>
                                <td>{{$brand->brandname}}</td>
                                <td>{{$car->year}}</td>
                                <td>{{$car->transmission}}</td>
                                <td>{{$car->doors}} deurs</td>
                                <td class="componentOpties cO_een">
                                    <a href="{{ url('CMS/car', ['id' => $car->id]) }}">
                                        Bewerken
                                    </a>
                                </td>
                                <td class="componentOpties">
                                    <a href="{{route('CMS.delete',$car->id)}}">
                                        {{--<a href="{{ url('CMS/delete_occasion', ['id' => $car->id]) }}">--}}
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