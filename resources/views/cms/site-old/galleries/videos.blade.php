@extends('site.layout')
@section('title')

{!! __('label.videos_gallery') !!}

@endsection

 @section('content')
 <?php $local=$currentLanguage->locale; ?>
  <section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb py-0 mb-2">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">{!! __('label.videos_gallery') !!} </li>
      </ol>
    </nav>
    <div class="content-border">

       
      @include('site.includes.left-sidebar')
    


        <div class="sub-main-content js-sub-main-height">"
        <div class="row">
          <div class="col-md-12">
            <h4 class="title-decoration py-2 mb-3"> {!! __('label.videos_gallery') !!} </h4>
            @if(count($videos))
            @foreach($videos as $video)
            <div class="row more-info">
              <div class="col-md-4"> 
                <div class="video-container mb-2">
                  <iframe src="https://www.youtube.com/embed/{!! utube_hash($video->url) !!}" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen"  msallowfullscreen="msallowfullscreen"  oallowfullscreen="oallowfullscreen"  webkitallowfullscreen="webkitallowfullscreen"></iframe>
                </div>
              </div>
              <div class="col-md-8">
                <div class="">
                  <h6 class="mb-1">{!! __($video->title_translation) !!}</h6>
                  <p class="mb-1">{!! __($video->content_translation) !!}</p>
                  <p class="date">{{ __('label.posted')}}: <i class="fa fa-calendar"></i> {!! date('M d, Y', strtotime($video->created_at)) !!}</p>
                </div>
              </div>                     
            </div>


            @endforeach
            @else
             <div class="text-center">
                  <span class="badge badge-danger">
                  {!! __('label.no_information') !!}
                  </span>
              </div>
            @endif
            

            <!-- ********************************************** Pagination **********************************************   -->
            <nav aria-label="Page navigation" class="nav-pagination">
              <ul class="pagination">
               {!! $videos->render() !!}
             </ul>
           </nav>
           <!-- ********************************************** Pagination **********************************************   -->
         </div>
       </div>
     </div>
   </div>
   <!--/sub-main-content -->

 </section>

@stop


