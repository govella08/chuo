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
<div class="row db-show">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <div class="col-md-4">
            <strong>Name:</strong>
        </div>
        <div class="col-md-8">
            {{ $role->display_name }}
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <div class="col-md-4">
            <strong>Description:</strong>
        </div>
        <div class="col-md-8">
            {{ $role->description }}
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>&nbsp;&nbsp;Permissions:</strong>
        <div class="col-md-12">
            @if(!empty($rolePermissions))
            <?php $i=1;?>
            @foreach($rolePermissions as $v)
            <div class="col-xs-4 col-sm-4 col-md-4" style="height:50px;">
              <label class=""> <?php echo $i;?>.{{ $v->description }}</label>
          </div>
          <?php $i++;?>
          @endforeach
          @endif
      </div>
  </div>
</div>
</div>
</div>
@endsection