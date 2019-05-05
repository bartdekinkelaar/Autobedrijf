<?php
/**
 * Created by PhpStorm.
 * User: Bartj
 * Date: 4-5-2019
 * Time: 16:38
 */
?>
<div class="occasion_filter col-md-2">
    <button class="filtershow" type="button" data-toggle="collapse" data-target="#autofilter" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        Filter bekijken
        <i class="fas fa-angle-down"></i>
    </button>
    <div class="formpart collapse" id="autofilter">
        <form action="{{action('AutoController@indexfilter')}}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group kleingroup">
                <label for="MerkLabel">MERK</label><br/>
                <select class="merk" name="merk">
                    @foreach($carBrands as $brand)
                        <option value="{{$brand->brand_id}}">{{$brand->brandname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group kleingroup">
                <label for="TransmissieLabel">TRANSMISSIE</label><br/>
                <select name="transmissie">
                    <?php $transmissies = get_transmissie();?>
                    @foreach($transmissies as $transmissie)
                        <option value="{{$transmissie}}">{{$transmissie}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group grootgroup">
                <label for="PrijsLabel">PRIJS</label><br/>
                <input type="number" name="minPrijs" class="minPrijs" placeholder="Min. prijs"/>
                <input type="number" name="maxPrijs" class="maxPrijs" placeholder="Max. prijs"/>
            </div>
            <div class="form-group grootgroup">
                <label for="JaarLabel">BOUWJAAR</label><br/>
                <input type="number" name="minJaar" class="minJaar" placeholder="Min. jaar" />
                <input type="number" name="maxJaar" class="maxJaar" placeholder="Max. jaar" />
            </div>
            <div class="form-group grootgroup">
                <label for="KilometerLabel">AANTAL KILOMETERS</label><br/>
                <input type="number" name="minKM" class="minKM" placeholder="Min. km" />
                <input type="number" name="maxKM" class="maxKM" placeholder="Max. km" />
            </div>
            <div class="form-group buttongroup">
                <button type="submit" class="btn btn-primary">Filteren</button>
            </div>
        </form>
    </div>
</div>