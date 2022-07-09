@extends('site.layout')
@section('title')

 {{ __('label.news')}}

@endsection

 @section('content')
 <?php $local=$currentLanguage->locale; ?>
  <!-- CONTENT BLOCK HERE -->
  <section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb py-0 mb-2">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page"> {{ __('label.news')}}</li>
      </ol>
    </nav>
    <div class="content-border">

        
      @include('site.includes.left-sidebar')
    

        <div class="sub-main-content js-sub-main-height">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title-decoration py-2 mb-3"> {{ __('label.news')}}</h4>
                    <div>
                        <div class="date clearfix mb-2">
                            <span class="float-right">
                                {{ __('label.posted')}}:
                                <i class="fa fa-calendar"></i>
                                {!! date('M, d Y', strtotime($news->created_at)) !!}
                            </span>
                        </div>
                        <h4 class="text-center">{!! __($news->title_translation) !!}</h4>
                        <div class="news-image text-center mb-3">
                            <img src="{!! asset('/uploads/news/large-'.$news->photo_url) !!}" alt="News Images" class="img-fluid">
                        </div>
                        <div class="news-content">
                            <p>{!! __($news->content_translation) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
<!--/sub-main-content -->

</section>

@stop


















