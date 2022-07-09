@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
    {!! __('label.regional_offices', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
    {!! __('label.regional_offices', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active"> {!! __('label.regional_offices', [], $currentLanguage->locale) !!} </li>
@endsection


<!-- page content section -->
@section('page-content')
<!-- zonal offices -->
<div id="accordion" class="list-group" data-children=".item">
    @if(count($regional_offices))
    @foreach($regional_offices as $i => $regional_office)
    <div class="item list-group-item">
        <a class="" data-toggle="collapse" data-parent="#accordion" href="#accordion{{$regional_office->id}}" aria-expanded="true" aria-controls="accordion{{$regional_office->id}}">
            <i class="fa fa-angle-double-right"></i> {{ $regional_office->region }}
        </a>
        <div id="accordion{{$regional_office->id}}" class="collapse {{ $i==0 ? 'active show':'' }}" role="tabpanel">
            <p class="mb-3">
                <hr>
                <b>Physcial Address</b>
                {{ $regional_office->physical_address }} <br>
                Tel: {{ $regional_office->phone }} <br>
                Fax:  {{ $regional_office->fax }} <br>
                E-mail: {{ $regional_office->email }} <br>

            </p>
        </div>
    </div>
    @endforeach
    @endif
</div>
<!-- ./zonal offices -->
@stop
<!-- ./page content section -->


