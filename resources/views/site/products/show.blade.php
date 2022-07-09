@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! label('lbl_products') !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! $product->{langdb('title')} !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! label('lbl_products') !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
<div class="news-image text-center mb-3">
    <img src="{!! asset($product->image('large')) !!}" alt="News Images" class="img-fluid img-thumbnail">
</div>
<div class="news-content">
    <p>{!! $product->{langdb('content')} !!}</p>
</div>
@stop
<!-- ./page content section -->





































