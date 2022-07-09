@extends('site.layout')
                <!-- CONTENT BLOCK HERE -->
                
 @section('content')

 <?php $local=$currentLanguage->locale; ?>

<section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page"> {{ __('label.departments') }}</li>
        </ol>
    </nav>
    <div class="content-border">
         
    
 			 @include('site.includes.left-sidebar')
	
           
        <div class="sub-main-content js-sub-main-height">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title-decoration py-2 mb-3"> {{__('label.departments')}}</h4>
                    <div class="departments">
                        <div class="row">
                            <div class="col-4">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    @if(count($departments))
                                         <?php  $dept_count = 1;  ?>
                                        @foreach( $departments as $i => $dept )
                                            <a class="nav-link <?php if($dept_count==1) echo 'active show'; ?>" id="v-pills-{{ $dept_count }}-tab" data-toggle="pill" href="#v-pills-{{ $dept_count }}" role="tab" aria-controls="v-pills-{{ $dept_count }}" aria-selected="<?php if($dept_count==1){echo 'true';}  else {echo 'false';} ?>">{{ __($dept->dept_name_translation) }}</a>
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
                                                <h5>{{ __($dept->dept_name_translation) }}</h5>
                                                <br>
                                                {!! __($dept->content_translation) !!}
                                            </div>
                                            <?php  $dept_count += 1;  ?>
                                        @endforeach
                                    @endif
                                
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