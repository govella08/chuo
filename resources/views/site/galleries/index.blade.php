@extends('site.page-layout')



<!-- setting browser tab title -->
@section('title')
{{ __('label.photo_gallery', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{{ __('label.photo_gallery', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item"> {{ __('label.media_center', [], $currentLanguage->locale) }} </li>
<li class="breadcrumb-item active"> {{ __('label.photo_gallery', [], $currentLanguage->locale) }} </li>
@endsection


<!-- page content section -->
@section('page-content')
<div>
    <ul class="photo-listing list-unstyled clearfix">


        <?php $i = 1;?>
        @foreach($galleries as $gallery)
        @if($gallery->photos->count())

        <li class="galleria mb-3 d-md-flex">
            <div class="mr-3">
                <a href="{{ asset($gallery->photos->first()->image()) }}" class="gallery-item d-flex align-items-center justify-content-center" title="{!!__($gallery->photos->first()->content) !!}">
                    <img src="{!! asset($gallery->photos->first()->image('thumb')) !!}" alt="{!! __($gallery->photos->first()->title) !!}">
                    <span class="position-absolute text-light"><i class="fa fa-camera"></i> {{ $gallery->photos->count() }}</span>
                </a>
                @foreach($gallery->photos as  $index => $gal)
                @if($index >= 1)

                <a href="{{asset($gal->image())}}" class="gallery-item hidden" title="{{ __($gal->title) }}"></a>
                @endif
                @endforeach

            </div>
            <div class="mt-3 mt-md-0">
                <h6 class="mb-1"> {{ __($gallery->title) }} </h6>
                <p class="mb-1"> {{ __($gallery->content) }} </p>
                <p class="date">{{ __('label.posted', [], $currentLanguage->locale) }} : <i class="fa fa-calendar"></i> {{ date('F, d, Y',strtotime($gallery->created_at)) }}</p>

            </div>
        </li>


        @endif 
        <?php $i++; ?>
        @endforeach

    </ul>
</div>
<!-- ********************************************** Pagination **********************************************   -->
<nav aria-label="Page navigation" class="nav-pagination">
   {!!  $galleries->render() !!}
</nav>
<!-- ********************************************** Pagination **********************************************   -->
@stop
<!-- ./page content section -->








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


