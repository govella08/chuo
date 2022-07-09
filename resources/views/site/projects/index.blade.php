@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.projects', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __('label.projects', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{{ __('label.projects', [], $currentLanguage->locale) }}</li>
@endsection


<!-- page content section -->
@section('page-content')
@if(count($projects))


<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>{!! __('label.project_name') !!}</th>
			<th>{!! __('label.implementation_agency') !!}</th>
			<th>{!! __('label.coverage_area') !!}</th>
			<th>{!! __('label.project_funder') !!}</th>
			<th>{!! __('label.duration') !!}</th>
			<th>{!! __('label.number_of_beneficiaries') !!} </th>
		</tr>
	</thead>
	<tbody>
		@foreach($projects as $key => $project)  

		<tr>
			<td> <a href="{{ url('project',$project->slug) }}" class="link">{{ $key+1 }}</a></td>
			<td> <a href="{{ url('project',$project->slug) }}" class="link">{!! __($project->title_translation) !!}</a></td>
			<td> <a href="{{ url('project',$project->slug) }}" class="link">{{ $project->implementer }}</a></td>
			<td> <a href="{{ url('project',$project->slug) }}" class="link">{{ $project->area_of_coverage }}</a></td>
			<td> <a href="{{ url('project',$project->slug) }}" class="link">{!! $project->sponsor !!}</a></td>
			<td> <a href="{{ url('project',$project->slug) }}" class="link">{!! __($project->duration) !!}</a></td>
			<td> <a href="{{ url('project',$project->slug) }}" class="link">{{ $project->number_of_beneficiaries }}</a></td>
		</tr>
		@endforeach




	</tbody>
</table>
@else
{{ __('label.no_information', [], $currentLanguage->locale) }}
@endif
<!-- ********************************************** Pagination **********************************************   -->
<nav aria-label="Page navigation" class="nav-pagination">

	{!! $projects->render() !!}


</nav>
<!-- ********************************************** Pagination **********************************************   -->
@stop
<!-- ./page content section -->