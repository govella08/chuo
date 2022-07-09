@extends('layouts.application')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">

    <h4 class="panel-title"><i class="fa fa-home" style="font-size:32px;"></i>&nbsp;Reports Summary</h4>
</div>
<style>
input[type=date]::-webkit-inner-spin-button {
	-webkit-appearance: none;
	display: none;
}
</style>

<div class="row">
	<div class="col-md-12">
				<h4>&nbsp;&nbsp;&nbsp;Search by Category</h4>
			<div class="panel-body">
				{!! Form::open(array('route' => 'dashboard.reports.category','method'=>'POST', 'class'=>'form-inline')) !!}

				<div class="form-group ">
					<strong>Region:</strong>
					{!! Form::select('region_id',[''=>'--- Choose Region---']+$region_name,null,['class'=>'form-control','required']) !!}
				</div>

				<div class="form-group ">
					<strong>Indicators:</strong>
					{!! Form::select('indicator_id',[''=>'--- Choose Indicator---']+$indicator_name,null,['class'=>'form-control','required']) !!}
				</div>

				<div class="form-group">
					<strong>From:</strong>
					{!! Form::input('date', 'from') !!}
				</div><!-- input-group -->

				<div class="form-group">
					<strong>To:</strong>
					{!! Form::input('date', 'to') !!}
				</div><!-- input-group -->

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Search</button>
				</div>
				{!! Form::close() !!}

			</div>
	</div>
</div> 

<?php  if(strpos($_SERVER['REQUEST_URI'],'category')){?>
<div class="row">
	<div class="col-md-12">
		<?php  if(count($datanc)){ ?>
		<caption><h4>Results</h4></caption>
		<table class="table table-bordered table table-sorting table-hover table-bordered table-dark-header  datatable  table-primary">
			<thead>
				<tr>
					<th>Region</th>
					<th>Target</th>
					<th>Achievement</th>
					<th>Performace(%)</th>
				</tr>
			</thead>
			@foreach ($datanc as  $nc)
			<tr>
				<td>{{ $nc->region_name }}</td>
				<td>{{ $nc->total_target }}</td>
				<td>{{ $nc->total_achievement }}</td>
				<td><?php  $number=($nc->total_achievement/$nc->total_target) *100;?>
					{{ number_format((float)$number, 2, '.', '')  }} %</td>
				</tr>
				@endforeach
			</table>
			<?php }else {  } ?>
		</div>

		
	</div>
	<?php } ?> 
	<hr>

<div class="row">
	<div class="col-md-12">
				<h4>&nbsp;&nbsp;&nbsp;Search Overall Data</h4>
	
			<div class="panel-body">

				{!! Form::open(array('route' => 'dashboard.reports.all','method'=>'POST', 'class'=>'form-inline')) !!}

				<div class="form-group">
					<strong>From:</strong>
					{!! Form::input('date', 'from',null,['required']) !!}
				</div>

				<div class="form-group">
					<strong>To:</strong>
					{!! Form::input('date', 'to',null,['required']) !!}
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Search</button>
				</div>
				{!! Form::close() !!}
			</div>
			
	</div>
</div>


	<?php if(strpos($_SERVER['REQUEST_URI'],'all')){?>

  <div class="row">
        <div class="col-md-6"> 

          <?php $n=0;  if(count($datarv)){ ?>
            <caption><h4>Revenue Collection</h4></caption>
            <table class="table table-primary table-striped table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Region</th>
                        <th>Target</th>
                        <th>Achievement</th>
                        <th>Performace(%)</th>
                    </tr>
                </thead>
                @foreach ($datarv as  $rvn)
                <?php $n++; ?>
                <tr>
                    <td>{{ $n }}</td>
                    <td>{{ $rvn->region_name }}</td>
                    <td>{{ $rvn->total_target }}</td>
                    <td>{{ $rvn->total_achievement }}</td>
                    <td><?php  $number=($rvn->total_achievement/$rvn->total_target) *100;?>
                       {{ number_format((float)$number, 2, '.', '')  }} %</td>
                   </tr>
                   @endforeach
               </table>
               <?php } ?>

           </div>
           
           <div class="col-md-6">
            <?php $n=0;  if(count($datawc)){ ?>
            <caption><h4>Water Sales</h4></caption>
            <table class="table table-primary table table-striped table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Region</th>
                        <th>Target</th>
                        <th>Achievement</th>
                        <th>Performace(%)</th>
                    </tr>
                </thead>
                @foreach ($datawc as  $wc)
                <?php $n++; ?>
                <tr>
                    <td>{{ $n }}</td>
                    <td>{{ $wc->region_name }}</td>
                    <td>{{ $wc->total_target }}</td>
                    <td>{{ $wc->total_achievement }}</td>
                    <td><?php  $number=($wc->total_achievement/$wc->total_target) *100;?>
                       {{ number_format((float)$number, 2, '.', '')  }} %</td>
                   </tr>
                   @endforeach
               </table>
               <?php }?>
           </div>
           </div>
            <div class="row">
           <div class="col-md-6">
            <?php $n=0;  if(count($datamr)){ ?>
            <caption><h4>Meter Readings</h4></caption>
            <table class="table table-primary table table-striped table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Region</th>
                        <th>Target</th>
                        <th>Achievement</th>
                        <th>Performace(%)</th>
                    </tr>
                </thead>
                @foreach ($datamr as  $mr)
                <?php $n++; ?>
                <tr>
                    <td>{{ $n }}</td>
                    <td>{{ $mr->region_name }}</td>
                    <td>{{ $mr->total_target }}</td>
                    <td>{{ $mr->total_achievement }}</td>
                    <td><?php  $number=($mr->total_achievement/$mr->total_target) *100;?>
                       {{ number_format((float)$number, 2, '.', '')  }} %</td>
                   </tr>
                   @endforeach
               </table>
               <?php }?>
           </div>

           <div class="col-md-6">
            <?php $n=0;  if(count($datar)){ ?>
            <caption><h4>Meter Replacement</h4></caption>
            <table class="table table-primary table table-striped table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Region</th>
                        <th>Target</th>
                        <th>Achievement</th>
                        <th>Performace(%)</th>
                    </tr>
                </thead>
                @foreach ($datar as  $mr)
                <?php $n++; ?>
                <tr>
                    <td>{{ $n }}</td>
                    <td>{{ $mr->region_name }}</td>
                    <td>{{ $mr->total_target }}</td>
                    <td>{{ $mr->total_achievement }}</td>
                    <td><?php  $number=($mr->total_achievement/$mr->total_target) *100;?>
                       {{ number_format((float)$number, 2, '.', '')  }} %</td>
                   </tr>
                   @endforeach
               </table>
               <?php }?>
           </div>
           </div>
            <div class="row">
           <div class="col-md-4">
            <?php $n=0; if(count($datanc)){ ?>
            <caption><h4>New Connection</h4></caption>
            <table class="table table-primary table table-striped table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Region</th>
                        <th>Target</th>
                        <th>Achievement</th>
                        <th>Performace(%)</th>
                    </tr>
                </thead>
                @foreach ($datanc as  $nc)
                <?php $n++; ?>
                <tr>
                    <td>{{ $n }}</td>
                    <td>{{ $nc->region_name }}</td>
                    <td>{{ $nc->total_target }}</td>
                    <td>{{ $nc->total_achievement }}</td>
                    <td><?php  $number=($nc->total_achievement/$nc->total_target) *100;?>
                       {{ number_format((float)$number, 2, '.', '')  }} %</td>
                   </tr>
                   @endforeach
               </table>
               <?php }?>
           </div>

       </div>
<?php } ?> 
       </div>

   @section('js-content')
   <script>

        $(document).ready(function() {
            var table = $('table').DataTable( {

                lengthChange: false,
                searching: false, 
                paging: false, 
                info: false,
                buttons: {

                    buttons: [

                        { extend: 'copy', className: 'btn-warning', text: '<i class="fa fa-files-o"></i>', titleAttr: 'Copy', title: 'Table Title Goes Here' },

                        { extend: 'excel', className: 'btn-success', text: '<i class="fa fa-file-excel-o"></i>', titleAttr: 'Excel', title: 'Table Title Goes Here' },

                        { extend: 'pdf', className: 'btn-danger', text: '<i class="fa fa-file-pdf-o"></i>', titleAttr: 'PDF', title: 'Table Title Goes Here' },

                        { extend: 'print', className: 'btn-info', text: '<i class="fa fa-print"></i>', titleAttr: 'Print', titleAttr: 'Print', title: 'Table Title Goes Here'},

                        { extend: 'csvHtml5', className: 'btn-dark', text: 'CSV', titleAttr: 'CSV', title: 'Table Title Goes Here'},

                        { extend: 'colvis', className: 'btn-outline-primary' }

                    ]

                }

            } );

        } );


    </script>
   @endsection

@endsection