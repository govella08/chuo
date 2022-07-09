@extends('cms.application')

@section('content')

<div class="row">

  <div class="large-12 medium-12 small-12 columns">


    @if(count($translations))
    <p class="form_success">  
      <h5 style="color:green;">{{ Session::get('success') }}</h5>
    </p>
    {!! Form::open(array('route' => 'cms.translations.update', 'method' => 'POST')) !!}
    <table id="table">

      <thead>
        <tr>
          <th>#</th>
          <th>Keysword</th>
          @foreach($available_locale as $val)
            @if($val == "en")
            <th>sw</th>
            @endif

            @if($val == "sw")
            <th>en</th>
            @endif
          @endforeach
        </tr>
      </thead>

      <tbody>


        <?php $inc=1; ?>
        @while($translations->count()>0)
        <tr>
          <td>
            <span> {{$inc}} </span> 

          </td>
          <td>
            <span>{!! $translations->first()->item !!}</span> 

          </td>
          @foreach($available_locale as $val)
          @if($translations->count()>0)
          <?php $locale_current=$translations->shift(); ?>
          @if($locale_current)
          <td>

            {{ Form::text("ids[$locale_current->id]", $locale_current->text ) }} 

          </td>
          @endif
          @endif
          @endforeach

        </tr>
        <?php $inc+=1; ?>
        @endwhile

        <div class="large-12 columns">
          {!! Form::submit('Save', array('class' => 'custom-button')) !!}
        </div>

      </tbody>

    </table>
    {!! Form::close() !!}

    @else

    <div class="empty-content">
      <i class="fa fa-cloud-upload"></i>
      <h4>No any translation posted yet please! click the button below to create one </h4>

      <a href="{!! URL::route('cms.translations.create') !!}">Add New</a>

    </div>

    @endif



  </div>

</div>



@stop