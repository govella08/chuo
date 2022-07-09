@extends('site.page')

@section('page-content')
    <!-- MIDDLE CONTENT -->
<div class="middle-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <!--START RIGHT SIDEBAR CONTENTE SECTION-->
                <div class="right-sidebar-content div-match-height">
                    @if(count($news_list))
                    <div class="breadcrumbs">
                        <ul>
                         <li><a href="/"><i class="icon icon-home"></i>{{ label('lbl_home')}}</a></li>
                         <li><i class="icon icon-chevron-right"></i><a href="#">{!! label('lbl_news') !!}</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">{!! label('lbl_news') !!}</h1>
                    <ul class="news-lists">
                        @foreach($news_list as $news)
                        <li>
                            <a href="{!! URL::to('news', $news->slug) !!}"> 
                            <img class="lazy" data-original="{!! asset('uploads/news/medium-'.$news->photo_url) !!}" alt="">
                                <h4>{!! $news->{langdb('title')} !!}</h4> </a> <span>{!! date('F d, Y', strtotime($news->created_at)) !!} </span>
                            <p>{!! $news->{langdb('summary')}!!}</p>
                            <a href="{!! URL::to('news', $news->slug) !!}">{{ label('lbl_readmore') }}</a> 
                        </li>
                        @endforeach
                    <nav class="text-center">
                        <ul class="pagination">
                             {!!  $news_list->render() !!}
                        </ul>
                    </nav>

                    @else
                        No news found.
                    @endif
                </div>
                <!-- /.right-sidebar-content -->
                <!--/END RIGHT SIDEBAR CONTENTE SECTION-->
            </div>
            <!-- /.middle-content-wrapper -->
            <!--/MIDDLE CONTENT-->
           @include('site.includes.right-sidebar')
<!-- /.left-sidebar-wrapper -->

        </div>
    </div>
</div>

@include('site.includes.footer')