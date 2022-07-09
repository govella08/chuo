@extends('layouts.auth')

@section('title', 'Content Not Found')
@section('description', 'Content Not Found')

@section('content')
<div class="card-container text-center">
    @include('notifications.status_message')
    @include('notifications.errors_message')
</div>

 <div class="card-main">
            <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="{{ asset('cms_assets/images/logo.png') }}" />
              <center>
              <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading" style="color:black">404</h1>
                <h2 style="color:black">Content Not Found!</h2>
                <hr>
                @include('notifications.status_message')
                @include('notifications.errors_message')
               <a href="{{ url('/') }}">Home</a>
            </div>
        </div>
    </header>
    </center>

        </div><!-- /card-container -->
        </div>
@endsection

@section('scripts')
<script src="{!! asset('assets/js/plugins/parsley/parsley.js') !!}"></script>
@endsection