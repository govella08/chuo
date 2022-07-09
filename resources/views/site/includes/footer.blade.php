<style>
                  @keyframes  censusBounce {
                      0%   { transform: scale(1,1)      translateY(0); }
                      10%  { transform: scale(1.1,.9)   translateY(0); }
                      30%  { transform: scale(.9,1.1)   translateY(-100px); }
                      50%  { transform: scale(1.05,.95) translateY(0); }
                      57%  { transform: scale(1,1)      translateY(-7px); }
                      64%  { transform: scale(1,1)      translateY(0); }
                      100% { transform: scale(1,1)      translateY(0); }
                  }
                  
                  .census {
                    position: fixed;
                    bottom: 0;
                    z-index: 999;
                    right: 5px;
                  }
                </style>
                  
<a href="https://www.nbs.go.tz/index.php/en/" target="_blank" class="census">
                      <img src="https://www.iae.ac.tz/site/images/sensa-sw.png" alt="Tanzania Census 2022" class="mx-auto img-fluid" style="width:160px;animation: censusBounce ease 3s infinite;"></a>



<!-- INCLUDE FOOTER -->
<footer class="mdl-mega-footer">

<div class="container">
    <div class="footer-middle">

        <div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked>
            <h4 class="footer-heading">{{ __('label.contact') }}</h4>
            <ul class="footer-list  ">
            @if(isset($contact->physical_address))
                <li><i class="fas fa-map-marker-alt"></i>&nbsp;<span> {!! __($contact->physical_address_translation) !!} </span></li>
            @endif            
            
            @if(isset($contact->phone))
                <li><i class="fas fa-tty"></i>&nbsp;{!! __('label.telephone', [], $local) !!}: {{ __($contact->phone) }}</li>
            @endif
            @if(isset($contact->fax))
                <li><i class="fas fa-fax"></i>&nbsp;{!! __('label.fax', [], $local) !!}: {{ __($contact->fax) }}</li>
            @endif
                <li><i class="far fa-envelope"></i>&nbsp;<a href={{ "mailto:".__($contact->email) }}>E-Mail:
                {!! __($contact->email) !!}</a></li>
            
                <li class="list-styled-none">
                    <ul class="list-unstyled m-0 d-flex flex-wrap">
                    @forelse($social_links as $social_link)
                        @if($social_link->title == 'youtube')
                        <li class="list-styled-none social-btn mt-3"><a href="{!! $social_link->url !!}"
                                target="_blank"
                                class="bg-youtube d-flex align-items-center justify-content-center"><i
                                    class="fab fa-youtube fa-lg" aria-hidden="true"></i></a></li>
                        @endif

                        @if($social_link->title == 'twitter')
                        <li class="list-styled-none social-btn mt-3"><a href="{!! $social_link->url !!}"
                                target="_blank"
                                class="bg-twitter d-flex align-items-center justify-content-center"><i
                                    class="fab fa-twitter fa-lg" aria-hidden="true"></i></a></li>
                        @endif

                        @if($social_link->title == 'facebook')
                        <li class="list-styled-none social-btn mt-3"><a href="{!! $social_link->url !!}"
                                target="_blank"
                                class="bg-facebook d-flex align-items-center justify-content-center"><i
                                    class="fab fa-facebook-f fa-lg" aria-hidden="true"></i></a></li>
                        @endif

                        @if($social_link->title == 'instagram')
                        <li class="list-styled-none social-btn mt-3"><a href="{!! $social_link->url !!}"
                                target="_blank"
                                class="bg-instagram d-flex align-items-center justify-content-center"><i
                                    class="fab fa-instagram fa-lg" aria-hidden="true"></i></a></li>
                        @endif

                        @if($social_link->title == 'whatsapp')
                        <li class="list-styled-none social-btn mt-3"><a href="{!! $social_link->url !!}"
                                target="_blank"
                                class="bg-google-plus d-flex align-items-center justify-content-center"><i
                                    class="fab fa-google-plus-g fa-lg" aria-hidden="true"></i></a></li>
                        @endif
                    @empty
                    {{ __('label.no_information') }}
                    @endforelse
                    </ul>
                </li>
            </ul>
        </div>

        <div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked>
            <h4 class="footer-heading">{{ __('label.related_links') }}</h4>
            <ul class="footer-list list-styled ">
            @forelse($related_links as $related_link)
                <li><a href="{!! $related_link->url !!}" target="_blabk">{!! __($related_link->title_translation) !!}</a></li>
            @empty
                {{ __('label.no_information') }}
            @endforelse
                <li class="list-styled-none more-link"><a href="{{ url('relatedlinks') }}">{!! __('label.view_more') !!} <i
                            class="fas fa-plus-circle"></i></a></li>
            </ul>
        </div>

        <div class="footer-dropdown">
          <input class="footer-checkbox" type="checkbox" checked>
          <h4 class="footer-heading"><span class="icon icon-link"></span> {!! __('label.quick_links') !!}</h1>
          <ul class="footer-list">
            @if( count( $quick_links))
             @foreach( $quick_links as $quicklink )
              <li><a href="{!! url($quicklink->url)  !!}">
                <span class="icon-angle-double-right"></span> {!! __($quicklink->title_translation) !!}
              </a></li>
             @endforeach
           @endif
          </ul>
        </div>
        <div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked> 
            <h4 class="footer-heading">{{ __('label.vids') }}</h4>
            <ul class="footer-list list-unstyled" >
            <li>
                <div class="mx-2 mt-3 d-flex">
                    <div class="embed-responsive embed-responsive-16by9 mx-2">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{!! utube_hash($video->url) !!}"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </li>
            <li> <a href="{{ url('galleries/listing/videos') }}">{{ __('label.video_gallery') }} <i class="fas fa-plus-circle"></i></a></li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        <ul class="list-inline text-center">
            <li class="list-inline-item"><a href="{{ url('sitemap') }}">{{ __('label.sitemap',[],$local) }}</a></li>
            <li class="list-inline-item"><a href="{{ url('privacy') }}">{{ __('label.privacy_policy',[],$local) }}</a></li>
            <li class="list-inline-item"><a href="{{ url('terms-and-conditions') }}">{{ __('label.terms_conditions',[],$local) }}</a></li>
            <li class="list-inline-item"><a href="{{ url('copyright') }}"> {{ __('label.copyright_statement',[],$local) }}</a></li>
            <li class="list-inline-item"><a href="{{ url('disclaimer') }}">{{ __('label.disclaimer',[],$local) }}</a></li>
        </ul>
        <div class="text-center">Copyright Â©<span id="copyrightDate"></span>
            <a href="{{ url('/') }}">{!! __('label.site_title') !!}</a>. {!! __('label.copyright') !!}
            <br> {!! __('label.website_by') !!} <a href="http://ega.go.tz"
                target="_blank">e-Government Authority</a>. {!! __('label.content_maintained') !!} {!! __('label.site_title') !!}
        </div>
    </div>
</div>
</footer>

<!-- Copyright Date -->
<script>
    let currentYear = new Date().getFullYear();
    let startYear = 2018;
    if (currentYear != startYear) {
        document.getElementById('copyrightDate').innerHTML = (startYear + "-" + new Date().getFullYear());
    } else {
        document.getElementById('copyrightDate').innerHTML = (new Date().getFullYear());
    }

</script>


</div>
<script src="{{ asset('site/js/jquery.min.js')}}"></script>

<script src="{{ asset('visitors-counter/client.min.js')}}"></script>
<script src="{{ asset('visitors-counter/visitors.logs.js')}}"></script>

<script src="{{ asset('site/js/nprogress.min.js') }}"></script>
<script src="{{ asset('site/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('site/js/matchHeight.min.js')}}"></script>
<script src="{{ asset('site/js/customScrollbar.min.js')}}"></script>
<script src="{{ asset('site/js/slick.min.js')}}"></script>
<script src="{{ asset('site/js/custom.min.js')}}"></script>




@yield('js-content')

<script>
    var default_lang = $('.languages-available a.dropdown-item:first-child');

    function dropdown_langSet(val) {
        if (val.innerHTML != "") {
            $('#dropdown_lang').val(val.innerHTML);
            $('#dropdown_lang').html(val.innerHTML);
        } else {
            $('#dropdown_lang').val('');
            $('#dropdown_lang').html(default_lang);
        }
    }

</script>

<script>
    $('#flash-overlay-modal').modal();
</script>