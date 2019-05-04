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
                                {{$naam}}
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
                                            {{$kilometerstand}} KM
                                        </p>
                                    </li><li id="kenmerk">
                                        <p id="kenmerk_titel">
                                            Brandstof
                                        </p><p id="kenmerk_tekst">
                                            {{$brandstof}}
                                        </p>
                                    </li><li id="kenmerk">
                                        <p id="kenmerk_titel">
                                            Kleur
                                        </p><p id="kenmerk_tekst">
                                            {{$kleur}}
                                        </p>
                                    </li><li id="kenmerk">
                                        <p id="kenmerk_titel">
                                            Aantal deuren
                                        </p><p id="kenmerk_tekst">
                                            {{$deuren}} deurs
                                        </p>
                                    </li><li id="kenmerk">
                                        <p id="kenmerk_titel">
                                            Transmissie
                                        </p><p id="kenmerk_tekst">
                                            {{$transmissie}}
                                        </p>
                                    </li><li id="kenmerk">
                                        <p id="kenmerk_titel">
                                            Bouwjaar
                                        </p><p id="kenmerk_tekst">
                                            {{date('d-m-Y', strtotime($bouwjaar))}}
                                        </p>
                                    </li><li id="kenmerk">
                                        <p id="kenmerk_titel">
                                            APK geldig tot
                                        </p><p id="kenmerk_tekst">
                                            {{date('d-m-Y', strtotime($APK))}}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="voertuig_prijs">
                              <p id="vtitel">Prijs:</p> € {{$prijs}}
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
                                            {{$versnellingen}} versnellingen
                                        </p>
                                    </li><li id="kenmerk">
                                        <p id="kenmerk_titel">
                                            Zitplaatsen
                                        </p><p id="kenmerk_tekst">
                                            {{$zitplaatsen}} zitplaatsen
                                        </p>
                                    </li><li id="kenmerk">
                                        <p id="kenmerk_titel">
                                            Cilinderinhoud
                                        </p><p id="kenmerk_tekst">
                                            {{$cilinder_inhoud}} CC
                                        </p>
                                    </li><li id="kenmerk">
                                        <p id="kenmerk_titel">
                                            Gewicht
                                        </p><p id="kenmerk_tekst">
                                            {{$gewicht}} KG
                                        </p>
                                    </li><li id="kenmerk">
                                        <p id="kenmerk_titel">
                                            Vermogen
                                        </p><p id="kenmerk_tekst">
                                            {{$vermogen}} PK
                                        </p>
                                    </li><li id="kenmerk">
                                        <p id="kenmerk_titel">
                                            Laadvermogen
                                        </p><p id="kenmerk_tekst">
                                            {{$laadvermogen}} kg
                                        </p>
                                    </li><li id="kenmerk">
                                        <p id="kenmerk_titel">
                                            Topsnelheid
                                        </p><p id="kenmerk_tekst">
                                            {{$topsnelheid}} KM/U
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
                                            {{$stadsverbruik}} versnellingen
                                        </p>
                                    </li><li id="kenmerk">
                                        <p id="kenmerk_titel">
                                            Verbruik
                                        </p><p id="kenmerk_tekst">
                                            {{$verbruik}} CC
                                        </p>
                                    </li><li id="kenmerk">
                                        <p id="kenmerk_titel">
                                            Co² verbruik
                                        </p><p id="kenmerk_tekst">
                                            {{$coverbruik}} PK
                                        </p>
                                    </li>
                                </ul>
                            </div>
                    </div>