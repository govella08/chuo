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
  @if (count($errors) > 0)
<div class="alert alert-danger">
	<strong>Error</strong> There were some problems with your input.<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="col-xs-12 col-sm-12 col-md-12">
	 <div class="form-group">
    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update_user_role', $user->id]]) !!}
@include('system.users._edit_role_form', ['submitButton' => "Update",'class'=>'btn btn-success'])
{!! Form::close() !!}
</div>
</div>

</div>
</div>
@endsection