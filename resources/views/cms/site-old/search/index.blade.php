@extends('site.page')

@section('title')
  {{ __('label.pages') }}
@stop

@section('content')

  
  <div class="right-page div-match-height">

      <h1>{__('label.search_results_for')}} " {{$term}} " ({{__('label.search_results_count')}} {{$results['stats']['records']}})</h1>

      <ul class="search-listing">
      @foreach($results['data'] as $result)
        <li>
           <h3>{{title($result['_source'])}}</h3>
           {!! searchResultSummary($result['highlight']) !!}<br />
           <a href="{{URL::to(searchUrl($result['_source']))}}">{{__('label.readmore')}}</a>
        </li>
      @endforeach

              

        
      </ul>
    <div id="pagination">

    </div>
  </div>
  <!-- /right-page-->

@stop
@section('scripts')
    <script src="{{ asset('site/js/jquery.simplePagination.js')}}"></script>
    <script type="text/javascript">
      $(function() {
        $("#pagination").pagination({
            items: "{{ $results['stats']['records'] }}",
            itemsOnPage: "{{ $results['stats']['pageSize'] }}",
            hrefTextPrefix:'?q='+"{{$term}}&page=",
            displayedPages:0,
            edges:0,
            prevText:"PREVIOUS",
            nextText:"NEXT",
            cssStyle: 'simple-custom'
        });
    });
    </script>

@stop