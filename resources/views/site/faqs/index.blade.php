@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{{ __('label.faq', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{{ __('label.faq', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active"> {{ __('label.faq', [], $currentLanguage->locale) }} </li>
@endsection


<!-- page content section -->
@section('page-content')
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
  <div class="alert alert-info">{{ __('label.no_information') }}</div>
  @endif

</div>
</div>

<!-- ********************************************** Pagination **********************************************   -->
<nav aria-label="Page navigation" class="nav-pagination">

  {!!  $faqs->render() !!}
  
</nav>
<!-- ********************************************** Pagination **********************************************   -->
@stop
<!-- ./page content section -->


















