@extends('site.layout')
@section('title')

{{ __('label.management')}}

@endsection

 @section('content')
 <?php $local=$currentLanguage->locale; ?>
  <!-- CONTENT BLOCK HERE -->
  <section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb py-0 mb-2">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
        <li class="breadcrumb-item active text-capitalize" aria-current="page">{{ __($category->title_translation) }}</li>
      </ol>
    </nav>
      <div class="content-border">

          
      @include('site.includes.left-sidebar')
    
      @if($administration->count()>0)
        <div class="sub-main-content js-sub-main-height">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title-decoration py-2 mb-3"> {{__('label.management')}}</h4>
                    
                    <div class="management">
                        <!-- NOTE: Head of Management  -->
                        <div class="management-team">
                            <div class="d-flex flex-wrap">
                              
                                  @foreach($administration as $director)
                                     

                                <div class="card">
                                    <div class="card-body text-center">
                                        <img src="{{ url('/uploads/administration/thumb-'.$director->photo_url) }}" alt="" class="card-img-top mb-2">
                                        <h6 class="mb-1 p-0">{{ __($director->title_translation) }}</h6>
                                        <h6 class="mb-1 p-0">{{ $director->fullname }}</h6>
                                        <a class="btn btn-sm btn-custom" href="{{ url('administration/list/'.$director->id) }}">{{__('label.biography')}}</a>
                                    </div>
                                </div>
                                      
                                  @endforeach
                             

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         @elseif($managements->count()>0)

               <div class="sub-main-content js-sub-main-height">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title-decoration py-2 mb-3">{{__('label.board_members')}}</h4>
                    
                    <div class="board-member">
                        <ul class="list-unstyled">


                          @foreach($managements as $director)

                            <li>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="{{ url('/uploads/administration/thumb-'.$director->photo_url) }}" alt="{{ __($director->title_translation) }} {{ $director->fullname }} " class="card-img-top">
                                            <div class="card-body text-center">
                                                <h6>{{ __($director->title_translation) }}</h6>
                                                <h6 class="mb-0">{{ $director->fullname }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                    {!! __($director->content_translation) !!}
                                  
                                    </div>
                                </div>
                            </li>
                                      
                          @endforeach
                           
                       
                        </ul>
                    </div>
                </div>
            </div>
        </div>
         @else
            {{ __('label.no_information') }}
        @endif

      </div>
<!--/sub-main-content -->

</section>

@stop
















