@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.tenders',[],$currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __('label.tenders',[],$currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __('label.tenders',[],$currentLanguage->locale) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
@if(count($tenders))
          @foreach($tenders as $tender)  
          <p class="download">
            <a href="{!! asset(__($tender->file_translation)) !!}" download class="faa-parent animated-hover">
              <i class="text-success fa fa-download faa-bounce"></i> {!! __($tender->title_translation) !!} {{ __('label.deadline')}}&nbsp; {{ $tender->deadline }}
            </a>
          </p>
          @endforeach
          @else
          {!! __('label.no_information') !!}
          @endif
          <!-- ********************************************** Pagination **********************************************   -->
          <nav aria-label="Page navigation" class="nav-pagination">
            <ul class="pagination">
              {!! $tenders->render() !!}

            </ul>
          </nav>
          <!-- ********************************************** Pagination **********************************************   -->
@stop
<!-- ./page content section -->


