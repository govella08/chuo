@extends('site.layout')
@section('title')

{!! __('label.announcements') !!}

@endsection

 @section('content')
 
 <?php $local=$currentLanguage->locale; ?>
  <!-- CONTENT BLOCK HERE -->
  <section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb py-0 mb-2">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">{!! __('label.announcements') !!}</li>
      </ol>
    </nav>
    <div class="content-border">

      @include('site.includes.left-sidebar')
    

      <div class="sub-main-content js-sub-main-height">
       <div class="row">
                <div class="col-md-12">
                    <h4 class="title-decoration py-2 mb-3"> {!! __('label.announcements') !!}</h4>
                    @if(count($announcements))
                    @foreach($announcements as $announcement)
                            <div>
                                <div class="pb-2 more-info">
                                    <h6 class="mb-1">{!! __($announcement->name_translation) !!}</h6>
                                    <p class="mb-2">{!! str_limit(__($announcement->content_translation),120) !!}...
                                        <a href="{!! url('announcements/'.$announcement->slug)!!}">
                                            {{ __('label.readmore') }}
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </p>
                                    <p class="date mb-1">
                                        {{ __('label.posted') }}:
                                        <i class="fa fa-calendar"></i>
                                        {!! date('M d, Y',strtotime($announcement->created_at)) !!}
                                    </p>
                                </div>
                            </div>
                   @endforeach

                   @else
                   {!! __('label.no_information') !!}
                   @endif
                   
                   

                   <nav aria-label="Page navigation" class="nav-pagination">
                    <ul class="pagination">
                        {!!  $announcements->render() !!}
                    </ul>
                </nav>
                
            </div>
      <!--/sub-main-content -->
    </div>
  </div>
</div>
<!--/sub-main-content -->

</section>

@stop
















