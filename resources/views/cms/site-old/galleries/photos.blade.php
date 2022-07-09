

@extends('site.layout')
@section('title')

{!! __('label.videos_gallery') !!}

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
        <li class="breadcrumb-item active" aria-current="page">{!! __('label.videos_gallery') !!} </li>
      </ol>
    </nav>
    <div class="content-border">

        
      @include('site.includes.left-sidebar')
    

        <div class="sub-main-content js-sub-main-height">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title-decoration py-2 mb-3"> Photo Gallery</h4>
                    <div>
                        <ul class="photo-listing list-unstyled clearfix">
                            <li class="galleria mb-3">
                                <a href="images/carousel4.jpg" class="gallery-item" title="Picture Caption: 1. consectetur adipisicing elit. Illum quisquam">
                                    <img src="images/carousel4.jpg" alt="" class="img-fluid">
                                    <span><i class="fa fa-camera"></i>05</span>
                                </a>
                                <a href="images/carousel1.jpg" class="gallery-item hidden" title="Picture Caption: 2. consectetur adipisicing elit. Illum quisquam"></a>
                                <a href="images/carousel2.jpg" class="gallery-item hidden" title="Picture Caption: 3. consectetur adipisicing elit. Illum quisquam"></a>
                                <a href="images/carousel3.jpg" class="gallery-item hidden" title="Picture Caption: 4. consectetur adipisicing elit. Illum quisquam"></a>
                                
                                <div class="">
                                    <h6 class="mb-1">Album title</h6>
                                    <p class="mb-1">Event description Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quisquam quibusdam voluptates cum repellendus quasi!</p>
                                    <p class="date">Posted on: <i class="fa fa-calendar"></i> January 23, 2016</p>
                                </div>
                                <div class="clearfix"></div>
                            </li>

                            <li class="galleria mb-3">
                                <a href="images/carousel5.jpg" class="gallery-item" title="Picture Caption: 1. consectetur adipisicing elit. Illum quisquam">
                                    <img src="images/carousel5.jpg" alt="" class="img-fluid">
                                    <span><i class="fa fa-camera"></i>05</span>
                                </a>
                                <a href="images/carousel1.jpg" class="gallery-item hidden" title="Picture Caption: 2. consectetur adipisicing elit. Illum quisquam"></a>
                                <a href="images/carousel2.jpg" class="gallery-item hidden" title="Picture Caption: 3. consectetur adipisicing elit. Illum quisquam"></a>
                                <a href="images/carousel3.jpg" class="gallery-item hidden" title="Picture Caption: 4. consectetur adipisicing elit. Illum quisquam"></a>
                                
                                <div class="">
                                    <h6 class="mb-1">Album title</h6>
                                    <p class="mb-1">Event description Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quisquam quibusdam voluptates cum repellendus quasi!</p>
                                    <p class="date">Posted on: <i class="fa fa-calendar"></i> January 23, 2016</p>
                                </div>
                                <div class="clearfix"></div>
                            </li>

                        </ul>
                    </div>
                    <!-- ********************************************** Pagination **********************************************   -->
                    <nav aria-label="Page navigation" class="nav-pagination">
                        <ul class="pagination">
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                            </li>
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


