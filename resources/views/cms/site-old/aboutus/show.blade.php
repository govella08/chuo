@include('site.includes.header')
<div class="middle-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <!--START RIGHT SIDEBAR CONTENTE SECTION-->
                <div class="right-sidebar-content div-match-height">
                    <h1 class="page-title">{!! $aboutus->{langdb('title')} !!}</h1>
                    <div class="article-head"> 
                         <p>{!! $aboutus->{langdb('content')} !!}</p>
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