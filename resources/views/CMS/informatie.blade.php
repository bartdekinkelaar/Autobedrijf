@extends('basics.CMS.basepage')
@section('main')
    <div class="col-10 cmsHome">
        <div class="container cmsContainer">
            <div class="row cmsHeading">
                <h3> ALLE VOERTUIGEN </h3>
                <a href="{{ route('nieuw_voertuig') }}">
                    <button class="addComponent_item">
                        <i class="fas fa-plus"></i>
                    </button>
                </a>
            </div>
            <div class="row cmsKenmerken cmsComponent">
                <div class="kenmerken_container cnt kC componentenCnt">
                    <div class="kC_part componentenPart">
                        <div class="kC_nieuw col-10 kC_item componentenItem">
                            <ul class="col-md-6">
                                <form action="nieuw_voertuig" method="POST">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <li>
                                            <label for="NaamLabel">Websitenaam</label><br/>
                                            <input type="text" name="naam" class="naam" placeholder="Naam"/>
                                        </li>
                                        <li>
                                            <label for="PrijsLabel">Prijs (€)</label><br/>
                                            <input type="text" name="prijs" class="prijs" placeholder="Prijs"/>
                                        </li>
                                    </div>
                                    <div class="form-group">
                                        <li>
                                            <label for="MerkLabel">Merk</label><br/>
                                            <input type="text" name="merk" class="merk" placeholder="Merk"/>
                                        </li><li>
                                            <label for="BouwLabel">Bouwjaar</label><br/>
                                            <input type="date" name="bouwdatum" class="bouwjaar" placeholder="Bouwjaar"/>
                                        </li>
                                    </div>
                                    <div class="form-group">
                                        <li>
                                            <label for="BrandLabel">Brandstof</label><br/>
                                            <input type="text" name="brandstof" class="brandstof" placeholder="Brandstof"/>
                                        </li><li>
                                            <label for="TransLabel">Transmissie</label><br/>
                                            <input type="text" name="transmissie" class="transmissie" placeholder="Schakel of automaat"/>
                                        </li>
                                    </div>
                                    <div class="form-group">
                                        <li>
                                            <label for="KmLabel">Kilometerstand</label><br/>
                                            <input type="text" name="kilometerstand" class="km_stand" placeholder="Kilometerstand"/>
                                        </li><li>
                                            <label for="KleurLabel">Kleur</label><br/>
                                            <input type="text" name="kleur" class="kleur" placeholder="Kleur"/>
                                        </li>
                                    </div>
                                    <div class="form-group fg-button">
                                        <li>
                                            <button type="submit" class="btn btn-primary">Verzenden</button>
                                        </li>
                                    </div>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection