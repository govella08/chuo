@extends('site.layout')
@section('title')

{!! __('label.projects') !!}

@endsection

 @section('content')
 <?php $local=$currentLanguage->locale; ?>
  <section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb py-0 mb-2">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">{!! __('label.projects',[],$local) !!}</li>
      </ol>
    </nav>
    <div class="content-border">

        
            @include('site.includes.left-sidebar')
       

        <div class="sub-main-content js-sub-main-height">
       <div class="row">
        <div class="col-md-12">
          <h4 class="title-decoration py-2 mb-3"> {!! __('label.projects',[],$local) !!}</h4>
          @if(count($projects))
          @foreach($projects as $project)  
          <p class="download">
            <a href="{!! asset(__($project->file_translation)) !!}" download class="faa-parent animated-hover">
              <i class="text-success fa fa-download faa-bounce"></i> {!! __($project->title_translation) !!}
            </a>
          </p>
          @endforeach
          @else
          {!! __('label.no_information',[],$local) !!}
          @endif
          <!-- ********************************************** Pagination **********************************************   -->
          <nav aria-label="Page navigation" class="nav-pagination">
            <ul class="pagination">
              {!! $projects->render() !!}

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

