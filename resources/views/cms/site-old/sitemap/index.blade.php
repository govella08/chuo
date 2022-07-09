@extends('site.layout')
@section('title')

{!! __('label.sitemap') !!}

@endsection

@section('content')
<?php $local=$currentLanguage->locale; ?>
<!-- CONTENT BLOCK HERE -->
<section class="main-content mb-2">
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb py-0 mb-2">
      <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
      <li class="breadcrumb-item active" aria-current="page"> {!! __('label.sitemap',[],$local) !!}</li>
    </ol>
  </nav>
  <div class="content-border">

    
      @include('site.includes.left-sidebar')
    

    <div class="sub-main-content js-sub-main-height">
      <div class="row">
        <div class="col-md-12">
          <h4 class="title-decoration py-2 mb-3">  {!! __('label.sitemap',[],$local) !!}</h4>
          <div>
             @foreach(App\Models\MenuItem::where('parent','=',0)->get() as $menu)
            <ul>
              <li><a href='{{ $menu->url }}'>{{ __($menu->title_translation) }}</a>

                @if(App\Models\MenuItem::where('parent','=',$menu->id)->count() > 0)
                <ul>
                  @foreach(App\Models\MenuItem::where('parent','=',$menu->id)->get() as $sub_menu)
                  <li><a href='{{ $sub_menu->url }}'>  {{ __($sub_menu->title_translation) }}</a></li>
                  @endforeach
                </ul>
                @endif
              </li>
            </ul>
            @endforeach
          </div>

        </div>
        <!--/sub-main-content -->
      </div>
    </div>
  </div>
  <!--/sub-main-content -->

</section>

@stop



























