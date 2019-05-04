<div class="diensten-row">
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="leftmaps">
                    <div class="dienstkop">LOCATIE</div>
                    <div class="map" id="map"></div>
                </div>
                <div class="rightmaps">
                    <div class="dienstkop">CONTACTFORMULIER</div>
                    <!-- <p class="contact_titel">OPENINGSTIJDEN</p> -->
                    <ul class="contact_form col-md-7">
                        <form action="#" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="NaamLabel">Volledige naam</label><br/>
                            <input type="text" name="naam" class="naam" placeholder="Uw Naam"/>
                        </div>
                        <div class="form-group">
                            <label for="EmailLabel">Emailadres</label><br/>
                            <input type="text" name="naam" class="naam" placeholder="Uw Emailadres"/>
                        </div>
                        <div class="form-group">
                            <label for="NaamLabel">Bericht</label><br/>
                            <textarea name="naam" class="naam" placeholder="Uw Bericht"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Verzenden</button>
                    </form>
<!--                         <li class="contact_item">
                            <p class="left_item">Maandag</p>
                            <p class="right-item">08:30 - 17:00</p>
                        </li>
                        <li class="contact_item">
                            <p class="left_item">Maandag</p>
                            <p class="right-item">08:30 - 17:00</p>
                        </li>
                        <li class="contact_item">
                            <p class="left_item">Maandag</p>
                            <p class="right-item">08:30 - 17:00</p>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: 51.967894, lng: 5.992409};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 9, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>