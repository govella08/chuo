@extends('site.layout')
                <!-- CONTENT BLOCK HERE -->
                
 @section('content')
<section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page"> {{ __('label.sections') }}</li>
        </ol>
    </nav>
    <div class="content-border">
         
        
      @include('site.includes.left-sidebar')
    
         
        <div class="sub-main-content js-sub-main-height">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title-decoration py-2 mb-3"> Regional Offices</h4>
                    <div>
                        <!-- <p><i> The Office is led by a Regional State Attorney in Charge.</i></p> -->
                        <!-- zonal offices -->
                        <div id="accordion" class="list-group" data-children=".item">
                            @if(count($regional_offices))
                                @foreach($regional_offices as $i => $regional_office)
                                    <div class="item list-group-item">
                                        <a class="" data-toggle="collapse" data-parent="#accordion" href="#accordion{{$regional_office->id}}" aria-expanded="true" aria-controls="accordion{{$regional_office->id}}">
                                            <i class="fa fa-angle-double-right"></i> {{ $regional_office->region }}
                                        </a>
                                        <div id="accordion{{$regional_office->id}}" class="collapse {{ $i==0 ? 'active show':'' }}" role="tabpanel">
                                            <p class="mb-3">
                                            <hr>
                                            <b>Physcial Address</b>
                                            {{ __($regional_office->physical_address_translation) }} <br>
                                            Tel: {{ $regional_office->phone }} <br>
                                            Fax:  {{ $regional_office->fax }} <br>
                                            E-mail: {{ $regional_office->email }} <br>

                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <!-- ./zonal offices -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/sub-main-content -->
            
</section>

@stop