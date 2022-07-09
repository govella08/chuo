<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="some page description here">
    <meta name="keywords" content="page keywords here">


    <title> @yield('title')| {!! __('label.site_title') !!} </title>

    <link rel="author" name="e-GA Designers" />

    <link rel="shortcut icon" href="{{ asset('site/images/logo.png')}}" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('site/css/master.min.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/perfect-scrollber.min.css')}}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
    crossorigin="anonymous">


    @yield('css-content')



    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <?php $local=$currentLanguage->locale; ?>


            <!-- INCLUDE HEADER -->
            @include("site.includes.header")


            <div class="content-layout">

                <div class="clearfix">
                    <section class="main-content mb-2">
                        @yield('breadcrumbs_container')
                        <div class="container">
                            @yield('content')
                        </div>
                    </section>
                </div>
            </div>


            <!-- INCLUDE FOOTER -->
            @include("site.includes.footer")


            <!-- ./endContainer -->

        </body>

        </html>
