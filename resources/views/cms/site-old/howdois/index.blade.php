@extends('site.layout')
@section('title')

{!! __('label.how_doi') !!}

@endsection

 @section('content')
 <?php $local=$currentLanguage->locale; ?>
  <!-- CONTENT BLOCK HERE -->
  <section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb py-0 mb-2">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">{!! __('label.how_doi') !!}</li>
      </ol>
    </nav>
    <div class="content-border">

        
      @include('site.includes.left-sidebar')
    

        <div class="sub-main-content js-sub-main-height">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title-decoration py-2 mb-3"> {!! __('label.how_doi') !!}</h4>
                    <div class="more-howdoi">
                        <ul class="list-unstyled px-3 ">
                            @if(count($howdois))
                                @foreach ($howdois as $how)
                                    <li class="pb-1">
                                        <a href="{!! url('howdois/show/'.$how->slug) !!}">
                                            <i class="fa fa-arrow-right"></i>
                                            {!! __($how->title_translation) !!}
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





















