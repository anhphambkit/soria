<!DOCTYPE html>
<html>
<head>

    <!-- Title -->
    <title>ARC RELOCATION | Admin Dashboard Template</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Bigin" />
    <link rel="icon" href="https://arcrelocation.com/wp-content/uploads/2017/03/cropped-arc-favicon-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://arcrelocation.com/wp-content/uploads/2017/03/cropped-arc-favicon-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="https://arcrelocation.com/wp-content/uploads/2017/03/cropped-arc-favicon-180x180.png" />
    <meta name="msapplication-TileImage" content="https://arcrelocation.com/wp-content/uploads/2017/03/cropped-arc-favicon-270x270.png" />

    <!-- Styles -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="themes/adminlte/assets/css/lib.min.css" rel="stylesheet"/>

</head>

<style>
    .inbox-widget {
        height: 379px!important;
    }

    svg [aria-labelledby*="id-"][aria-labelledby*="-title"]{
        display: none;
    }

    svg + [title*="JavaScript charts"]{
        display: none!important;
    }
    #origin-map, #destination-map, #vmap, #vmap1 {
        width: 100%;
        height: 300px;
    }
    .map-marker {
        width: 10px;
        height: 10px;
    }

    .map-marker.map-clickable {
        cursor: pointer;
    }

    .pulse {
        width: 10px;
        height: 10px;
        border: 5px solid #f7f14c;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
        border-radius: 30px;
        background-color: #f7f14c;
        z-index: 10;
        position: absolute;
    }

    .map-marker .dot {
        border: 10px solid #eedb22;
        background: transparent;
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        border-radius: 60px;
        height: 50px;
        width: 50px;
        -webkit-animation: pulseMap 2s ease-out;
        -moz-animation: pulseMap 2s ease-out;
        animation: pulseMap 2s ease-out;
        -webkit-animation-iteration-count: infinite;
        -moz-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        position: absolute;
        top: -20px;
        left: -20px;
        z-index: 1;
        opacity: 0;
    }

    @-moz-keyframes pulseMap {
        0% {
            -moz-transform: scale(0);
            opacity: 0.0;
        }
        25% {
            -moz-transform: scale(0);
            opacity: 0.1;
        }
        50% {
            -moz-transform: scale(0.1);
            opacity: 0.3;
        }
        75% {
            -moz-transform: scale(0.5);
            opacity: 0.5;
        }
        100% {
            -moz-transform: scale(1);
            opacity: 0.0;
        }
    }

    @-webkit-keyframes "pulseMap" {
        0% {
            -webkit-transform: scale(0);
            opacity: 0.0;
        }
        25% {
            -webkit-transform: scale(0);
            opacity: 0.1;
        }
        50% {
            -webkit-transform: scale(0.1);
            opacity: 0.3;
        }
        75% {
            -webkit-transform: scale(0.5);
            opacity: 0.5;
        }
        100% {
            -webkit-transform: scale(1);
            opacity: 0.0;
        }
    }

    #origin-map svg+a, #destination-map svg+a, #vmap svg+a, #vmap1 svg+a {
        display: none!important;
    }
</style>

<body class="page-header-fixed page-sidebar-fixed compact-menu">
<?php require "include/section/common/loader/loader.php"; ?>
<?php require "include/section/common/navbar/navbar-weather-widget.php"; ?>
<div class="menu-wrap">
    <nav class="profile-menu">
        <div class="profile"><img src="assets/images/profile-menu-image.png" width="60" alt="Johnny Depp"/><span>Johnny Depp</span></div>
        <div class="profile-menu-list"> <a href="#"><i class="fa fa-star"></i><span>Favorites</span></a> <a href="#"><i class="fa fa-bell"></i><span>Alerts</span></a> <a href="#"><i class="fa fa-envelope"></i><span>Messages</span></a> <a href="#"><i class="fa fa-comment"></i><span>Comments</span></a> </div>
    </nav>
    <button class="close-button" id="close-button">Close Menu</button>
</div>
<main class="page-content content-wrap">
<?php require "include/section/common/navbar/navbar.php"; ?>
<!-- Navbar -->
<?php require "include/section/common/sidebar/main.php"; ?>
<!-- Page Sidebar -->
    <div class="page-inner">
        <?php require "include/layout/dashboard/page-top.php"; ?>
        <div class="clearfix"></div>
        <!--  Page Top -->
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-heading">
                            <h4 class="panel-title">Relocation Distribution by Origin (State)</h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div id="origin-map"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-heading">
                            <!-- <h4 class="panel-title">Active Moves Report (Map)</h4> -->
                            <h4 class="panel-title">Relocation Distribution by Origin (Country)</h4>
                        </div>
                        <div class="panel-body">
                            <div  class="col-md-12">
                                <div id="vmap"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-heading">
                            <!-- <h4 class="panel-title">Closed Moves Report (Map)</h4> -->
                            <h4 class="panel-title">Relocation Distribution by Destination (State)</h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div id="destination-map"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-heading">
                            <!-- <h4 class="panel-title">Closed Moves Report (Map)</h4> -->
                            <h4 class="panel-title">Relocation Distribution by Destination (Country)</h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div id="vmap1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->

            <div class="row">
                <div class="col-md-8">
                    <div class="panel info-box panel-white">
                        <div class="panel-heading">
                            <h4 class="panel-title">Initiated & Completed Relocations by Month</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="height: 450px;">
                                        <!-- <canvas id="chart2" style="width: 100%; height: 450px;"></canvas> -->
                                        <div id="chart2" style="width: 100%; height: 450px;"></div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-2">
                                    <div class="stats-info">
                                        <ul class="list-unstyled">
                                            <li><div class="legend-chart initiated pull-left m-r-xs"></div>Initiated</li>
                                            <li><div class="legend-chart completed pull-left m-r-xs"></div>Completed</li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel info-box panel-white">
                        <div class="panel-heading">
                            <h4 class="panel-title">Task Summary</h4>
                        </div>
                        <div class="panel-body">
                            <div role="tabpanel">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab29" role="tab" data-toggle="tab">Today Due</a></li>
                                    <li role="presentation"><a href="#tab30" role="tab" data-toggle="tab">Past Due</a></li>
                                    <li role="presentation"><a href="#tab31" role="tab" data-toggle="tab">Upcoming</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane <?php if($j==0) echo 'active'; ?> fade in" id="tab29">
                                        <div class="task-summary slimscroll" style="height: 247px!important;">
                                            <?php
                                            $statusClass = array("active", "queued");
                                            $taskName = array("Harry Ross",
                                                "Bruce Cook",
                                                "Carolyn Morgan",
                                                "Albert Walker",
                                                "Randy Reed",
                                                "Larry Barnes",
                                                "Lois Wilson",
                                                "Jesse Campbell",
                                                "Ernest Rogers",
                                                "Theresa Patterson",
                                                "Henry Simmons",
                                                "Michelle Perry",
                                                "Frank Butler",
                                                "Shirley Tooth");
                                            for ($i=0; $i < 8; $i++) {
                                            $statusName = $statusClass[array_rand($statusClass)];
                                            switch ($statusName) {
                                                case 'active':
                                                    $classStyle = 'info';
                                                    $title = 'Active';
                                                    break;

                                                case 'queued':
                                                    $classStyle = 'danger';
                                                    $title = 'Overdue';
                                                    break;

                                                default:
                                                    $classStyle = 'info';
                                                    $title = 'Active';
                                                    break;
                                            }?>
                                            <div class="task-item">
                                                <div class="task-item-title mb-1"><?php echo $taskName[$i]; ?></div>
                                                <div class="task-action">
                                                    <div class="action-btn">
                                                        <a href="javascript:void(0);" class="btn btn-<?php echo $classStyle; ?> btn-sm btn-rounded">
                                                            <?php echo $title; ?>
                                                        </a>
                                                    </div>
                                                    <a href="javascript:void(0);" class="action-btn icon-type" data-toggle="tooltip" title="" data-original-title="Mark as Complete">
                                                        <i class="fas fa-clipboard-check"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="tab30">
                                        <div class="task-summary slimscroll" style="height: 247px!important;">
                                            <?php
                                            for ($i=0; $i < 8; $i++) { ?>
                                            <div class="task-item">
                                                <div class="task-item-title mb-1"><?php echo $taskName[$i]; ?></div>
                                                <div class="task-action">
                                                    <div class="action-btn">
                                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm btn-rounded">
                                                            Overdue		                                                	</a>
                                                    </div>
                                                    <a href="javascript:void(0);" class="action-btn icon-type" data-toggle="tooltip" title="" data-original-title="Mark as Complete">
                                                        <i class="fas fa-clipboard-check"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="tab31">
                                        <div class="task-summary slimscroll" style="height: 247px!important;">
                                            <?php
                                            for ($i=0; $i < 8; $i++) { ?>
                                            <div class="task-item">
                                                <div class="task-item-title mb-1"><?php echo $taskName[$i]; ?></div>
                                                <div class="task-action">
                                                    <div class="action-btn">
                                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm btn-rounded">
                                                            Overdue		                                                	</a>
                                                    </div>
                                                    <a href="javascript:void(0);" class="action-btn icon-type" data-toggle="tooltip" title="" data-original-title="Mark as Complete">
                                                        <i class="fas fa-clipboard-check"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->

            <div class="row">
                <div class="col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-heading">
                            <h4 class="panel-title">Transferee Summary</h4>
                        </div>
                        <div class="panel-body">
                            <div  class="col-md-12" id="morris4" style="width: 100%; height: 500px;"></div>
                            <!-- <div  class="col-md-8" id="morris4" style="height: 248px;"></div> -->
                            <!-- <div class="col-md-4 p-0">
                                <ul class="list-unstyled weather-info">
                                    <li>Active <span class="pull-right"><b class="counter">1410</b></span></li>
                                    <li>Cancelled <span class="pull-right"><b class="counter">300</b></span></li>
                                    <li>Complete <span class="pull-right"><b class="counter">1125</b></span></li>
                                    <li>Delete <span class="pull-right"><b class="counter">152</b></span></li>
                                    <li>On-Hold <span class="pull-right"><b class="counter">128</b></span></li>
                                    <li>Pending <span class="pull-right"><b class="counter">342</b></span></li>
                                    <li>Queued <span class="pull-right"><b class="counter">214</b></span></li>
                                </ul>
                            </div> -->
                            <div class="col-md-12 text-center"><b class="counter"><big>4510</big></b> Total Transferees</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-heading">
                            <h4 class="panel-title">Vendor Summary</h4>
                        </div>
                        <div class="panel-body">
                            <div  class="col-md-12" id="morris6" style="width: 100%; height: 500px;"></div>
                            <!-- <div  class="col-md-8" id="morris6" style="height: 248px;"></div> -->
                            <!-- <div class="col-md-4 p-0">
                                <ul class="list-unstyled weather-info">
                                    <li>Active <span class="pull-right"><b class="counter">1542</b></span></li>
                                    <li>Inactive <span class="pull-right"><b class="counter">133</b></span></li>
                                </ul>
                            </div> -->
                            <!-- 	<div  class="col-md-8" id="morris6" style="height: 248px;"></div>
                                <div class="col-md-4 p-0">
                                    <ul class="list-unstyled weather-info">
                                        <li>Active <span class="pull-right"><b class="counter">1542</b></span></li>
                                        <li>Inactive <span class="pull-right"><b class="counter">133</b></span></li>
                                    </ul>
                                </div> -->
                            <div class="col-md-12 text-center"><b class="counter"><big>1670</big></b> Total Vendor</div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- Row -->

            <div class="modal fade" id="country" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="panel-control pull-right"> <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close" data-dismiss="modal"> <i class="icon-close"></i> </a> </div>
                            <h4 class="modal-title" id="myModalLabel">Transferee List</h4>
                        </div>
                        <div class="modal-body clearfix">
                            <div class="col-md-12 p-0">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="tbl1 display table">
                                                    <thead>
                                                    <tr>
                                                        <th>Type Number</th>
                                                        <th>Reporting Date</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Client Name</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>12/12/2017</td>
                                                        <td>Mike</td>
                                                        <td>Black</td>
                                                        <td>Mike Black</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>12/12/2017</td>
                                                        <td>Mike</td>
                                                        <td>Black</td>
                                                        <td>Mike Black</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>12/12/2017</td>
                                                        <td>Mike</td>
                                                        <td>Black</td>
                                                        <td>Mike Black</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Wrapper -->
        <?php require "include/section/common/footer.php" ?>
    </div>
    <!-- Page Inner -->
</main>
<!-- Page Content -->
<?php require "include/section/common/navbar/navbar-menu-widget.php"; ?>

<!-- Javascripts -->
<script src="https://www.amcharts.com/lib/3/ammap.js"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/usaLow.js"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>

<script src="https://www.amcharts.com/lib/3/pie.js"></script>

<script src="https://www.amcharts.com/lib/3/funnel.js"></script>

<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>

<script src="https://www.amcharts.com/lib/4/maps.js"></script>
<script src="https://www.amcharts.com/lib/4/geodata/worldLow.js"></script>

<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script src="themes/adminlte/assets/js/dashboard.min.js"></script>
<script>
    $(window).on("load", function() {
        setTimeout(function() {
            $(".page-loader").fadeOut()
        }, 500)
    });

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();

        /* Relocation Distribution */

        // Create map instance
        var originMap = am4core.create("origin-map", am4maps.MapChart);

        // Set map definition
        originMap.geodata = am4geodata_worldLow;

        // Set projection
        originMap.projection = new am4maps.projections.Orthographic();

        // Create map polygon series
        var polygonSeries = originMap.series.push(new am4maps.MapPolygonSeries());

        // Make map load polygon (like country names) data from GeoJSON
        polygonSeries.useGeodata = true;

        // Configure series
        var polygonTemplate = polygonSeries.mapPolygons.template;
        polygonTemplate.tooltipText = "{name}";
        polygonTemplate.fill = am4core.color("#8ddaef");

        // Create hover state and set alternative fill color
        var hs = polygonTemplate.states.create("hover");
        hs.properties.fill = am4core.color("#20B9DF");

        var label = originMap.chartAndLegendContainer.createChild(am4core.Label);
        // label.text = "chart.deltaLongitude = 0";
        label.fontSize = 18;
        label.align = "center"
        label.padding(5, 10, 5, 10);
        label.background.fillOpacity = 0.05;
        // label.background.fill = am4core.color("#000");

        // Make globe rotatable
        originMap.seriesContainer.draggable = false;
        originMap.seriesContainer.resizable = false;

        var originalDeltaLongitude = 0;

        originMap.seriesContainer.events.on("down", function(ev) {
            originalDeltaLongitude = originMap.deltaLongitude;
        });

        originMap.seriesContainer.events.on("track", function(ev) {
            if (ev.target.isDown) {
                var pointer = ev.target.interactions.downPointers.getIndex(0);
                var startPoint = pointer.startPoint;
                var point = pointer.point;
                var shift = point.x - startPoint.x;
                originMap.deltaLongitude = originalDeltaLongitude + shift / 2;
                // label.text = "chart.deltaLongitude = " + originMap.numberFormatter.format(originMap.deltaLongitude, "[green]#.|[red]#.|[#555]#");
            }
        })

        originMap.legend = new am4charts.Legend();
        originMap.legend.data = [{
            "name": "0 - 200",
            "fill": colorRange[0],
            "value": arr[0]
        }, {
            "name": "200 - 400",
            "fill": colorRange[1],
            "value": arr[1]
        }, {
            "name": "400 - 600",
            "fill": colorRange[2],
            "value": arr[2]
        }, {
            "name": "600 - 800",
            "fill": colorRange[3],
            "value": arr[3]
        },{
            "name": "800 - 1000",
            "fill": colorRange[4],
            "value": arr[4]
        }]

        originMap.legend.background.fill = am4core.color("#000");
        originMap.legend.background.fillOpacity = 0.03;
        originMap.legend.width = 100;
        originMap.legend.align = "right";
        originMap.legend.padding(10, 15, 10, 15);

        originMap.events.on("inited", function(event) {
            // var map = originMap;
            // // go through all of the images
            // for (var x in map.geodata.features) {
            // 	// get MapImage object
            // 	var image = map.geodata.features[x],
            // 		longitude = image.geometry.coordinates[0][0][0],
            // 		latitude = image.geometry.coordinates[0][0][1];

            // 	//check if it has corresponding HTML element
            // 	if ('undefined' == typeof image.externalElement){
            // 		image.externalElement = createGlobeCustomMarker(image, "origin-map", originMap, x);
            // 		// debugger
            // 		// reposition the element accoridng to coordinates
            // 		// var xy = map.coordinatesToStageXY(longitude, latitude);
            // 		image.externalElement.style.top = longitude + 'px';
            // 		image.externalElement.style.left = latitude + 'px';
            // 	}
            // }
        }, this);




        /* Initiated & Completed Relocations by Month */
        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("chart2", am4charts.XYChart3D);

        chart.exporting.menu = new am4core.ExportMenu();
        chart.responsive.enabled = true;

        // Add data
        chart.data = [{
            "month": "January",
            "initiated": 3.5,
            "completed": 4.2
        }, {
            "month": "February",
            "initiated": 1.7,
            "completed": 3.1
        }, {
            "month": "March",
            "initiated": 2.8,
            "completed": 6.9
        }, {
            "month": "April",
            "initiated": 2.6,
            "completed": 2.3
        }, {
            "month": "May",
            "initiated": 1.4,
            "completed": 2.1
        }, {
            "month": "June",
            "initiated": 2.6,
            "completed": 4.9
        }, {
            "month": "July",
            "initiated": 6.4,
            "completed": 7.2
        }, {
            "month": "August",
            "initiated": 8,
            "completed": 7.1
        }, {
            "month": "September",
            "initiated": 4.9,
            "completed": 10.1
        }, {
            "month": "October",
            "initiated": 5.1,
            "completed": 1.1
        }, {
            "month": "November",
            "initiated": 7.2,
            "completed": 3.1
        }, {
            "month": "December",
            "initiated": 8.9,
            "completed": 6.1
        }];

        // Create axes
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());

        categoryAxis.dataFields.category = "month";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        // valueAxis.title.text = "Percentage";
        valueAxis.renderer.labels.template.adapter.add("text", function(text) {
            return text;
        });

        // Create series
        var series = chart.series.push(new am4charts.ColumnSeries3D());
        series.dataFields.valueY = "initiated";
        series.dataFields.categoryX = "month";
        series.name = "Initiated";
        series.clustered = false;
        series.columns.template.tooltipText = "Transferee Initiated Relocations in {month}: [bold]{valueY}[/]";
        series.columns.template.fillOpacity = 0.6;
        series.columns.template.fill = "#86c2dd";

        chart.properties.angle = 75.65;
        chart.properties.depth = 101;

        var series2 = chart.series.push(new am4charts.ColumnSeries3D());
        series2.dataFields.valueY = "completed";
        series2.dataFields.categoryX = "month";
        series2.name = "Completed";
        series2.clustered = false;
        series2.columns.template.tooltipText = "Transferee Initiated Relocations in {month}: [bold]{valueY}[/]";
        series2.columns.template.fill = "#FAD505";
        chart.legend = new am4charts.Legend();
        /* END Initiated & Completed Relocations by Month */

    });



    var chart = AmCharts.makeChart( "morris4", {
        "type": "funnel",
        "theme": "none",
        "dataProvider": [ {
            "title": "Active",
            "value": 1410
        }, {
            "title": "Cancelled",
            "value": 300
        }, {
            "title": "Complete",
            "value": 1125
        }, {
            "title": "Delete",
            "value": 152
        }, {
            "title": "On-Hold",
            "value": 128
        }, {
            "title": "Pending",
            "value": 342
        }, {
            "title": "Queued",
            "value": 26
        } ],
        "balloon": {
            "fixedPosition": true
        },
        "valueField": "value",
        "titleField": "title",
        "marginRight": 240,
        "marginLeft": 50,
        "startX": -500,
        "depth3D": 100,
        "angle": 40,
        "outlineAlpha": 1,
        "outlineColor": "#FFFFFF",
        "outlineThickness": 2,
        "labelPosition": "right",
        "balloonText": "[[title]]: [[value]]n[[description]]",
        "export": {
            "enabled": true
        }
    } );

    var dataVendorSummaryChart = [{
        "count": 5,
        "service_type": 1030,
        "service_name": "Car Transport"
    },
        {
            "count": 3,
            "service_type": 1031,
            "service_name": "Intl. Move Mgmt & St"
        },
        {
            "count": 26,
            "service_type": 269,
            "service_name": "Interim Housing"
        },
        {
            "count": 2226,
            "service_type": 315,
            "service_name": "Realtor - Broker"
        },
        {
            "count": 49,
            "service_type": 332,
            "service_name": "Van Lines"
        },
        {
            "count": 391,
            "service_type": 249,
            "service_name": "Closing"
        },
        {
            "count": 20,
            "service_type": 303,
            "service_name": "Lender"
        }];

    var chart = AmCharts.makeChart("morris6", {
        "type": "pie",
        "theme": "none",
        "innerRadius": "40%",
        "gradientRatio": [-0.4, -0.4, -0.4, -0.4, -0.4, -0.4, 0, 0.1, 0.2, 0.1, 0, -0.2, -0.5],
        "dataProvider": dataVendorSummaryChart,
        "balloonText": "[[value]]",
        "valueField": "count",
        "titleField": "service_name",
        "balloon": {
            "drop": true,
            "adjustBorderColor": false,
            "color": "#FFFFFF",
            "fontSize": 14
        },
        "export": {
            "enabled": true
        }
    });




    /* Demo Data -- DON'T INCLUDE IN YOUR PROJECT */
    var arr = [];
    for (var i = 0; i < 100; i++) {
        var name = Math.floor((Math.random() * 1000) + 1);
        arr.push(name);
    }
    /* Demo Data -- DON'T INCLUDE IN YOUR PROJECT */

    var colorRange = ['#ffe4a4','#ffc080','#ff9a5b','#ff6e35','#ff2300'];

    function scaleColor(value) {
        if (value < 200)
            return colorRange[0]
        if (value >= 200 && value < 400)
            return colorRange[1]
        if (value >= 400 && value < 600)
            return colorRange[2]
        if (value >= 600 && value < 800)
            return colorRange[3]
        if (value >= 800)
            return colorRange[4]
    }

    function LightenDarkenColor(col, amt) {

        var usePound = false;

        if (col[0] == "#") {
            col = col.slice(1);
            usePound = true;
        }

        var num = parseInt(col, 16);

        var r = (num >> 16) + amt;

        if (r > 255) r = 255;
        else if (r < 0) r = 0;

        var b = ((num >> 8) & 0x00FF) + amt;

        if (b > 255) b = 255;
        else if (b < 0) b = 0;

        var g = (num & 0x0000FF) + amt;

        if (g > 255) g = 255;
        else if (g < 0) g = 0;

        return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16);

    }


    var map = AmCharts.makeChart("destination-map", {
        "type": "map",
        "mouseWheelZoomEnabled": true,
        // "theme": "light",

        "imagesSettings": {
            "rollOverColor": "#089282",
            "rollOverScale": 3,
            "selectedScale": 3,
            "selectedColor": "#089282"
        },

        "areasSettings": {
            // "unlistedAreasColor": "#15A892"
            "unlistedAreasColor": "#8ddaef"
            // "unlistedAreasColor": "#e7e7e7"
        },

        "export": {
            "enabled": false
        },

        "legend": {
            "align": "right",
            "markerType": "square",
            "autoMargins": true,
            "maxColumns": 1,
            "width": "100",
            "fontSize": 10,
            "spacing": 0,
            "marginLeft": 5,
            "marginRight": 5,
            "marginTop": 20,
            "marginBottom": 20,
            "equalWidths": false,
            "backgroundAlpha": 0.5,
            "backgroundColor": "#ffffff",
            "borderColor": "#ffffff",
            "borderAlpha": 1,
            "top": 30,
            "right": 0,
            "horizontalGap": -5,
            "verticalGap": 5,
            "data": [{
                "title": "0 - 200",
                "color": colorRange[0]
            }, {
                "title": "200 - 400",
                "color": colorRange[1]
            }, {
                "title": "400 - 600",
                "color": colorRange[2]
            }, {
                "title": "600 - 800",
                "color": colorRange[3]
            },{
                "title": "800 - 1000",
                "color": colorRange[4]
            }]
        },

        "dataProvider": {
            "map": "usaLow",
            "images": [{
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "South Dakota (" + arr[0] + ")",
                "latitude": 80.8371,
                "longitude": 4.3676,
                "url": "http://www.google.com",
                "value": arr[0]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Kansas (" + arr[1] + ")",
                "latitude": 55.6763,
                "longitude": 12.5681,
                "url": "http://www.google.com",
                "value": arr[1]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Colorado (" + arr[2] + ")",
                "latitude": 54.1353,
                "longitude": -41.8952,
                "url": "http://www.google.com",
                "value": arr[2]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Missouri (" + arr[3] + ")",
                "latitude": 55.7558,
                "longitude": 37.6176,
                "url": "http://www.google.com",
                "value": arr[3]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Virginia (" + arr[4] + ")",
                "latitude": 49.9056,
                "longitude": 126.3958,
                "url": "http://www.google.com",
                "value": arr[4]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Kentucky (" + arr[5] + ")",
                "latitude": 15.6353,
                "longitude": 77.2250,
                "url": "http://www.google.com",
                "value": arr[5]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "North Carolina (" + arr[6] + ")",
                "latitude": 35.6785,
                "longitude": 139.6823,
                "url": "http://www.google.com",
                "value": arr[7]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "New Mexico (" + arr[8] + ")",
                "latitude": -15.7801,
                "longitude": -47.9292,
                "url": "http://www.google.com",
                "value": arr[8]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Utah (" + arr[9] + ")",
                "latitude": 45.4235,
                "longitude": -75.6979,
                "url": "http://www.google.com",
                "value": arr[9]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Arizona (" + arr[10] + ")",
                "latitude": 8.8921,
                "longitude": -77.0241,
                "url": "http://www.google.com",
                "value": arr[10]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Oklahoma (" + arr[11] + ")",
                "latitude": -4.3369,
                "longitude": 15.3271,
                "url": "http://www.google.com",
                "value": arr[12]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Arkansas (" + arr[13] + ")",
                "latitude": -25.7463,
                "longitude": 38.1876,
                "url": "http://www.google.com",
                "value": arr[13]
            }]

        }
    });

    // add events to recalculate map position when the map is moved or zoomed
    map.addListener("positionChanged", updateCustomMarkers);





    var map2 = AmCharts.makeChart("vmap", {
        "type": "map",
        "mouseWheelZoomEnabled": true,
        // "theme": "light",

        "imagesSettings": {
            "rollOverColor": "#089282",
            "rollOverScale": 3,
            "selectedScale": 3,
            "selectedColor": "#089282"
        },

        "areasSettings": {
            // "unlistedAreasColor": "#15A892"
            "unlistedAreasColor": "#8ddaef"
            // "unlistedAreasColor": "#e7e7e7"
        },

        "export": {
            "enabled": false
        },

        "legend": {
            "align": "right",
            "markerType": "square",
            "autoMargins": true,
            "maxColumns": 1,
            "width": "100",
            "fontSize": 10,
            "spacing": 0,
            "marginLeft": 5,
            "marginRight": 5,
            "marginTop": 7,
            "marginBottom": 7,
            "equalWidths": false,
            "backgroundAlpha": 0.5,
            "backgroundColor": "#ffffff",
            "borderColor": "#ffffff",
            "borderAlpha": 1,
            "top": 30,
            "right": 0,
            "horizontalGap": -5,
            "verticalGap": 5,
            "data": [{
                "title": "0 - 200",
                "color": colorRange[0]
            }, {
                "title": "200 - 400",
                "color": colorRange[1]
            }, {
                "title": "400 - 600",
                "color": colorRange[2]
            }, {
                "title": "600 - 800",
                "color": colorRange[3]
            },{
                "title": "800 - 1000",
                "color": colorRange[4]
            }]
        },

        "dataProvider": {
            "map": "worldLow",
            "images": [ {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Brussels (" + arr[0] + ")",
                "latitude": 50.8371,
                "longitude": 4.3676,
                "value": arr[0]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Copenhagen (" + arr[1] + ")",
                "latitude": 55.6763,
                "longitude": 12.5681,
                "value": arr[1]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Paris (" + arr[2] + ")",
                "latitude": 48.8567,
                "longitude": 2.3510,
                "value": arr[2]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Reykjavik (" + arr[3] + ")",
                "latitude": 64.1353,
                "longitude": -21.8952,
                "value": arr[3]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Moscow (" + arr[4] + ")",
                "latitude": 55.7558,
                "longitude": 37.6176,
                "value": arr[4]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Madrid (" + arr[5] + ")",
                "latitude": 40.4167,
                "longitude": -3.7033,
                "value": arr[5]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "London (" + arr[6] + ")",
                "latitude": 51.5002,
                "longitude": -0.1262,
                "url": "http://www.google.co.uk",
                "value": arr[6]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Peking (" + arr[7] + ")",
                "latitude": 39.9056,
                "longitude": 116.3958,
                "value": arr[7]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "New Delhi (" + arr[8] + ")",
                "latitude": 28.6353,
                "longitude": 77.2250,
                "value": arr[8]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Tokyo (" + arr[9] + ")",
                "latitude": 35.6785,
                "longitude": 139.6823,
                "url": "http://www.google.co.jp",
                "value": arr[9]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Ankara (" + arr[10] + ")",
                "latitude": 39.9439,
                "longitude": 32.8560,
                "value": arr[11]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Buenos Aires (" + arr[11] + ")",
                "latitude": -34.6118,
                "longitude": -58.4173,
                "value": arr[11]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Brasilia (" + arr[12] + ")",
                "latitude": -15.7801,
                "longitude": -47.9292,
                "value": arr[12]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Ottawa (" + arr[13] + ")",
                "latitude": 45.4235,
                "longitude": -75.6979,
                "value": arr[13]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Washington (" + arr[14] + ")",
                "latitude": 38.8921,
                "longitude": -77.0241,
                "value": arr[14]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Kinshasa (" + arr[15] + ")",
                "latitude": -4.3369,
                "longitude": 15.3271,
                "value": arr[15]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Cairo (" + arr[16] + ")",
                "latitude": 30.0571,
                "longitude": 31.2272,
                "value": arr[16]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Pretoria (" + arr[17] + ")",
                "latitude": -25.7463,
                "longitude": 28.1876,
                "value": arr[17]
            } ]

        }
    });

    // add events to recalculate map position when the map is moved or zoomed
    map2.addListener("positionChanged", updateCustomMarkers);



    var map3 = AmCharts.makeChart("vmap1", {
        "type": "map",
        "mouseWheelZoomEnabled": true,
        // "theme": "light",

        "imagesSettings": {
            "rollOverColor": "#089282",
            "rollOverScale": 3,
            "selectedScale": 3,
            "selectedColor": "#089282"
        },

        "areasSettings": {
            // "unlistedAreasColor": "#15A892"
            "unlistedAreasColor": "#8ddaef"
            // "unlistedAreasColor": "#e7e7e7"
        },

        "export": {
            "enabled": false
        },

        "legend": {
            "align": "right",
            "markerType": "square",
            "autoMargins": true,
            "maxColumns": 1,
            "width": "100",
            "fontSize": 10,
            "spacing": 0,
            "marginLeft": 5,
            "marginRight": 5,
            "marginTop": 7,
            "marginBottom": 7,
            "equalWidths": false,
            "backgroundAlpha": 0.5,
            "backgroundColor": "#ffffff",
            "borderColor": "#ffffff",
            "borderAlpha": 1,
            "top": 30,
            "right": 0,
            "horizontalGap": -5,
            "verticalGap": 5,
            "data": [{
                "title": "0 - 200",
                "color": colorRange[0]
            }, {
                "title": "200 - 400",
                "color": colorRange[1]
            }, {
                "title": "400 - 600",
                "color": colorRange[2]
            }, {
                "title": "600 - 800",
                "color": colorRange[3]
            },{
                "title": "800 - 1000",
                "color": colorRange[4]
            }]
        },

        "dataProvider": {
            "map": "worldLow",
            "images": [ {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Brussels (" + arr[0] + ")",
                "latitude": 50.8371,
                "longitude": 4.3676,
                "value": arr[0]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Copenhagen (" + arr[1] + ")",
                "latitude": 55.6763,
                "longitude": 12.5681,
                "value": arr[1]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Paris (" + arr[2] + ")",
                "latitude": 48.8567,
                "longitude": 2.3510,
                "value": arr[2]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Reykjavik (" + arr[3] + ")",
                "latitude": 64.1353,
                "longitude": -21.8952,
                "value": arr[3]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Moscow (" + arr[4] + ")",
                "latitude": 55.7558,
                "longitude": 37.6176,
                "value": arr[4]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Madrid (" + arr[5] + ")",
                "latitude": 40.4167,
                "longitude": -3.7033,
                "value": arr[5]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "London (" + arr[6] + ")",
                "latitude": 51.5002,
                "longitude": -0.1262,
                "url": "http://www.google.co.uk",
                "value": arr[6]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Peking (" + arr[7] + ")",
                "latitude": 39.9056,
                "longitude": 116.3958,
                "value": arr[7]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "New Delhi (" + arr[8] + ")",
                "latitude": 28.6353,
                "longitude": 77.2250,
                "value": arr[8]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Tokyo (" + arr[9] + ")",
                "latitude": 35.6785,
                "longitude": 139.6823,
                "url": "http://www.google.co.jp",
                "value": arr[9]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Ankara (" + arr[10] + ")",
                "latitude": 39.9439,
                "longitude": 32.8560,
                "value": arr[11]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Buenos Aires (" + arr[11] + ")",
                "latitude": -34.6118,
                "longitude": -58.4173,
                "value": arr[11]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Brasilia (" + arr[12] + ")",
                "latitude": -15.7801,
                "longitude": -47.9292,
                "value": arr[12]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Ottawa (" + arr[13] + ")",
                "latitude": 45.4235,
                "longitude": -75.6979,
                "value": arr[13]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Washington (" + arr[14] + ")",
                "latitude": 38.8921,
                "longitude": -77.0241,
                "value": arr[14]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Kinshasa (" + arr[15] + ")",
                "latitude": -4.3369,
                "longitude": 15.3271,
                "value": arr[15]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Cairo (" + arr[16] + ")",
                "latitude": 30.0571,
                "longitude": 31.2272,
                "value": arr[16]
            }, {
                "zoomLevel": 5,
                "scale": 0.5,
                "title": "Pretoria (" + arr[17] + ")",
                "latitude": -25.7463,
                "longitude": 28.1876,
                "value": arr[17]
            } ]

        }
    });

    // add events to recalculate map position when the map is moved or zoomed
    map3.addListener("positionChanged", updateCustomMarkers);





    // this function will take current images on the map and create HTML elements for them
    function updateCustomMarkers(event) {
        // get map object
        var map = event.chart;

        // go through all of the images
        for (var x in map.dataProvider.images) {
            // get MapImage object
            var image = map.dataProvider.images[x];

            // console.log(image);

            // check if it has corresponding HTML element
            if ('undefined' == typeof image.externalElement)
                image.externalElement = createCustomMarker(image);

            // reposition the element accoridng to coordinates
            var xy = map.coordinatesToStageXY(image.longitude, image.latitude);
            image.externalElement.style.top = xy.y + 'px';
            image.externalElement.style.left = xy.x + 'px';
        }
    }

    // this function creates and returns a new marker element
    function createCustomMarker(image) {
        // create holder
        var holder = document.createElement('div');
        holder.className = 'map-marker';
        holder.title = image.title;
        holder.style.position = 'absolute';

        // maybe add a link to it?
        if (undefined != image.url) {
            holder.onclick = function() {
                window.location.href = image.url;
            };
            holder.className += ' map-clickable';
        }

        // create dot
        var dot = document.createElement('div');
        dot.className = 'dot';
        holder.appendChild(dot);

        // create pulse
        var pulse = document.createElement('div');
        pulse.className = "pulse";
        holder.appendChild(pulse);

        // append the marker to the map container
        image.chart.chartDiv.appendChild(holder);

        // console.log(image.title);
        // add color marker
        $(holder).children('.pulse').css({
            border: "2px solid " + LightenDarkenColor(scaleColor(image.value), -20),
            backgroundColor: scaleColor(image.value)
        });

        $(holder).children('.dot').css({
            border: "10px solid " + LightenDarkenColor(scaleColor(image.value), -20),
        });

        $(holder).tooltip({});

        return holder;
    }

    // function createGlobeCustomMarker(image, element, chartObject, index) {
    // 	// create holder
    // 	var holder = document.createElement('div');
    // 	holder.className = 'map-marker';
    // 	holder.title = image.properties.name;
    // 	holder.style.position = 'absolute';

    // 	// maybe add a link to it?
    // 	if (undefined != image.url) {
    // 		holder.onclick = function() {
    // 			window.location.href = image.url;
    // 		};
    // 		holder.className += ' map-clickable';
    // 	}

    // 	// create dot
    // 	var dot = document.createElement('div');
    // 	dot.className = 'dot';
    // 	holder.appendChild(dot);
    // 	// create pulse
    // 	var pulse = document.createElement('div');
    // 	pulse.className = "pulse";
    // 	holder.appendChild(pulse);


    // 	// append the marker to the map container
    // 	var el = document.getElementById(element).appendChild(holder),
    // 		dot = el.children[0],
    // 		pulse = el.children[1];

    // 	// add color marker
    // 	// debugger;
    // 	pulse.style.border = "2px solid " + LightenDarkenColor(scaleColor(chartObject.legend.data[index].value), 20);
    // 	pulse.style.backgroundColor = scaleColor(chartObject.legend.data[index].value);

    // 	dot.style.border = "10px solid " + LightenDarkenColor(scaleColor(chartObject.legend.data[index].value), -20);


    // 	$(holder).tooltip({});

    // 	return holder;
    // }


</script>

</body>
</html>