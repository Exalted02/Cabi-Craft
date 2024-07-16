@extends('admin.layouts.app', [
'title'=> "Admin Panel | Snapsell"
])

@section('content')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">


            

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 d-flex">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <a href="javascript:void(0);" class="card text-decoration-none">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">Today Order</h5>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="stat text-primary">
                                                            <i class="align-middle" data-feather="users"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="mt-1 mb-3">${{$todayOrderSale}}</h4>
                                            </div>
                                        </a>
                                    </div>
									<div class="col-sm-3">    
										<a href="javascript:void(0);" class="card text-decoration-none">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">Yesterday Order</h5>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="stat text-primary">
                                                            <i class="align-middle" data-feather="shopping-bag"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="mt-1 mb-3">${{$yesturdayOrderSale}}</h4>
                                                
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="javascript:void(0);" class="card text-decoration-none">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">This Months</h5>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="stat text-primary">
                                                            <i class="align-middle" data-feather="trending-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="mt-1 mb-3">${{$thismonthOrderSale}}</h4>
                                                
                                            </div>
                                        </a>
                                    </div>
									<div class="col-sm-3">      
										<a href="javascript:void(0);" class="card text-decoration-none">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">Last Month</h5>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="stat text-primary">
                                                            <i class="align-middle" data-feather="trending-up"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="mt-1 mb-3">${{$lastmonthSale}}</h4>
                                                
                                            </div>
                                        </a>
                                    </div>
									<div class="col-sm-3">      
										<a href="javascript:void(0);" class="card text-decoration-none">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">All Time Sales</h5>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="stat text-primary">
                                                            <i class="align-middle" data-feather="trending-up"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="mt-1 mb-3">${{$totalOrderSale}}</h4>
                                                
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            
								<div class="row">
									<div class="col-sm-3">      
										<a href="javascript:void(0);" class="card text-decoration-none">
                                            <div class="card-body" style="height:90px;">
                                                <div class="row">
													<div class="col-auto">
                                                        <div class="stat text-primary">
                                                            <i class="align-middle" data-feather="trending-up"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">Total Order</h5>
                                                    </div>

                                                </div>
                                                <div style="margin-left:60px;"><h5 class="mt-1 mb-3">{{$tot_order}}</h5>
												</div>
                                                
                                            </div>
                                        </a>
                                    </div>
									<div class="col-sm-3">      
										<a href="javascript:void(0);" class="card text-decoration-none">
                                            <div class="card-body" style="height:90px;">
                                                <div class="row">
													<div class="col-auto">
                                                        <div class="stat text-primary">
                                                            <i class="align-middle" data-feather="trending-up"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">Order Pending</h5>
                                                    </div>

                                                </div>
                                                <div style="margin-left:60px;"><h5 class="mt-1 mb-3">{{ $order_pending }}</h5>
												</div>
                                                
                                            </div>
                                        </a>
                                    </div>
									<div class="col-sm-3">      
										<a href="javascript:void(0);" class="card text-decoration-none">
                                            <div class="card-body" style="height:90px;">
                                                <div class="row">
													<div class="col-auto">
                                                        <div class="stat text-primary">
                                                            <i class="align-middle" data-feather="trending-up"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">Order Processing</h5>
                                                    </div>

                                                </div>
                                                <div style="margin-left:60px;"><h5 class="mt-1 mb-3">{{ $order_processing }}</h5>
												</div>
                                                
                                            </div>
                                        </a>
                                    </div>
									<div class="col-sm-3">      
										<a href="javascript:void(0);" class="card text-decoration-none">
                                            <div class="card-body" style="height:90px;">
                                                <div class="row">
													<div class="col-auto">
                                                        <div class="stat text-primary">
                                                            <i class="align-middle" data-feather="trending-up"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">Order Delivered</h5>
                                                    </div>
												</div>
                                                <div style="margin-left:60px;"><h5 class="mt-1 mb-3">{{ $order_dispatched }}</h5>
												</div>
                                            </div>
                                        </a>
                                    </div>
								</div>
								
								
							</div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-xl-6 col-xxl-7">
                            <div class="card flex-fill w-100">
                                <div class="card-header">

                                    <h5 class="card-title mb-0">Weekly Sales</h5>
                                </div>
                                <div class="card-body py-3">
                                    <div class="chart chart-sm" style="height:350px;">
									<canvas id="weeklySalesChart" width="600" height="400"></canvas>
									{{--<canvas id="chartjs-dashboard-line"></canvas>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-xl-6 col-xxl-7">
                            <div class="card flex-fill w-100">
                                <div class="card-header">

                                    <h5 class="card-title mb-0">Order Status (%)</h5>
                                </div>
                                <div class="card-body py-3">
                                    <div class="chart chart-sm" style="height:350px;">
                                        <canvas id="pieChart"></canvas>
										{{--<canvas id="chartjs-dashboard-line2"></canvas>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					{{--<div class="row">
                        <div class="col-xl-6 col-xxl-7">
                            <div class="card flex-fill w-100">
                                <div class="card-header">

                                    <h5 class="card-title mb-0">Bulletin Requests</h5>
                                </div>
                                <div class="card-body py-3">
                                    <div class="chart chart-sm">
                                        <canvas id="chartjs-dashboard-line3"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}

                </div>
            </main>
@endsection

@section('scripts')
<!--<script src="https://code.jquery.com/jquery-3.5.0.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>-->
<!--<script src="js/app.js"></script>-->
<!--<canvas id="weeklySalesChart" width="400" height="200"></canvas>-->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
		var ctx = document.getElementById('weeklySalesChart').getContext('2d');
		var weeklySalesChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: @json($labels),
				datasets: [{
					label: 'Weekly Sales',
					data: @json($salesData),
					backgroundColor: 'rgba(54, 162, 235, 0.2)',
					borderColor: 'rgba(54, 162, 235, 1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	
	
        /*document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct",
                        "Nov", "Dec"
                    ],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            2115,
                            1562,
                            1584,
                            1892,
                            1587,
                            1923,
                            2566,
                            2448,
                            2805,
                            3438,
                            2917,
                            3327
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });*/
		document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById("chartjs-dashboard-line2").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line2"), {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct",
                        "Nov", "Dec"
                    ],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            2115,
                            1562,
                            1584,
                            1892,
                            1587,
                            1923,
                            2566,
                            2448,
                            2805,
                            3438,
                            2917,
                            3327
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });
		document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById("chartjs-dashboard-line3").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line3"), {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct",
                        "Nov", "Dec"
                    ],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            2115,
                            1562,
                            1584,
                            1892,
                            1587,
                            1923,
                            2566,
                            2448,
                            2805,
                            3438,
                            2917,
                            3327
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Pie chart
            new Chart(document.getElementById("chartjs-dashboard-pie"), {
                type: "pie",
                data: {
                    labels: ["Chrome", "Firefox", "IE"],
                    datasets: [{
                        data: [4306, 3801, 1689],
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.warning,
                            window.theme.danger
                        ],
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: !window.MSInputMethodContext,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 75
                }
            });
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Bar chart
            new Chart(document.getElementById("chartjs-dashboard-bar"), {
                type: "bar",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct",
                        "Nov", "Dec"
                    ],
                    datasets: [{
                        label: "This year",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                        barPercentage: .75,
                        categoryPercentage: .5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            stacked: false,
                            ticks: {
                                stepSize: 20
                            }
                        }],
                        xAxes: [{
                            stacked: false,
                            gridLines: {
                                color: "transparent"
                            }
                        }]
                    }
                }
            });
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var markers = [{
                    coords: [31.230391, 121.473701],
                    name: "Shanghai"
                },
                {
                    coords: [28.704060, 77.102493],
                    name: "Delhi"
                },
                {
                    coords: [6.524379, 3.379206],
                    name: "Lagos"
                },
                {
                    coords: [35.689487, 139.691711],
                    name: "Tokyo"
                },
                {
                    coords: [23.129110, 113.264381],
                    name: "Guangzhou"
                },
                {
                    coords: [40.7127837, -74.0059413],
                    name: "New York"
                },
                {
                    coords: [34.052235, -118.243683],
                    name: "Los Angeles"
                },
                {
                    coords: [41.878113, -87.629799],
                    name: "Chicago"
                },
                {
                    coords: [51.507351, -0.127758],
                    name: "London"
                },
                {
                    coords: [40.416775, -3.703790],
                    name: "Madrid "
                }
            ];
            var map = new jsVectorMap({
                map: "world",
                selector: "#world_map",
                zoomButtons: true,
                markers: markers,
                markerStyle: {
                    initial: {
                        r: 9,
                        strokeWidth: 7,
                        stokeOpacity: .4,
                        fill: window.theme.primary
                    },
                    hover: {
                        fill: window.theme.primary,
                        stroke: window.theme.primary
                    }
                },
                zoomOnScroll: false
            });
            window.addEventListener("resize", () => {
                map.updateSize();
            });
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
            var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
            document.getElementById("datetimepicker-dashboard").flatpickr({
                inline: true,
                prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                nextArrow: "<span title=\"Next month\">&raquo;</span>",
                defaultDate: defaultDate
            });
        });

    </script>
	<script>
        var ctxs = document.getElementById('pieChart').getContext('2d');
        var myChart = new Chart(ctxs, {
            type: 'pie',
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    data: @json($data['data']),
                    backgroundColor: [
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(243, 156, 18, 0.7)',
                        'rgba(75, 192, 192, 0.7)', 
                    ],
                    borderColor: [
                        'rgba(46, 204, 113, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
        });
    </script>

@endsection
