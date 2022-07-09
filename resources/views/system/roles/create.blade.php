@extends('layouts.application')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><i class="fa fa-gears" style="font-size:32px;"></i>&nbsp;Role Management</h4>
    </div><br>
<div class="row db-heading-link">
   <div class="col-lg-12 margin-tb">
       @permission('roles.index')
       <div class="pull-right">
           <a class="btn btn-warning btn-sm" href="{{ route('roles.index') }}"> Back</a>
       </div>
       @endpermission
   </div>
</div>
@if (count($errors) > 0)
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="alert alert-danger status-box">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endif


<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="widget">
            <div class="widget-content">
                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}

                <div class="form-group col-md-6">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required')) !!}
                </div>

                <div class="form-group col-md-6">
                    <strong>Display Name:</strong>
                    {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control','required')) !!}
                </div>

                <div class="form-group col-md-12">
                    <strong>Description:</strong>
                    {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px','required')) !!}
                </div>

                
                
                <div class="form-group col-md-12">
                    <strong>Permission:</strong>
                    <br/><br/>
                    <?php $i=1;?>
                    @foreach($permission as $value)
                    <div class="col-md-4" style="height:50px;">
                        <label> {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            <?php echo $i;?>.{{ $value->description }}</label>
                            <br/>
                        </div>
                        <?php $i++;?>
                        @endforeach
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
        @endsection