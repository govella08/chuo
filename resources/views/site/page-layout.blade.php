
@extends('site.layout')
@section('title')
Page Title
@endsection

@section('breadcrumbs_container')
<nav aria-label="breadcrumb" class="breadcrumb-container">
    <div class="container">
        <ol class="breadcrumb  py-1 mb-0">
            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i></a></li>
            @yield('breadcrumbs-list')
        </ol>
    </div>
</nav>
@stop
@section('content')



<div class="content-border">
    <div class="container">
        <!-- sidebar -->
        @section('sidebar')
        @include('site.includes.left-sidebar')
        @show
        <!-- ./sidebar -->
        <div class="sub-main-content jsSubMainHeight">
            <div class="row">
                <div class="col-md-12">

                    <h4 class="title-decoration py-2 mb-3"> @yield('page-title')</h4>
                    <div>
                        <!-- page content section -->
                        
                        
                        @if($errors->all() && count($errors->all()) > 0)

                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <?php
                        $errorMsgs = '<ul>';
                        foreach($errors->all() as $err) {
                            $errorMsgs .= '<li>';
                            $errorMsgs .= $err;
                            $errorMsgs .= '</li>';
                        }

                        $errorMsgs .= '</ul>';
                        flash($errorMsgs)->error()->important();
                        ?>
                        @endif

                        @include('flash::message')
                        @yield('page-content')
                        <!-- ./page content section -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/sub-main-content -->



@stop
