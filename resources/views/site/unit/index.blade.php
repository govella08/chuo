@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
    {!! __('label.units', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
    {!! __('label.units', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
    <li class="breadcrumb-item active"> {!! __('label.units', [], $currentLanguage->locale) !!} </li>
@endsection


<!-- page content section -->
@section('page-content')
<div class="unit">
    <div id="unit-accordion">
        @forelse( $departments as $i => $dept )
        <div class="card">                                        
            <div class="card-header" id="unit-question{{ $i }}">
                <h5 class="mb-0">

                    <button class="btn btn-link {{ $i==0 ? 'active show':'' }}" data-toggle="collapse" data-target="#unit-collapse{{ $i }}" aria-expanded="true" aria-controls="unit-collapse{{ $i }}">
                        {{ __($dept->dept_name_translation) }}
                    </button>


                </h5>
            </div>
            <div id="unit-collapse{{ $i }}" class="collapse {{ $i==0 ? 'show':'' }}" aria-labelledby="unit-question{{ $i }}" data-parent="#unit-accordion">
                <div class="card-body">


                    <h6> {{ __($dept->dept_name_translation) }} </h6>
                    <p>{!! __($dept->content_translation) !!}</p>
                </div>
            </div>
        </div>
        @empty
            <div class="card">
                {{ __('label.no_information', [], $currentLanguage->locale) }}
            </div>
        @endforelse
    </div>
</div>
@stop
<!-- ./page content section -->