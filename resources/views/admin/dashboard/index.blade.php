@extends('admin.layout.index')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Online Store Visitors</h3>
                            <a href="javascript:void(0);">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- /.d-flex -->

                        <div class="position-relative mb-4">
                            <canvas id="visitors-chart" height="200"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Visitors
                  </span>

                            <span>
                    <i class="fas fa-square text-gray"></i> Page Views
                  </span>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Top Referrers</h3>
                            <a href="javascript:void(0);">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg">$18,230.00</span>
                                <span>Sales Over Time</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                                <span class="text-muted">Since last month</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->

                        <div class="position-relative mb-4">
                            <canvas id="sales-chart" height="200"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                  </span>

                            <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Top Referrers</h3>
                            <a href="javascript:void(0);">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg">$18,230.00</span>
                                <span>Sales Over Time</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                                <span class="text-muted">Since last month</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->

                        <div class="position-relative mb-4">
                            <canvas id="sales-chart" height="200"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                  </span>

                            <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
{{--    <script type="text/javascript">--}}
{{--        $(function () {--}}
{{--            'use strict'--}}

{{--            var ticksStyle = {--}}
{{--                fontColor: '#495057',--}}
{{--                fontStyle: 'bold'--}}
{{--            }--}}

{{--            var mode      = 'index'--}}
{{--            var intersect = true--}}

{{--            var $visitorsChart = $('#visitors-chart')--}}
{{--            var visitorsChart  = new Chart($visitorsChart, {--}}
{{--                data   : {--}}
{{--                    labels  : {!! json_encode($date->map(function ($d){ return $d->format('d/m/y');})) !!},--}}
{{--                    datasets: [{--}}
{{--                        type                : 'line',--}}
{{--                        data                : {!! json_encode($visitors) !!},--}}
{{--                        backgroundColor     : 'transparent',--}}
{{--                        borderColor         : '#007bff',--}}
{{--                        pointBorderColor    : '#007bff',--}}
{{--                        pointBackgroundColor: '#007bff',--}}
{{--                        fill                : false--}}
{{--                        // pointHoverBackgroundColor: '#007bff',--}}
{{--                        // pointHoverBorderColor    : '#007bff'--}}
{{--                    },--}}
{{--                        {--}}
{{--                            type                : 'line',--}}
{{--                            data                : {!! json_encode($pageViews) !!},--}}
{{--                            backgroundColor     : 'tansparent',--}}
{{--                            borderColor         : '#ced4da',--}}
{{--                            pointBorderColor    : '#ced4da',--}}
{{--                            pointBackgroundColor: '#ced4da',--}}
{{--                            fill                : false--}}
{{--                            // pointHoverBackgroundColor: '#ced4da',--}}
{{--                            // pointHoverBorderColor    : '#ced4da'--}}
{{--                        }]--}}
{{--                },--}}
{{--                options: {--}}
{{--                    maintainAspectRatio: false,--}}
{{--                    tooltips           : {--}}
{{--                        mode     : mode,--}}
{{--                        intersect: intersect--}}
{{--                    },--}}
{{--                    hover              : {--}}
{{--                        mode     : mode,--}}
{{--                        intersect: intersect--}}
{{--                    },--}}
{{--                    legend             : {--}}
{{--                        display: false--}}
{{--                    },--}}
{{--                    scales             : {--}}
{{--                        yAxes: [{--}}
{{--                            // display: false,--}}
{{--                            gridLines: {--}}
{{--                                display      : true,--}}
{{--                                lineWidth    : '4px',--}}
{{--                                color        : 'rgba(0, 0, 0, .2)',--}}
{{--                                zeroLineColor: 'transparent'--}}
{{--                            },--}}
{{--                            ticks    : $.extend({--}}
{{--                                beginAtZero : true,--}}
{{--                                suggestedMax: 200--}}
{{--                            }, ticksStyle)--}}
{{--                        }],--}}
{{--                        xAxes: [{--}}
{{--                            display  : true,--}}
{{--                            gridLines: {--}}
{{--                                display: false--}}
{{--                            },--}}
{{--                            ticks    : ticksStyle--}}
{{--                        }]--}}
{{--                    }--}}
{{--                }--}}
{{--            })--}}
{{--        })--}}

{{--    </script>--}}
@endsection
