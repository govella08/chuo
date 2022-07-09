@if(count($list) > 0)
<ul class="list-unstyled">
	@foreach($list  as $key => $data)
	<li class="download mb-4 d-flex align-items-center">
		<span class="d-flex"><i class="mr-2 pt-1 far fa-file-pdf"></i>{!! __($data->title_translation) !!}</span>
		<a class="btn btn-custom ml-auto btn-sm  flex-shrink-0" target="blank" href="{!! asset(__($data->file)) !!}"><i class="fa fa-download"></i>{{ __('label.download', [], $currentLanguage->locale) }}</a>
	</li>
	@endforeach
</ul>

<div class="pagination">{!!  $list->render() !!}</div>
@else 
<div class="alert alert-warning"> {!! __('label.no_information', [], $currentLanguage->locale) !!}</div>
@endif