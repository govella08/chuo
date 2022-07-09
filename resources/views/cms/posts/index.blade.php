@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                    @if (session('succes'))
                        <div class="alert alert-success" role="alert">
                            {{ session('succes') }}
                        </div>
                    @endif

                @if($posts->count()>0)
                    @foreach($posts as $post)

                    <div class="well">
                      <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placekitten.com/150/150">
                        </a>
                        <div class="media-body">
                            <div class="row">
                            <h4 class="media-heading">{{__($post->title_translation)}}</h4>
                          
                                <div class="col-md-12"><hr>
                                    <p>{{__($post->description_translation)}}</p>
                          <ul class="list-inline list-unstyled">
                            <li><span><i class="fa fa-calendar"></i> {{$post->created_at}}</span></li>
                          
                            <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                              <span><i class="fa fa-facebook-square"></i></span>
                              <span><i class="fa fa-twitter-square"></i></span>
                              <span><i class="fa fa-google-plus-square"></i></span>
                            </li>
                            </ul>
                                </div>
                            </div>
                       </div>
                    </div>
                  </div>
                    @endforeach
                @endif
              
        </div>
    </div>
</div>
@endsection
