@extends('site.layout')
@section('title')
 @if(curlang() == '_sw')
{!! label('lbl_contact') !!}
@else
{!! label('lbl_contact') !!}
@endif
@endsection

 @section('content')
  <!-- CONTENT BLOCK HERE -->
  <section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb py-0 mb-2">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">{!! label('lbl_contact') !!}</li>
      </ol>
    </nav>
    <div class="content-border">

        <div class="sidebar js-sub-main-height pb-3 float-left">
            @include('site.includes.left-sidebar')
        </div>

        <div class="sub-main-content js-sub-main-height">
       <div class="row">
        <div class="col-md-12">
          <h4 class="title-decoration py-2 mb-3"> {!! label('lbl_contact') !!}</h4>
          <div>
            <div id="accordion" data-children=".item">
               <p>{{label('lbl_thanks_message')}}</p>
          </div>
        </div>

      </div>
      <!--/sub-main-content -->
    </div>
  </div>
</div>
<!--/sub-main-content -->

</section>

@stop

















