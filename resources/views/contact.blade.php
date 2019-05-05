@extends('welcome')
    @section('title', 'Contact')
    @section('main')
        @parent
        <div class="col-md-12">
            <div class="container">
                <div class="row">
                    <div class="over_kop">
                        CONTACT
                    </div>
                </div>
                <div class="row">
                    <div class="contact_info col-md-6">
                        <div class="contactvak col-md-9">
                            <p class="contact_titel">CONTACTINFORMATIE</p>
                            <ul class="contact_lijst col-md-9">
                                <?php $general    = get_general_info();?>
                                <li class="bedrijfstitel">  {{ $general['companyName'] }} </li>
                                <li class="contact_item">   {{ $general['companyAddress'] }} </li>
                                <li class="contact_item">   {{ $general['companyZipcode'] }} {{ $general['companyCity'] }}</li>
                                <li class="contact_item"></li>
                                <li class="contact_item">   {{ $general['companyEmail'] }} </li>
                                <li class="contact_item">   {{ $general['companyPhone'] }} </li>
                            </ul>
                        </div>
                    </div>
                    <div class="contact_tijden col-md-6">
                        <div class="contactvak col-md-9">
                            <p class="contact_titel">OPENINGSTIJDEN</p>
                            <ul class="contact_lijst col-md-9">
                                <li class="contact_item">
                                    <p class="left_item">Maandag</p>
                                    <p class="right-item">08:30 - 17:00</p>
                                </li>
                                <li class="contact_item">
                                    <p class="left_item">Dinsdag</p>
                                    <p class="right-item">08:30 - 17:00</p>
                                </li>
                                <li class="contact_item">
                                    <p class="left_item">Woensdag</p>
                                    <p class="right-item">08:30 - 17:00</p>
                                </li>
                                <li class="contact_item">
                                    <p class="left_item">Donderdag</p>
                                    <p class="right-item">08:30 - 17:00</p>
                                </li>
                                <li class="contact_item">
                                    <p class="left_item">Vrijdag</p>
                                    <p class="right-item">08:30 - 16:00</p>
                                </li>
                                <li class="contact_item">
                                    <p class="left_item">Zaterdag</p>
                                    <p class="right-item">09:30 - 13:00</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('basics.Web.maps_info')
        @include('footer')
        @endsection