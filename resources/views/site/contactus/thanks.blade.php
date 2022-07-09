@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! label('lbl_contact') !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! label('lbl_contact') !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! label('lbl_contact') !!}</li>
@endsection


<!-- page content section -->
@section('page-content')

<div id="accordion" data-children=".item">
 <p>{{label('lbl_thanks_message')}}</p>
</div>

@stop
<!-- ./page content section -->




















