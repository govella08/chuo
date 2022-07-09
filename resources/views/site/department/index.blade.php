@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{{ label('lbl_departments') }}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{{ label('lbl_departments') }}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item">{{ label('lbl_administration') }}</li>
<li class="breadcrumb-item active">{{ label('lbl_departments') }}</li>
@endsection


<!-- page content section -->
@section('page-content')

<div class="departments">
    <div class="row">
        <div class="col-4">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @if(count($departments))
                <?php  $dept_count = 1;  ?>
                @foreach( $departments as $i => $dept )
                <a class="nav-link <?php if($dept_count==1) echo 'active show'; ?>" id="v-pills-{{ $dept_count }}-tab" data-toggle="pill" href="#v-pills-{{ $dept_count }}" role="tab" aria-controls="v-pills-{{ $dept_count }}" aria-selected="<?php if($dept_count==1){echo 'true';}  else {echo 'false';} ?>">{{ $dept->{langdb('deptName')} }}</a>
                <?php  $dept_count += 1;  ?>
                @endforeach
                @endif
            </div>
        </div>
        <div class="col-8">
            <div class="tab-content" id="v-pills-tabContent">

              @if(count($departments))
              <?php  $dept_count = 1;  ?>
              @foreach( $departments as $i => $dept )

              <div class="tab-pane fade <?php if($dept_count==1) echo 'active show'; ?>" id="v-pills-{{ $dept_count }}" role="tabpanel" aria-labelledby="v-pills-{{ $dept_count }}-tab">
                <h5>{{ $dept->{langdb('deptName')} }}</h5>
                <br>
                {!! $dept->{langdb('content')} !!}
            </div>
            <?php  $dept_count += 1;  ?>
            @endforeach
            @endif

        </div>
    </div>
</div>
</div>

@stop
<!-- ./page content section -->


