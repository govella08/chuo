@extends('cms.application')

@section('stylesheets')
		<style type="text/css" media="screen">
				.role-permission {
					margin-left: 20px;
				}
		</style>
@stop


@section('content')

<div class="row collapse">
	<div class="large-12 medium-12 small-12 columns">
		<div class="content-panel">


				<div class="title">
					{{$role->name }} Permissions 
				</div>

				<div class="content content-large" style="display: inline;">
					{!! Form::open(['route' => 'cms.users.update-user-permissions','class'=>'role-permission']) !!}
						{!!Form::hidden('role_id',$role->id)!!}
	
							<ul class="perms small-block-grid-2 medium-block-grid-3 large-block-grid-5">

							@foreach($modules  as $name=>$actions)

							  <li>
							
							
									<h5 style="text-transform: capitalize; font-size: 0.995rem">{!! Form::checkbox('all',null,null,['class'=>'checkall']) !!} {{ str_replace('_',' ',substr(strrchr($name,'.'),1))}}</h5>
									<ul style="list-style: none">
										@foreach($actions as $action)
											<li><label>{!! Form::checkbox('permissions[]',$action->id,$action->permission_id) !!} {{ $action->action }}</label></li>
										@endforeach
									</ul>
								</li>
					
							@endforeach
							</ul>
	
						
						<div class="row">
							<div class="large-12 small-12 medium-12 columns">
								{!! Form::submit("UPDATE", ['class' => 'custom-button']) !!}
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			
		</div>
		
	</div>

</div>


@stop


@section('scripts')

	<script type="text/javascript" charset="utf-8">
		$( document ).ready(function() {
		    $('.perms').on('click','.checkall',function(){
		    		$(this).parent().parent().find('ul li input').prop('checked',$(this).is(':checked'))
		    });
		});
		
		
	</script>

@stop