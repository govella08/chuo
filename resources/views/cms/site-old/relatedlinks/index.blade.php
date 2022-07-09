@extends('site.layout')
@section('title')

{!! __('label.related_links') !!}

@endsection

 @section('content')
 <?php $local=$currentLanguage->locale; ?>
  <!-- CONTENT BLOCK HERE -->
  <section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb py-0 mb-2">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">{!! __('label.related_links') !!}</li>
      </ol>
    </nav>
    <div class="content-border">

      @include('site.includes.left-sidebar')
    
        <div class="sub-main-content js-sub-main-height">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title-decoration py-2 mb-3"> {!! __('label.related_links') !!}</h4>
                    <div class="more-howdoi">
                        <ul class="list-unstyled px-3 ">
                            @if(count($related_links))
                                @foreach ($related_links as $links)
                                    <li>
                                        <a href="{!! $links->url !!}" target="_blank">
                                            <i class="fa fa-angle-double-right"></i>
                                            {!! __($links->title_translation) !!}
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                {!! __('label.no_information') !!}
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>
<!--/sub-main-content -->

</section>

@stop





















