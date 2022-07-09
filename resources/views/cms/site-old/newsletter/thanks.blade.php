@extends('site.layout')
@section('title')

    {!! __('label.welcome_note') !!}

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
          <div class="col-md-12 main-content">
            <h3 class="title-decoration ">{!! __('label.newsletter') !!}</h3>

            <div>
              {{__('label.newsletter_message')}}
            </div>
          </div>
        </div>
      </div>
    </div>


  </section>
@stop





























