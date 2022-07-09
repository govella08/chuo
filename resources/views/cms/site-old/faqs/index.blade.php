@extends('site.layout')
@section('title')

{!! __('label.faq') !!}

@endsection

 @section('content')
 <?php $local=$currentLanguage->locale; ?>
  <!-- CONTENT BLOCK HERE -->
<section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">{!! __('label.faq') !!}</li>
        </ol>
    </nav>
    <div class="content-border">

       
            @include('site.includes.left-sidebar')
        

 <div class="sub-main-content js-sub-main-height">
        <div class="row">
            <div class="col-md-12">
                <h4 class="title-decoration py-2 mb-3"> {!! __('label.faq') !!}</h4>
                <div class="faq">
                    <div id="faq-accordion">

                     <?php 
                       $num=1; ?>  
                       @if(count($faqs))
                       @foreach($faqs as $faq)
                       <?php //echo $num; ?>
                       
                      <div class="card">
                            <div class="card-header" id="faq-question{{$num}}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#faq-collapse{{$num}}" aria-expanded="<?php if($num==1){ echo 'true'; }else{ echo "false";}?>" aria-controls="faq-collapse{{$num}}">
                                        {!! __($faq->question_translation) !!}
                                    </button>
                                </h5>
                            </div>
                            <div id="faq-collapse{{$num}}" class="collapse <?php if($num==1){ echo 'show'; }?>" aria-labelledby="faq-question{{$num}}" data-parent="#faq-accordion">
                                <div class="card-body">
                                    {!! nl2br(__($faq->answer_translation)) !!}
                                </div>
                            </div>
                        </div>
                      <?php $num++; ?>
                      @endforeach
                      @else
                      {{ __('label.no_information') }}
                      @endif

                    </div>
                </div>

                <!-- ********************************************** Pagination **********************************************   -->
                <nav aria-label="Page navigation" class="nav-pagination">
                  <ul class="pagination">
                    {!!  $faqs->render() !!}
                  </ul>
                </nav>
                <!-- ********************************************** Pagination **********************************************   -->
             
            </div>
        </div>
    </div>



<!--/sub-main-content -->

</section>

@stop
















