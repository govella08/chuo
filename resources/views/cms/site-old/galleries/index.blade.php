@extends('site.layout')
@section('title')

{!! __('label.photo_gallery') !!}

@endsection

@section('css-content')
<link rel="stylesheet" href="{{ asset('site/css/magnific-popup.min.css') }}">
@endsection

@section('content')
<?php $local=$currentLanguage->locale; ?>
<section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb py-0 mb-2">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">{!! __('label.photo_gallery') !!} </li>
    </ol>
</nav>
<div class="content-border">

    
      @include('site.includes.left-sidebar')
    

        
        <div class="sub-main-content js-sub-main-height">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title-decoration py-2 mb-3"> {!! __('label.photo_gallery') !!}</h4>
                    <div>
                        <ul class="photo-listing list-unstyled clearfix">

                        
                    <?php $i = 1;?>
                    @foreach($galleries as $gallery)
                    @if($gallery->photos->count()>0)

                    <li class="galleria mb-3 d-md-flex">
                        <div class="mr-3">
                            <a href="{{ asset($gallery->photos->first()->image()) }}" class="gallery-item d-flex align-items-center justify-content-center" title="{!! __($gallery->photos->first()->title_translation) !!}">
                                <img src="{!! asset($gallery->photos->first()->image('thumb')) !!}" alt="{!! __($gallery->photos->first()->title_translation) !!}">
                                <span class="position-absolute text-light"><i class="fa fa-camera"></i> {{ $gallery->photos->count() }}</span>
                            </a>
                            @foreach($gallery->photos as  $index => $gal)
                            @if($index >= 1)

                            <a href="{{asset($gal->image())}}" class="gallery-item hidden" title="{{ __($gal->title_translation) }}"></a>
                            @endif
                            @endforeach
                          
                        </div>
                        <div class="mt-3 mt-md-0">
                            <h6 class="mb-1">{!! __($gallery->title_translation) !!}</h6>
                            <p class="mb-1">{!! __($gallery->content_translation) !!}</p>
                            <p class="date">{{ __('label.posted') }} : <i class="fa fa-calendar"></i> {{ date('F, d, Y',strtotime($gallery->created_at)) }}</p>
                            
                        </div>
                    </li>


                    @endif 
                    <?php $i++; ?>
                    @endforeach

                        </ul>
                    </div>
                    <!-- ********************************************** Pagination **********************************************   -->
                    <nav aria-label="Page navigation" class="nav-pagination">
                        <ul class="pagination">
                           {!!  $galleries->render() !!}
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

@section('js-content')
<script src="{{ asset('site/js/magnific-popup.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('li.galleria').each(function() {
            $(this).magnificPopup({
                type: 'image',
                delegate: 'a',
                gallery: {

                    enabled: true
                }
            });
        })
    });
</script>
@endsection


