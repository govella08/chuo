@include('site.includes.header')
<!-- MIDDLE CONTENT -->
<div class="middle-content-wrapper">
    <div class="container">
        <div class="row">
           @include('site.includes.left-sidebar') 
<!-- /.left-sidebar-wrapper -->

            <div class="col-md-9 col-sm-12 col-xs-12">
                <!--START RIGHT SIDEBAR CONTENTE SECTION-->
                <div class="right-sidebar-content div-match-height">
                    <div class="breadcrumbs">
                        <ul>
                         <li><a href="/"><i class="icon icon-home"></i>Home</a></li>
                         <li><i class="icon icon-chevron-right"></i>{!! __('label.welcome_note') !!}</li>
                        </ul>
                    </div>
                    <h1 class="page-title">{!! __('label.welcome_note') !!}</h1>
                    @foreach($notes as $note)
                    <p>
                    	{!! __($note->content_translation) !!}
                    </p>
                    @endforeach
                    </div>
                <!-- /.right-sidebar-content -->
                <!--/END RIGHT SIDEBAR CONTENTE SECTION-->
            </div>
            <!-- /.middle-content-wrapper -->
            <!--/MIDDLE CONTENT-->
        </div>
    </div>
</div>
 @include('site.includes.footer')