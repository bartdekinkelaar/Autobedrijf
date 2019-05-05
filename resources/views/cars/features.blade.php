<script type="text/javascript">
$(document).ready(function(){
    $(".show_algemeen").click(function(){
        $("#voertuig_algemeen").toggle();
        $("#voertuig_milieu").hide();
    });
    $(".show_milieu").click(function(){
        $("#voertuig_algemeen").hide();
        $("#voertuig_milieu").toggle();
    });
});
</script>
<div class="voertuig_basis col-md-5">
    <div class="voertuigbasis">
        <div class="voertuignaam">
            {{$car->naam}}
        </div>
        <div class="voertuiginfo_vak">
            <ul class="voertuig_menu">
                <li>Algemeen</li>
            </ul>
            <ul class="voertuig_info">
                <li id="kenmerk">
                    <p id="kenmerk_titel">
                        Kilometerstand
                    </p><p id="kenmerk_tekst">
                        {{$car->kilometerstand}} KM
                    </p>
                </li><li id="kenmerk">
                    <p id="kenmerk_titel">
                        Brandstof
                    </p><p id="kenmerk_tekst">
                        {{$carInfo->brandstof}}
                    </p>
                </li><li id="kenmerk">
                    <p id="kenmerk_titel">
                        Kleur
                    </p><p id="kenmerk_tekst">
                        {{$carInfo->kleur}}
                    </p>
                </li><li id="kenmerk">
                    <p id="kenmerk_titel">
                        Aantal deuren
                    </p><p id="kenmerk_tekst">
                        {{$car->deuren}} deurs
                    </p>
                </li><li id="kenmerk">
                    <p id="kenmerk_titel">
                        Transmissie
                    </p><p id="kenmerk_tekst">
                        {{$car->transmissie}}
                    </p>
                </li><li id="kenmerk">
                    <p id="kenmerk_titel">
                        Bouwjaar
                    </p><p id="kenmerk_tekst">
                        {{date('d-m-Y', strtotime($car->bouwjaar))}}
                    </p>
                </li><li id="kenmerk">
                    <p id="kenmerk_titel">
                        APK geldig tot
                    </p><p id="kenmerk_tekst">
                        {{date('d-m-Y', strtotime($carInfo->APK))}}
                    </p>
                </li>
            </ul>
        </div>
        <div class="voertuig_prijs">
          <p id="vtitel">Prijs:</p> € {{$car->prijs}}
        </div>
    </div>
</div>
<div class="voertuig_informatie col-md-7">
    <ul class="voertuig_menu">
        <li><a href="#" class="show_algemeen">Algemeen</a></li>
        <li><a href="#" class="show_milieu">Milieu</a></li>
        </ul>
        <div id="voertuig_algemeen" style="display:none;">
            <ul class="voertuig_info">
                <li id="kenmerk">
                    <p id="kenmerk_titel">
                        Versnellingen
                    </p><p id="kenmerk_tekst">
                        {{$car->versnellingen}} versnellingen
                    </p>
                </li><li id="kenmerk">
                    <p id="kenmerk_titel">
                        Zitplaatsen
                    </p><p id="kenmerk_tekst">
                        {{$carInfo->zitplaatsen}} zitplaatsen
                    </p>
                </li><li id="kenmerk">
                    <p id="kenmerk_titel">
                        Cilinderinhoud
                    </p><p id="kenmerk_tekst">
                        {{$car->cilinder_inhoud}} CC
                    </p>
                </li><li id="kenmerk">
                    <p id="kenmerk_titel">
                        Gewicht
                    </p><p id="kenmerk_tekst">
                        {{$car->gewicht}} KG
                    </p>
                </li><li id="kenmerk">
                    <p id="kenmerk_titel">
                        Vermogen
                    </p><p id="kenmerk_tekst">
                        {{$car->vermogen}} PK
                    </p>
                </li><li id="kenmerk">
                    <p id="kenmerk_titel">
                        Laadvermogen
                    </p><p id="kenmerk_tekst">
                        {{$car->laadvermogen}} kg
                    </p>
                </li><li id="kenmerk">
                    <p id="kenmerk_titel">
                        Topsnelheid
                    </p><p id="kenmerk_tekst">
                        {{$car->topsnelheid}} KM/U
                    </p>
                </li>
            </ul>
        </div>
        <div id="voertuig_milieu" style="display:none;">
            <ul class="voertuig_info">
                <li id="kenmerk">
                    <p id="kenmerk_titel">
                        Stadsverbruik
                    </p><p id="kenmerk_tekst">
                        {{$car->stadsverbruik}} versnellingen
                    </p>
                </li><li id="kenmerk">
                    <p id="kenmerk_titel">
                        Verbruik
                    </p><p id="kenmerk_tekst">
                        {{$car->verbruik}} CC
                    </p>
                </li><li id="kenmerk">
                    <p id="kenmerk_titel">
                        Co² verbruik
                    </p><p id="kenmerk_tekst">
                        {{$car->coverbruik}} PK
                    </p>
                </li>
            </ul>
        </div>
</div>