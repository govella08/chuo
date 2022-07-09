@extends('site.layout')
@section('title')
    @if(curlang() == '_sw')
        {!! __('label.welcome_note') !!}
    @else
        {!! __('label.welcome_note') !!}
    @endif
@endsection

@section('content')
    <section class="main-content mb-2">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb py-0 mb-2">
                <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{!! __('label.newsletter') !!}</li>
            </ol>
        </nav>
        <div class="content-border">

            
      @include('site.includes.left-sidebar')
    

            <div class="sub-main-content js-sub-main-height">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="title-decoration py-2 mb-3"> {!! __('label.newsletter') !!}</h4>
                        <div class="contact">

                            <div class="row">
                                <div class="col-md-5">
                                    <address>
                                        <h6>{{ __('label.site_title') }}.</h6>
                                        <i class="fa fa-map-marker"></i>  {{ __('label.address') }} {{ __($contact->physical_address_translation) }}<br>
                                        <span class="font-bold"><i class="fa fa-phone"></i> {{ __('label.hotline')}}:</span> {!! $contact->phone !!}<br>
                                        <span class="font-bold"><i class="fa fa-fax"></i> {{ __('label.fax')}}: N&#333;:</span> {!! $contact->fax !!}<br>
                                        <span class="font-bold"><i class="fa fa-globe"></i> {{ __('label.email') }}:</span> {!! $contact->email !!}<br>
                                    </address>
                                </div>

                                <div class="col-md-7">
                                    <div>
                                        {!! Form::open(['route' => 'newsletter.store', 'class'=> 'add_p']) !!}
                                        <div class="row">
                                            @if(session()->has('message'))
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="alert alert-success">
                                                        {{ __('label.error_newsletter') }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                {{ __('label.fullname')}}
                                                {!! Form::text('fullname',null,['placeholder'=>'', 'class' => 'form-control' ,'autofocus','required']) !!}
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                {{ __('label.email') }}
                                                {!! Form::email('email',null,['placeholder'=>'', 'class' => 'form-control' ,'autofocus', 'required']) !!}
                                                <p><span class='form_error' style="color:red;">{!! $errors->first('email') !!}</span></p>
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-success btn-raised pull-right"> {{ __('label.send') }}</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <!-- CONTENT BLOCK HERE -->
  <section>
   <div class="tenders">

    <div class="row-offcanvas row-offcanvas-left">
      @include('site.includes.left-sidebar')
<div id="main" class="div-match-height">

        </div>
</div>
</div>
<!--/sub-main-content -->

</section>

@stop
