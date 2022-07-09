@permission('dashboard.reports.graphs')
@extends('layouts.application')
@section('content')
<div class="panel panel-default">
      <div class="panel-heading">

        <h4 class="panel-title"><i class="fa fa-home" style="font-size:32px;"></i>&nbsp;Graphical Reports</h4>
      </div>
<style>
input[type=date]::-webkit-inner-spin-button {
	-webkit-appearance: none;
	display: none;
}
</style>

    <script src="{{ asset('cms_assets/js/highcharts/highcharts.js')}}"></script>
<script src="{{ asset('cms_assets/js/highcharts/data.js')}}"></script>
<script src="{{ asset('cms_assets/js/highcharts/drilldown.js')}}"></script>

<script src="{{ asset('cms_assets/js/highcharts/exporting.js')}} "></script>
<script src="{{ asset('cms_assets/js/highcharts/offline-exporting.js')}} "></script>

 
<div class="row">
	<div class="col-md-12">
		
		<!-- 	<div class="panel-body">

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
			</div> -->
		
	</div>
</div>

<div class="row">
  <div class="col-md-6">
<div id="bar1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div> 
<div class="col-md-6">
<div id="pie1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>
</div>
<hr>
<div class="row">
  <div class="col-md-6">
<div id="bar2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div> 
<div class="col-md-6">
<div id="pie2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>
</div>
<hr>
<div class="row">
  <div class="col-md-6">
<div id="bar3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div> 
<div class="col-md-6">
<div id="pie3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>
</div>
<hr>
<div class="row">
  <div class="col-md-6">
<div id="bar4" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div> 
<div class="col-md-6">
<div id="pie4" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>
</div>
<hr>
<div class="row">
  <div class="col-md-6">
<div id="bar5" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div> 
<div class="col-md-6">
<div id="pie5" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>
</div>
<hr>
</div>
<script>

// Create the chart
Highcharts.chart('bar1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'New Connection Performance vs Regions'
    },
    subtitle: {
        text: 'Source: <a href="#">DAWASA</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Performance (%)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '<b>{point.y:.2f}(%)</b>'
    },
     credits: {
      enabled: false
  },
    series: [{
        name: 'Performance (%)',
        data: [
        <?php $n=0; 
        for(;$n< sizeof($datanc);$n++){ 
        ?>

            ['{{ $datanc[$n]->region_name }}', {{ ($datanc[$n]->total_achievement/$datanc[$n]->total_target)*100 }}],
           <?php } ?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.2f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});


Highcharts.chart('pie1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'New Connection Performance vs Regions'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    credits: {
      enabled: false
  },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [
        <?php $n=0; 
        for(;$n< sizeof($datanc);$n++){ 
        ?>

            {  name:'{{ $datanc[$n]->region_name }}', y:{{ ($datanc[$n]->total_achievement/$datanc[$n]->total_target)*100 }} }, 
           <?php  } ?>
        ]
    }]
}); 

Highcharts.chart('bar2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Water Sales Performance vs Regions'
    },
    subtitle: {
        text: 'Source: <a href="#">DAWASA</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Performance (%)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '<b>{point.y:.2f}(%)</b>'
    },
     credits: {
      enabled: false
  },
    series: [{
        name: 'Performance (%)',
        data: [
        <?php $n=0; 
        for(;$n< sizeof($datawc);$n++){ 
        ?>

            ['{{ $datawc[$n]->region_name }}', {{ ($datawc[$n]->total_achievement/$datawc[$n]->total_target)*100 }}],
           <?php } ?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.2f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});


Highcharts.chart('pie2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Water Sales Performance vs Regions'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    credits: {
      enabled: false
  },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [
        <?php $n=0; 
        for(;$n< sizeof($datawc);$n++){ 
        ?>

            {  name:'{{ $datawc[$n]->region_name }}', y:{{ ($datawc[$n]->total_achievement/$datawc[$n]->total_target)*100 }} }, 
           <?php  } ?>
        ]
    }]
});



Highcharts.chart('bar3', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Meter Readings Performance vs Regions'
    },
    subtitle: {
        text: 'Source: <a href="#">DAWASA</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Performance (%)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '<b>{point.y:.2f}(%)</b>'
    },
     credits: {
      enabled: false
  },
    series: [{
        name: 'Performance (%)',
        data: [
        <?php $n=0; 
        for(;$n< sizeof($datamr);$n++){ 
        ?>

            ['{{ $datamr[$n]->region_name }}', {{ ($datamr[$n]->total_achievement/$datamr[$n]->total_target)*100 }}],
           <?php } ?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.2f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});


Highcharts.chart('pie3', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Meter Readings Performance vs Regions'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    credits: {
      enabled: false
  },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [
        <?php $n=0; 
        for(;$n< sizeof($datamr);$n++){ 
        ?>

            {  name:'{{ $datamr[$n]->region_name }}', y:{{ ($datamr[$n]->total_achievement/$datamr[$n]->total_target)*100 }} }, 
           <?php  } ?>
        ]
    }]
});


Highcharts.chart('bar4', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Meter Replacement Performance vs Regions'
    },
    subtitle: {
        text: 'Source: <a href="#">DAWASA</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Performance (%)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '<b>{point.y:.2f}(%)</b>'
    },
     credits: {
      enabled: false
  },
    series: [{
        name: 'Performance (%)',
        data: [
        <?php $n=0; 
        for(;$n< sizeof($datar);$n++){ 
        ?>

            ['{{ $datar[$n]->region_name }}', {{ ($datar[$n]->total_achievement/$datar[$n]->total_target)*100 }}],
           <?php } ?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.2f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});


Highcharts.chart('pie4', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Meter Replacement Performance vs Regions'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    credits: {
      enabled: false
  },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [
        <?php $n=0; 
        for(;$n< sizeof($datar);$n++){ 
        ?>

            {  name:'{{ $datar[$n]->region_name }}', y:{{ ($datar[$n]->total_achievement/$datar[$n]->total_target)*100 }} }, 
           <?php  } ?>
        ]
    }]
}); 

Highcharts.chart('bar5', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Revenue Collection Performance vs Regions'
    },
    subtitle: {
        text: 'Source: <a href="#">DAWASA</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Performance (%)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '<b>{point.y:.2f}(%)</b>'
    },
     credits: {
      enabled: false
  },
    series: [{
        name: 'Performance (%)',
        data: [
        <?php $n=0; 
        for(;$n< sizeof($datarv);$n++){ 
        ?>

            ['{{ $datarv[$n]->region_name }}', {{ ($datarv[$n]->total_achievement/$datarv[$n]->total_target)*100 }}],
           <?php } ?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.2f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});


Highcharts.chart('pie5', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Revenue Collection Performance vs Regions'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    credits: {
      enabled: false
  },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [
        <?php $n=0; 
        for(;$n< sizeof($datarv);$n++){ 
        ?>

            {  name:'{{ $datarv[$n]->region_name }}', y:{{ ($datarv[$n]->total_achievement/$datarv[$n]->total_target)*100 }} }, 
           <?php  } ?>
        ]
    }]
});
</script>



@endsection
@endpermission