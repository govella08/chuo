
<div class="sidebar jsSubMainHeight pb-3">
    <div class="sidebar-info">
        <h4 class="sidebar-header">{!! __('label.latest_news') !!}</h4>
        <div class="info-items">
        @forelse($recent_news as $recent_new)
            <div class="border-bottom">
                <div class="date clearfix">
                    <span class="float-right"> 
                        <i class="fas fa-calendar-alt"></i> {{ date('F, d, Y', strtotime($recent_new->created_at)) }}</span>
                </div>
                <a href="{{ url('news', $recent_new->slug) }}" class="media">
                    <div class="news-image">
                        <img src="{{ asset('uploads/news/medium-'.$recent_new->photo_url) }}" alt="News Image" class="img-fluid">
                    </div>
                    <div class="media-body news-content">
                        <div>{!! __($recent_new->title_translation) !!}</div>
                    </div>
                </a>
            </div>
        @empty
            {!! __('label.no_information') !!}
        @endforelse
        
        </div>
        <div class="text-center more">
            <a href="{{ url('news') }}" class="btn btn-custom">{!! __('label.view_all') !!}
                <i class="fas fa-long-arrow-alt-right"></i>
            </a>
        </div>
    </div>


    <div class="sidebar-info">
        <h4 class="sidebar-header">{!! __('label.events') !!}</h4>
        <div class="info-items">

            <ul class="list-unstyled programs p-1">
            @forelse($left_events as $left_event)
                <li class="border-bottom">
                    <h6><a class="link-black" href="{{ url('events', $left_event->slug) }}">Event title: {!! __($left_event->title_translation) !!}</a></h6>
                    <div class="d-flex justify-content-between mt-3"> 
                        <div><i class="far fa-calendar-alt"></i> {{ date('d',strtotime($left_event->created_at)) }}<sup>th</sup> {{ date('F Y',strtotime($left_event->created_at)) }}</div> 
                        <div><i class="fas fa-map-marked-alt"></i>{!! __($left_event->location_translation) !!}</div> 
                    </div>
                </li>
            @empty
                {!! __('label.no_information') !!}
            @endforelse
                
            </ul>
        </div>
        <div class="text-center more">
            <a href="{{ url('events') }}" class="btn btn-custom">View All
                <i class="fas fa-long-arrow-alt-right"></i>
            </a>
        </div>
    </div>
    <div class="sidebar-info mb-2">
        <h4 class="sidebar-header">{!! __('label.latest_announcements') !!}</h4>
        <div class="info-items">

            <ul class="list-unstyled programs p-1">
            @forelse($recent_announcements as $recent_announcement)
                <li class="border-bottom">
                        <div class="clearfix">
                                <span class="date float-right"><i class="far fa-calendar-alt"></i> {{ date('d',strtotime($recent_announcement->created_at)) }}<sup>th</sup> {{ date('F Y',strtotime($recent_announcement->created_at)) }}</span>
                            </div>
                            <a class="link-black" href="{{ url('announcements', $recent_announcement->slug) }}">{!! __($recent_announcement->name_translation) !!}</a>
                    
                </li>
            @empty
            {!! __('label.no_information') !!}
            @endforelse
                
            </ul>
        </div>
        <div class="text-center more">
            <a href="{{ url('announcements') }}" class="btn btn-custom">View All
                <i class="fas fa-long-arrow-alt-right"></i>
            </a>
        </div>
    </div>

</div>