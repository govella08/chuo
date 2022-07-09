@extends('site.layout')
                <!-- CONTENT BLOCK HERE -->
                
 @section('content')

<?php $local=$currentLanguage->locale; ?>
<section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('label.units',[],$local)}}</li>
        </ol>
    </nav>
    <div class="content-border">
         
      @include('site.includes.left-sidebar')
    
         
        <div class="sub-main-content js-sub-main-height">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title-decoration py-2 mb-3"> {!! __('label.units',[],$local) !!}</h4>
                    <div class="departments">
                            <div class="row">
                                <div class="col-4">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    	@foreach( $departments as $i => $dept )
                                        	<a class="nav-link {{ $i==0 ? 'active show':'' }}" id="v-pills-tab-{{ $i }}" data-toggle="pill" href="#v-pills-{{ $i }}" role="tab" aria-controls="v-pills-{{ $i }}" aria-selected="false"><h6>{{ __($dept->dept_name_translation) }}</h6></a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="tab-content" id="v-pills-tabContent">
                                    	@foreach( $departments as $i => $dept )
	                                        <div class="tab-pane fade {{ $i==0 ? 'active show':'' }}" id="v-pills-{{ $i }}" role="tabpanel" aria-labelledby="v-pills-tab-{{ $i }}">
	                                            <h5>{{ __($dept->dept_name_translation) }}</h5>
	                                            	<p>{!! __($dept->content_translation) !!}</p>
	                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!--/sub-main-content -->
            
</section>

@stop