@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.search_results') !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __('label.search_results_for').' <i>"'.$term.'"</i>' !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active"> {!! __('label.search') !!}</li>
@endsection


<!-- page content section -->
@section('page-content')


<ul class="list-unstyled">
  <?php $found = false; ?>
  @foreach($results as $key => $result)
  @if(count($result['data']) > 0)
  <?php $found = true; ?>
  <li>
    <h4>{{ $result['type'] }} <span class="badge badge-primary h6">{{ count($result['data']) }}</span></h4>
    <table class="table table-bordered table-striped table-hover table-sm mb-4">
      @foreach($result['data'] as $key => $data)
      <tr>
        <td class="px-3">
          <a href="{{ url($result['url_prefix'],$data[$result['id_type']]) }}">
            <h6>{{ $data[$result['title']] }}</h6>
            <p>
              {!! str_limit(strip_tags(__($data[$result['content']])),100) !!}
            </p>
          </a>
        </td>
      </tr>
      @endforeach
    </table>
  </li>



  @endif
  @endforeach

  @if(!$found)
  <li><div class="alert alert-warning">No Results Found!</div></li>
  @endif
</ul>
@stop
<!-- ./page content section -->


@section('js-content')
@stop