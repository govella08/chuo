<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>JAKAYA KIKWETE CARDIAC INSTITUTE</title>

        <link rel="stylesheet" href="{{ asset('site/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('site/bootstrap/css/bootstrap-theme.min.css')}} ">
        <link rel="stylesheet" href="{{ asset('site/font-awesome/css/font-awesome.min.css')}} ">
        <link rel="stylesheet" type="text/css" href="{{ asset('site/css/styles.css')}} " />

        <script type="text/javascript" src="{{ asset('site/js/jquery-1.12.4.min.js')}} "></script>
        <script type="text/javascript" src="{{ asset('site/bootstrap/js/bootstrap.min.js')}} "></script>
        <script type="text/javascript" src="{{ asset('site/js/accordion.js')}} "></script>
        <script type="text/javascript" src="{{ asset('site/js/slider.js')}} "></script>
        <script type="text/javascript" src="{{ asset('site/js/script.js')}} "></script>

    </head>


    <body>
       <div class="head_wrapper">
           <div class="top_nav">
               <ul class="top_right">
                  
                   @if(curlang()=='_sw')
                     <li><a href="{{url('language/en')}}"><i class="fa fa-language top_ico left" aria-hidden="true"></i>English</a></li>
                   @else
                     <li><a href="{{url('language/sw')}}"><i class="fa fa-language top_ico left" aria-hidden="true"></i>Kiswahili</a></li>
                   @endif
                   <li><a href="{{ url('faqs') }}"><i class="fa fa-info-circle top_ico left" aria-hidden="true"></i>{{ label('lbl_faq_short') }}</a></li>
                   <li><a href="{{ url('contactus') }}"><i class="fa fa-map-marker left top_ico"></i>{{ label('lbl_contact')}}</a></li>
                   <li><a href="{{ url('donates') }}"><i class="fa fa-gift left top_ico" aria-hidden="true"></i>{{ label ('lbl_donate')}}</a></li>
               </ul>
           </div>
           <div class="bottom_nav">
               <div class="gov_logo"></div>
               <div class="slogan">
                    <p id="head">{{ label('lbl_site_subtitle') }}</p>
                    <p id="main">{{ label('lbl_site_title')}}</p>
                    <p id="head">Muhimbili</p>
               </div>
               <div class="org_logo"></div>               
           </div>
           <div class="menu_wrapper">  
                <div class="search_wrap">
                    <form>
                        <input type="text" name="search" placeholder="">
                    </form>
                </div> 
                <ul class="menuTemplate1 decor1_1" license="trlicense">
                            <li class="active"><a href="{{url('/')}}">Home</a></li>
                          {!! App\Models\MenuItem::getMenu()   !!}

                                  
                </ul>               
           </div>
       </div>
       <br>

	<p class="text-center" style="font-size:20px;">
        {{ label('lbl_error') }}
      </p>


       <div class="footer">
          <div class="tr_foot">

            
            <div class="tr_last">
              <p>&copy <?= date('Y')?> {{ label('lbl_site_title') }} {{ label('lbl_copyright') }}</p>
              <ul>
                <li><a href="{{ url('disclaimer') }}">{{ label('disclaimer') }} </a></li>
                <li><a href="{{ url('privacy') }}">{{ label('privacy_policy') }} </a></li>
                <li><a href="{{ url('sitemap') }}">{{ label('lbl_sitemap')}}</a></li>
                <li><a href="{{ url('vacancies') }}">{{ label('lbl_vacancies') }}</a></li>
                <li><a href="{{ url('tenders') }}">{{ label('lbl_tenders') }}</a></li>
                
                <li><a href="{{ url('faqs') }}">{{ label('lbl_faq') }}</a></li>
                <li><a href="careers.php">Staff Email</a></li>
              </ul>             
            </div>
          </div>
       </div>

        <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>  