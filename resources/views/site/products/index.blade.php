@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! label('lbl_products') !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! label('lbl_products') !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! label('lbl_products') !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
<div class="row">
    @forelse($products as $key => $product)
    <div class="col-md-4">
        <div href="{{ url('products',$product->slug) }}" class="products-list-item">
            <img class="img-fluid" src="{{ asset($product->image('medium')) }}" alt="TEMDO Product">
            <a href="{{ url('products',$product->slug) }}" class="products-list-item-overlay px-3">
                <h6 class="py-2">{!! str_limit($product->{langdb('title')},150) !!}
                    <i class="ml-3 fas fa-long-arrow-alt-right"></i>
                </h6>
                <p>{!! str_limit($product->{langdb('summary')},150) !!}</p>
            </a>
        </div>
    </div>

    @empty
    <div class="col">
        <div class="alert alert-warning text-center">***{{ label('lbl_no_information') }}***</div>
    </div>
    @endforelse
    <div class="col-md-12">
        @if(count($products) > 14) 
        <hr>
        @endif
        <div class="text-center">
            {!! $products->render() !!}
        </div>

    </div>
</div>
@stop
<!-- ./page content section -->



















