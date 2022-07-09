<!-- INCLUDE FOOTER -->
<footer class="mdl-mega-footer">
    <div class="footer-middle">  

        <div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked>
            <h5 class="footer-heading">{{ __('label.vids')}}</h5>
            <ul class="footer-list">
                <li class="ml-0">
                    @if(count($video))
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/{!! utube_hash($video->url) !!}" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen"  msallowfullscreen="msallowfullscreen"  oallowfullscreen="oallowfullscreen"  webkitallowfullscreen="webkitallowfullscreen"></iframe>
                        <a href="{{ url('galleries/listing/videos') }}" class="mybtn"><span>{{ __('label.more_videos')}}</span><i class="fa fa-file-video-o" aria-hidden="true"></i></a>
                    </div>
                    @endif
                </li>
            </ul>
        </div>

        <div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked>
            <h5 class="footer-heading">{!! __('label.quick_links') !!}</h5>
            <ul class="footer-list">
                @if( count( $quick_links))
                @foreach( $quick_links as $quicklink )

                <li><i class="fa fa-arrow-circle-right"></i><a href=" {!! $quicklink->url !!} " target="_blank">
                    {!! $quicklink->{langdb('title')} !!}
                </a></li>  
                @endforeach
                @endif
            </ul>
        </div>

        <div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked>
            <h5 class="footer-heading">{!! __('label.related_links') !!}</h5>
            <ul class="footer-list">
                @if(count($related_links))
                @foreach ($related_links as $links)
                <li><i class="fa fa-arrow-circle-right"></i><a href="{!! $links->url !!}" target="_blank"> 
                    {!! $links->{ langdb('title') } !!}</a></li>
                    @endforeach
                    @endif
                    <!-- <li class="read-more float-right text-primary mr-3"><a href="related-links.html">View More <i class="fa fa-plus-circle"></i></a></li> -->
                </ul> 
            </div>

            <div class="footer-dropdown">
                <input class="footer-checkbox" type="checkbox" checked>
                <h5 class="footer-heading">{{ __('label.contact_info')}}</h5>
                <ul class="footer-list">

                    @if(count($contact->phone))
                    <li class="mb-1"><b>{{ __('label.call_us')}}</b><br>
                     {!! $contact->phone !!}/{!! $contact->fax !!}<br></li>
                @endif
                 @if(count($contact->hotline))
                   <li class="mb-1"><b>{{ __('label.hotline')}}</b><br>
                    {!! $contact->hotline !!}<br></li>
                @endif
                @if(count($contact->{langdb('physical_address')}))
                   <li class="mb-1"><b>{{ __('label.address') }}</b><br>
                    {{ $contact->{langdb('physical_address')} }}<br></li>
                @endif
                 @if(count($contact->email))
                    <li class="mb-1"><b>{{ __('label.email') }}</b><br>
                    {!! $contact->email !!}</li>
                @endif


                    <!-- social media links -->
                    <li>
                         @if(count($social_links))
                            @foreach($social_links as $slink)
                        <button class="social-btn pr-1"><a href="{!! $slink->url !!}" target="_blank"> <i class="{!! $slink->title !!}" aria-hidden="true"></i></a></button>
                            @endforeach     
                        @endif
                    </li>
                    <!-- ./social media links -->

                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <ul class="list-inline text-center">
                <li class="list-inline-item"><a href="{{ url('sitemap') }}">{{ __('label.sitemap') }} </a></li>
                <li class="list-inline-item"><a href="{{ url('privacy') }}">{{ label('privacy_policy') }} </a></li>
                <li  class="list-inline-item"><a href="single-page.html">Terms & Conditions</a></li>
                <li  class="list-inline-item"><a href="single-page.html">Copyright Statement</a></li>
                <li class="list-inline-item"><a href="{{ url('disclaimer') }}">{{ label('disclaimer') }} </a></li>
            </ul>

            <div class="text-center">Ownership. ©<script>document.write(new Date().getFullYear())</script> <a href="index.html">{{ __('label.site_title') }} </a>. {{ __('label.copyright') }}
                <br> @if(curlang()=='_en')
                Designed and developed by <a href="http://ega.go.tz"  target="_blank">e-Government Agency (eGA)</a>. Contents managed by {{ __('label.site_title') }}
                @else
                Imesanifiwa, Imetengenezwa, na <a href="http://ega.go.tz"  target="_blank">Wakala ya Serikali Mtandao (eGA)</a> na Inaendeshwa na {{ __('label.site_title') }}
                @endif
            </div>
        </div>
    </footer>


</div>
<script src="{{ asset('site/js/jquery.min.js')}}"></script>
<script src="{{ asset('site/js/matchHeight.min.js')}} "></script>
<script src="{{ asset('site/js/popper.min.js')}} "></script>
<script src="{{ asset('site/js/bootstrap.min.js')}} "></script>

<script src="{{ asset('site/js/jquery.dd.min.js')}} "></script>

<script src="{{ asset('site/js/jquery.cycle2.min.js')}} "></script>

<script src="{{ asset('site/js/custom.min.js')}} "></script>

<script>
$(document).ready(function(e) {
    try {
        $("body select").msDropDown();
    } 
    catch(e) {
        alert(e.message);
    }
});
</script>

<script>
$(document).ready(function () {

    $('.news-slider').slick({
        dots: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 4000
    });
});
</script>

<script src="{{ asset('site/js/slick.min.js')}} "></script>


</body>

</html>