@extends('site.layout')
@section('title')

{!! __('label.news') !!}

@endsection

 @section('content')
 <?php $local=$currentLanguage->locale; ?>
  <!-- CONTENT BLOCK HERE -->
  <section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb py-0 mb-2">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">{!! __('label.news') !!}</li>
      </ol>
    </nav>
    <div class="content-border">

        
      @include('site.includes.left-sidebar')
    

        <div class="sub-main-content js-sub-main-height">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title-decoration py-2 mb-3">{!! __('label.news') !!}</h4>
                    <div>
                        @if(count($news_list))
                            @foreach($news_list as $news)
                                <div class="row pb-2 more-info">
                                    <div class="col-md-4">
                                        <div class="">
                                            <img src="{!! asset('uploads/news/medium-'.$news->photo_url) !!}" alt="" class="img-fluid mb-1">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="">
                                            <h6 class="mb-1">{!! $news->{langdb('title')} !!}</h6>
                                            <p class="mb-2">
                                                {!! $news->{langdb('summary')}!!}...
                                                <a href="{!! URL::to('news', $news->slug) !!}">{{ __('label.readmore') }} <i class="fa fa-arrow-circle-right"></i></a></p>
                                            <p class="date mb-1">{{ __('label.posted')}}: <i class="fa fa-calendar"></i> {!! date('M d, Y', strtotime($news->created_at)) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            {{ __('label.no_information')}}
                        <!-- ********************************************** Pagination **********************************************   -->
                        @endif
                    </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!--/sub-main-content -->

</section>

@stop


















