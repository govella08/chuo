<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title')</title>

        <link href="{{ asset('cms_assets/css/style.default.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="signin">
        
        
        <section>
            
            <div class="panel panel-signin">
                <div class="panel-body">
                    <div class="logo text-center">
                        <img src="{{ asset('cms_assets/images/dawasa.jpg') }}" style="width:272px;height:130px;" alt="DAWASCO Image" >
                    </div>
                    <br />
                     <center><span style="font-size:20px;"> M&E Portal</span></center>
                    <h4 class="text-center mb5">Sign in to your account</h4>
                    <div class="mb30"></div>
                    
                    @yield('content')
                    
                </div><!-- panel-body -->
            </div><!-- panel -->
            
        </section>


        <script src="{{ asset('cms_assets/js/jquery-1.11.1.min.js')}} "></script>
        <script src="{{ asset('cms_assets/js/jquery-migrate-1.2.1.min.js')}} "></script>
        <script src="{{ asset('cms_assets/js/bootstrap.min.js')}} "></script>
        <script src="{{ asset('cms_assets/js/modernizr.min.js')}} "></script>
        <script src="{{ asset('cms_assets/js/pace.min.js')}} "></script>
        <script src="{{ asset('cms_assets/js/retina.min.js')}} "></script>
        <script src="{{ asset('cms_assets/js/jquery.cookies.js')}} "></script>

        <script src="{{ asset('cms_assets/js/custom.js')}} "></script>

    </body>
</html>
