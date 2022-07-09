@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{{ __('label.contact', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{{ __('label.contact', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active"> {{ __('label.contact', [], $currentLanguage->locale) }} </li>
@endsection


<!-- page content section -->
@section('page-content')

<!-- messsages -->

@if(session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@elseif(session('error'))
<div class="alert alert-danger">{{session('error')}}</div>
@endif
<!-- ./messsages -->
<div class="contact">

  <!-- Google Map -->
  <div class="google-map mb-3 img-thumbnail">
    <div id="map" class="text-dark">
      <!-- Map goes here -->
  </div>
</div>
<!-- End Google Map -->


<!-- End Google Map -->

<div class="row">
    <div class="col-md-5">
        <address>
            <h6>{{ __('label.site_title') }}.</h6>
            <i class="fa fa-map-marker"></i> {{ __('label.address') }} {{ $contact->{langdb('physical_address')} }}<br>
            <span class="font-bold"><i class="fa fa-phone"></i> {{ __('label.hotline')}}:</span> {!!
            $contact->phone !!}<br>
            <span class="font-bold"><i class="fa fa-fax"></i> {{ __('label.fax')}}: N&#333;:</span> {!!
            $contact->fax !!}<br>
            <span class="font-bold"><i class="fa fa-globe"></i> {{ __('label.email') }}:</span> {!! $contact->email
            !!}<br>
        </address>
    </div>

    <div class="col-md-7">
        <div>
            {!! Form::open(['route' => 'contactus.store', 'class'=> 'add_p']) !!}
            <legend>{!! __('label.feedback') !!}</legend>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    {!! Form::text('names',null,['placeholder'=>'' ,'required', 'autocomplete' => 'off']) !!}
                    <label for="names">{{ __('label.fullname')}}</label>
                </div>
                <div class="col-md-6 col-sm-6">
                    {!! Form::email('email',null,['placeholder'=>'' ,'required', 'autocomplete' => 'off']) !!}
                    <label for="email">{{ __('label.email') }}</label>
                    <p><span class='form_error' style="color:red;">{!! $errors->first('email') !!}</span></p>
                </div>
                <div class="col-md-12 col-sm-12">
                    {!! Form::text('phone',null,['placeholder'=>'' ,'required', 'autocomplete' => 'off']) !!}
                    <label for="names">{{ __('label.phone')}}</label>
                </div>
                    <!-- <div class="col-md-6 col-sm-6">
                                                <input type="text" name="organization" required autocomplete = "off" />
                                                <label for="names">Organization</label>
                                            </div> -->
                                            <div class="col-md-12 col-sm-12 p-1">
                                                {!! Form::text('subject',null,['placeholder'=>'' ,'autofocus','required']) !!}
                                                <label for="names">{{ __('label.subject')}}</label>
                                                <p> <span class='form_error' style="color:red;">{!! $errors->first('subject') !!}</span></p>
                                            </div>
                                            <div class="col-md-12 col-sm-12 p-2">
                                                {!!
                                                    Form::textarea('message',null,['placeholder'=>'Message','cols'=>'30','rows'=>'3','autofocus','required'])
                                                    !!}

                                                    <p><span class='form_error' style="color:red;">{!! $errors->first('message') !!}</span></p>
                                                </div>

                                                <div class="col-md-12 col-sm-12 pt-2 clearfix pl-2 pr-2">
                                                    <!-- Replace data-sitekey with your own one, generated at https://www.google.com/recaptcha/admin -->
                                                    <div class="g-recaptcha pull-right" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"></div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-raised pull-right"> {{ __('label.send') }}</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @stop
                            <!-- ./page content section -->






                            @section('js-content')
                            <script>
                                function initMap() {
        // Set Latitude and Longitude of a location
        var location_name = {
            lat: -6.8169177,
            lng: 39.2924413
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17, //Set Zoom Of a Map
            center: location_name
        });
        //show marker
        var marker = new google.maps.Marker({
            position: location_name,
            map: map //  ,
            // icon: '.images/e-GA.png'
        });
        infoWindow.open(map, marker);
    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcoUpKjmWk5Ng_W-qfpW7LaUGa_lOTzSE&callback=initMap">
</script>

<script src='https://www.google.com/recaptcha/api.js'></script>
@stop
