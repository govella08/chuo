@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{{ __('label.management', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{{ __($category->title) }}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item">{{ __('label.administration', [], $currentLanguage->locale) }}</li>
<li class="breadcrumb-item active"><a href="{{ url('administration',$category->id) }}">{{ __('label.management', [], $currentLanguage->locale) }}</a></li>
@endsection

@section('sidebar')
@stop

<!-- page content section -->
@section('page-content')

          
  <div class="board-team">
      @if($administration->count() > 0)
      <?php $rownum1 = 1; ?>

      <div class="row">
        @forelse($administration as $administration1)
        <?php
        if($rownum1 < $administration1->position){
          echo '</div>';
          echo '<div class="row">';
          if($category->has_label == 1){
            echo '<div class="col-md-12">
                    <h4 class="title text-center bg-primary py-2 text-light">';
            }
        }
        ?> @if($rownum1 < $administration1->position && $administration1->category->has_label == 1)
                {{ __($administration1->group->title) }}
            @endif
        
        <?php
        if($rownum1 < $administration1->position){
            echo '</h4> </div>';
            $rownum1++;
        }        
        ?>


          <div class="col-md-3 mx-auto">
              <div class="board-team-member">
                  <div class="board-team-image text-center p-2">
                      <img class="img-fluid" src="{{ url('/uploads/administration/thumb-'.$administration1->photo_url) }}" alt="board Profile">
                  </div>
                  <div class="board-team-info p-2">
                      <div class="title-decoration my-1 text-center"> {{ __($administration1->title) }} </div>
                      <div class="title-decoration my-1"><i class="fas fa-user"></i> {{ $administration1->fullname }} </div>
                      <div><i class="fas fa-envelope"></i> <a href={{ "mailto:".__($administration1->email) }}> {{ $administration1->email }} </a></div>
                  </div>    
              </div>
          </div>
        
        @empty
        {{ __('label.no_information') }}
        @endforelse

      </div>

      @endif
      
@stop
<!-- ./page content section -->