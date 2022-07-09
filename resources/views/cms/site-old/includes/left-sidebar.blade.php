<div class="sidebar js-sub-main-height pb-3">
    <div class="sidebar-news mb-2">
        <h4 class="sidebar-header">{{ __('label.document',[],$local)}}</h4>
        <ul class="list-unstyled documents mx-2 px-2 mb-0">
         @if($publications->count()>0)
                <?php $cat_id = 0; ?>
                @foreach($publications as $pub)
                <li class="border-bottom"><a class="link-black" href="{!! asset(__($pub->file_translation)) !!}" target="_blank"> {!! __($pub->title_translation,[],$local) !!}</a></li>
                   
                    <?php $cat_id = $pub->category_id; ?>
                @endforeach
                
            
            @else
            <div class="text-center">
                <span class="badge badge-danger">
                {!! __('label.no_information',[],$local) !!}
                </span>
            </div>
            @endif
            
        </ul>
        @if($publications->count()>0)
        <div class="clearfix">
            <a class="float-right btn btn-custom" href="{{ url('publications',$cat_id) }}"> {{ __('label.more_docs',[],$local) }} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
        </div>
        @endif
        
    </div>


    <div class="sidebar-info mb-2 mt-5">
        <h4 class="sidebar-header">{{__('label.events')}}</h4>
        <div class="info-items mx-2 px-2">

    @if(count($left_events))
        <?php $ev=1; ?>
        @foreach($left_events as $event)
            <!-- event item  -->
              
                <div class="border-bottom">
                    <div class="date clearfix"><span class="float-right"><i class="fa fa-calendar"></i> {{ date('d-M-Y', strToTime($event->start_date)) }}</span></div>
                    <div><a href="{{url('events',$event->slug)}}">{!! str_limit(__($event->title_translation),80) !!}</a></div>
                </div>
                <?php $ev++; ?>
            @endforeach
        @endif
           
        </div>
        <div class="clearfix"><a href="{{url('events')}}" class="float-right btn btn-custom">{{__('label.more_events')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></div>
    </div>
</div> 




