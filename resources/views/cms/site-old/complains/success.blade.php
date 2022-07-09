
@include('site.includes.header')
<!-- MIDDLE CONTENT -->
<div class="middle-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <!--START RIGHT SIDEBAR CONTENTE SECTION-->
                <div class="right-sidebar-content div-match-height">
                    <div class="breadcrumbs">
                        <ul>
                         <li><a href="{{ url('/') }}"><i class="icon icon-home"></i>{!! label('lbl_home') !!}</a></li>
                         <li><i class="icon icon-chevron-right"></i><a href="{{ url('contactus') }}">{!! label('lbl_complains') !!}</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">{!! label('lbl_complains') !!}</h1>
                    <div class="contact">
                       <p>{{label('lbl_thanks_message')}}</p>
                    </div>
                </div>
                <!-- /.right-sidebar-content -->
                <!--/END RIGHT SIDEBAR CONTENTE SECTION-->
            </div>
        @include('site.includes.right-sidebar')
<!-- /.left-sidebar-wrapper -->

        </div>
    </div>
</div>
@include('site.includes.footer')
