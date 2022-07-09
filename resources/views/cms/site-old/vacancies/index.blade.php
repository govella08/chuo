
@extends('site.layout')
@section('title')
    {!! __('label.vacancies') !!}
@endsection
@section('content')

<?php $local=$currentLanguage->locale; ?>
    <section class="main-content mb-2">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb py-0 mb-2">
                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{!! __('label.vacancies',[],$local) !!}</li>
            </ol>
        </nav>
        <div class="content-border">

      @include('site.includes.left-sidebar')
    

            <div class="sub-main-content js-sub-main-height">
                <div class="row">
                    <div class="col-md-12">
                        {{--<h4 class="title-decoration py-2 mb-3"> Single Page</h4>--}}
                        <div>
                            <div class="body_wrapper">
                                <div class="all_in">
                                    <div class="inner">
                                        <h2><span>{!! __('label.vacancies',[],$local) !!}</span></h2>
                                        <div class="msg">
                                            <ul>
                                                @foreach($vacancies as $vacancy)
                                                    <li> {{ __($vacancy->title_translation) }}
                                                        <p class="date"><i class="icon icon-calendar"></i> {{ __('label.deadline')}}&nbsp; {{ $vacancy->deadline }}
                                                            @if((__($vacancy->file_translation) != null))
                                                                <a href="{{ url(__($vacancy->file_translation)) }}" class="pull-right"><i class="icon icon-clip"></i> &nbsp; {{ __('label.download',[],$local) }}</a>
                                                            @endif
                                                        </p>
                                                    </li>
                                                @endforeach

                                            </ul>

                                        </div>
                                        <div class="pagination">{!!  $vacancies->render() !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/sub-main-content -->

    </section>

@stop


