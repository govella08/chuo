@extends('site.layout')


@section('title')
{!! __('label.welcome_note') !!}
@endsection

 @section('content')
 <?php $local=$currentLanguage->locale; ?>
  <section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb py-0 mb-2">
        <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">{!! __('label.welcome_note',[],$local) !!}</li>
      </ol>
    </nav>
    <div class="content-border">

        
      @include('site.includes.left-sidebar')
    

        <div class="sub-main-content js-sub-main-height">
       <div class="row">
        <div class="col-md-12">
          <h4 class="title-decoration py-2 mb-3"> {!! __('label.welcome_note',[],$local) !!}</h4>
          <div>
          	<p>{!! __($welcome->content_translation) !!}</p>
          </div>
        </div>

      </div>
    </div>
  </div>


</section>

@stop


















