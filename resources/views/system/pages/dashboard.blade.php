@extends('layouts.application')

@section('title', 'Dashboard')
@section('description', 'This is the dashboard')


@section('content_upper_title')
    <div>
        <i class="fa fa-cube"></i> <span class="dashboard-heading">DASHBOARD</span> <span class="db-italic"> the first priority information</span>
    </div>
@endsection


@section('content')
    <div class="container">

        <div class="row dashboard-stats">
            <div class="col-md-3">
                <div class="dsb-child-stat">
                    <div class="dsb-icon-data bills-generated">
                        <div>
                            <span><i class="fa fa-file-text-o"></i></span>
                        </div>
                        <div>
                            <span>{{$billsGenerated}}</span>
                        </div>
                    </div>
                    <div>
                        <h4>Bills Generated</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dsb-child-stat">
                    <div class="dsb-icon-data bills-payed">
                        <div>
                            <span><i class="fa fa-check"></i></span>
                        </div>
                        <div>
                            <span>{{$payedBills}}</span>
                        </div>
                    </div>
                    <div>
                        <h4>Payed Bills</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dsb-child-stat">
                    <div class="dsb-icon-data bills-payed">
                        <div>
                            <span><i class="fa fa-child"></i></span>
                        </div>
                        <div>
                            <span>{{$birthNotification}}</span>
                        </div>
                    </div>
                    <div>
                        <h4>Birth Notifications</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dsb-child-stat">
                    <div class="dsb-icon-data notification-received">
                        <div>
                            <span><i class="fa fa-bed"></i></span>
                        </div>
                        <div>
                            <span>{{$deathNotification}}</span>
                        </div>
                    </div>
                    <div>
                        <h4>Death Notifications</h4>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3">
                <div class="dsb-child-stat">
                    <div class="dsb-icon-data">
                        <div></div>
                        <div></div>
                    </div>
                    <div>
                        <h4>&nbsp;</h4>
                    </div>
                </div>
            </div> -->
        </div>


        <div class="content">
            <div class="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- WIDGET LINE CHART -->
                        <div class="widget">
                            <div class="widget-header">
                                <h3><i class="fa fa-bar-chart-o"></i> Bar Chart</h3> <em> - Received Notifications vs Printed Certificates ( current year )</em>
                            </div>
                            <div class="widget-content">
                                <canvas id="canvas" style="display: block; width: 100%;">
                                </canvas>
                            </div>
                        </div>
                        <!-- END WIDGET LINE CHART -->
                    </div>
                    <!-- <div class="col-md-4"></div> -->
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
@section('additional-js')
    <script>
    var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var color = Chart.helpers.color
    var barChartData = {
    labels: MONTHS,
    datasets: [{
    label: 'Birth Notifications',
    backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
    borderColor: window.chartColors.red,
    borderWidth: 1,
    data: [<?php foreach ($bnot as $data){echo $data.",";}?>]
    },
    {
    label: 'Death Notifications',
    backgroundColor: color(window.chartColors.grey).alpha(0.5).rgbString(),
    borderColor: window.chartColors.blue,
    borderWidth: 1,
    data: [<?php foreach ($dnot as $data){echo $data.",";}?>]
    },
    {
    label: 'Printed Death Certificates',
    backgroundColor: color(window.chartColors.orange).alpha(0.5).rgbString(),
    borderColor: window.chartColors.blue,
    borderWidth: 1,
    data: [<?php foreach ($pbnot as $data){echo $data.",";}?>]
    },
    {
    label: 'Printed Birth Certificates',
    backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
    borderColor: window.chartColors.blue,
    borderWidth: 1,
    data: [<?php foreach ($pdnot as $data){echo $data.",";}?>]
    }
    ]

    };

    window.onload = function () {
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(ctx, {
    type: 'bar',
    data: barChartData,
    options: {
    responsive: true,
    legend: {
    position: 'top',
    },
    title: {
    display: true,
    text: 'Monthly Data'
    },
    scales: {
    xAxes: [{
    display: true,
    scaleLabel: {
    display: true,
    labelString: 'Month'
    }
    }],
    yAxes: [{
    display: true,
    scaleLabel: {
    display: true,
    labelString: 'Total'
    }
    }]
    }
    }
    });

    };
    </script>
    @endsection
