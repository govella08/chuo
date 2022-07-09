@extends('site.layout')
@section('title')
@if(curlang() == '_sw')
 @if(count($content)) 
 {{ $content->{langdb('name')}  }}
 @endif
@else
 @if(count($content))
{{ $content->{langdb('name')}  }}
@endif
@endif
@endsection

@section('content')
<!-- CONTENT BLOCK HERE -->
<section class="main-content mb-2">
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb py-0 mb-2">
      <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
      <li class="breadcrumb-item active" aria-current="page"> @if(count($content)) {{ $content->{langdb('name')}  }}  @endif</li>
    </ol>
  </nav>
  <div class="content-border">

    
      @include('site.includes.left-sidebar')
    

    <div class="sub-main-content js-sub-main-height">
      <div class="row">
        <div class="col-md-12">
          <h4 class="title-decoration py-2 mb-3">  @if(count($content)) {{ $content->{langdb('name')}  }} @endif</h4>
          <div>
             @if(count($content))
             {!! nl2br($content->{langdb('content')} ) !!}
             @else
             {!! label('lbl_no_information') !!}
             @endif
          </div>

        </div>
        <!--/sub-main-content -->
      </div>
    </div>
  </div>
  <!--/sub-main-content -->

</section>

@stop





















