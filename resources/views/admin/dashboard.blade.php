<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/6 0006
 * Time: 19:00
 */?>
@extends('layouts.admin')
@section('content')
<script type="text/javascript">
    jQuery(document).ready(function($)
    {
        // Notifications
        setTimeout(function()
        {
            var opts = {
                "closeButton": true,
                "debug": false,
                "positionClass": "toast-top-right toast-default",
                "toastClass": "black",
                "onclick": null,
                "showDuration": "100",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            toastr.info("{{ Auth::user()->name }}", "欢迎回来", opts);
        }, 3000);

        // Charts
        var xenonPalette = ['#68b828','#7c38bc','#0e62c7','#fcd036','#4fcdfc','#00b19d','#ff6264','#f7aa47'];

        // Pageviews Visitors Chart
        var i = 0,
                line_chart_data_source = [
                    { id: ++i, part1: 4, part2: 2 },
                    { id: ++i, part1: 5, part2: 3 },
                    { id: ++i, part1: 5, part2: 3 },
                    { id: ++i, part1: 4, part2: 2 },
                    { id: ++i, part1: 3, part2: 1 },
                    { id: ++i, part1: 3, part2: 2 },
                    { id: ++i, part1: 5, part2: 3 },
                    { id: ++i, part1: 7, part2: 4 },
                    { id: ++i, part1: 9, part2: 5 },
                    { id: ++i, part1: 7, part2: 4 },
                    { id: ++i, part1: 7, part2: 3 },
                    { id: ++i, part1: 11, part2: 6 },
                    { id: ++i, part1: 10, part2: 8 },
                    { id: ++i, part1: 9, part2: 7 },
                    { id: ++i, part1: 8, part2: 7 },
                    { id: ++i, part1: 8, part2: 7 },
                    { id: ++i, part1: 8, part2: 7 },
                    { id: ++i, part1: 8, part2: 6 },
                    { id: ++i, part1: 15, part2: 5 },
                    { id: ++i, part1: 10, part2: 5 },
                    { id: ++i, part1: 9, part2: 6 },
                    { id: ++i, part1: 9, part2: 3 },
                    { id: ++i, part1: 8, part2: 5 },
                    { id: ++i, part1: 8, part2: 4 },
                    { id: ++i, part1: 9, part2: 5 },
                    { id: ++i, part1: 8, part2: 6 },
                    { id: ++i, part1: 8, part2: 5 },
                    { id: ++i, part1: 7, part2: 6 },
                    { id: ++i, part1: 7, part2: 5 },
                    { id: ++i, part1: 6, part2: 5 },
                    { id: ++i, part1: 7, part2: 6 },
                    { id: ++i, part1: 7, part2: 5 },
                    { id: ++i, part1: 8, part2: 5 },
                    { id: ++i, part1: 6, part2: 5 },
                    { id: ++i, part1: 5, part2: 4 },
                    { id: ++i, part1: 5, part2: 3 },
                    { id: ++i, part1: 6, part2: 3 },
                ];

        $("#pageviews-visitors-chart").dxChart({
            dataSource: line_chart_data_source,
            commonSeriesSettings: {
                argumentField: "id",
                point: { visible: true, size: 5, hoverStyle: {size: 7, border: 0, color: 'inherit'} },
                line: {width: 1, hoverStyle: {width: 1}}
            },
            series: [
                { valueField: "part1", name: "页面浏览量", color: "#68b828" },
                { valueField: "part2", name: "来访者", color: "#eeeeee" },
            ],
            legend: {
                position: 'inside',
                paddingLeftRight: 5
            },
            commonAxisSettings: {
                label: {
                    visible: false
                },
                grid: {
                    visible: true,
                    color: '#f9f9f9'
                }
            },
            valueAxis: {
                max: 25
            },
            argumentAxis: {
                valueMarginsEnabled: false
            },
        });



        // Server Uptime Chart
        var bar1_data_source = [
            { year: 1, 	europe: 10, americas: 0, africa: 5 },
            { year: 2, 	europe: 20, americas: 5, africa: 15 },
            { year: 3, 	europe: 30, americas: 10, africa: 15 },
            { year: 4, 	europe: 40, americas: 15, africa: 30 },
            { year: 5, 	europe: 30, americas: 10, africa: 20 },
            { year: 6, 	europe: 20, americas: 5,  africa: 10 },
            { year: 7, 	europe: 10, americas: 15, africa: 0 },
            { year: 8, 	europe: 20, americas: 25, africa: 8 },
            { year: 9, 	europe: 30, americas: 35, africa: 16 },
            { year: 10,	europe: 40, americas: 45, africa: 24 },
            { year: 11,	europe: 50, americas: 40, africa: 32 },
        ];

        $("#server-uptime-chart").dxChart({
            dataSource: [
                {id: ++i, 	sales: 1},
                {id: ++i, 	sales: 2},
                {id: ++i, 	sales: 3},
                {id: ++i, 	sales: 4},
                {id: ++i, 	sales: 5},
                {id: ++i, 	sales: 4},
                {id: ++i, 	sales: 5},
                {id: ++i, 	sales: 6},
                {id: ++i, 	sales: 7},
                {id: ++i, 	sales: 6},
                {id: ++i, 	sales: 5},
                {id: ++i, 	sales: 4},
                {id: ++i, 	sales: 5},
                {id: ++i, 	sales: 4},
                {id: ++i, 	sales: 4},
                {id: ++i, 	sales: 3},
                {id: ++i, 	sales: 4},
            ],

            series: {
                argumentField: "id",
                valueField: "sales",
                name: "Sales",
                type: "bar",
                color: '#7c38bc'
            },
            commonAxisSettings: {
                label: {
                    visible: false
                },
                grid: {
                    visible: false
                }
            },
            legend: {
                visible: false
            },
            argumentAxis: {
                valueMarginsEnabled: true
            },
            valueAxis: {
                max: 12
            },
            equalBarWidth: {
                width: 11
            }
        });



        // Average Sales Chart
        var doughnut1_data_source = [
            {region: "Asia", val: 4119626293},
            {region: "Africa", val: 1012956064},
            {region: "Northern America", val: 344124520},
            {region: "Latin America and the Caribbean", val: 590946440},
            {region: "Europe", val: 727082222},
            {region: "Oceania", val: 35104756},
            {region: "Oceania 1", val: 727082222},
            {region: "Oceania 3", val: 727082222},
            {region: "Oceania 4", val: 727082222},
            {region: "Oceania 5", val: 727082222},
        ], timer;

        $("#sales-avg-chart div").dxPieChart({
            dataSource: doughnut1_data_source,
            tooltip: {
                enabled: false,
                format:"millions",
                customizeText: function() {
                    return this.argumentText + "<br/>" + this.valueText;
                }
            },
            size: {
                height: 90
            },
            legend: {
                visible: false
            },
            series: [{
                type: "doughnut",
                argumentField: "region"
            }],
            palette: ['#5e9b4c', '#6ca959', '#b9f5a6'],
        });



        // Pageview Stats
        $('#pageviews-stats').dxBarGauge({
            startValue: -50,
            endValue: 50,
            baseValue: 0,
            values: [-21.3, 14.8, -30.9, 45.2],
            label: {
                customizeText: function (arg) {
                    return arg.valueText + '%';
                }
            },
            //palette: 'ocean',
            palette: ['#68b828','#7c38bc','#0e62c7','#fcd036','#4fcdfc','#00b19d','#ff6264','#f7aa47'],
            margin : {
                top: 0
            }
        });

        var firstMonth = {
                    dataSource: getFirstMonthViews(),
                    argumentField: 'month',
                    valueField: '2014',
                    type: 'area',
                    showMinMax: true,
                    lineColor: '#68b828',
                    minColor: '#68b828',
                    maxColor: '#7c38bc',
                    showFirstLast: false,
                },
                secondMonth = {
                    dataSource: getSecondMonthViews(),
                    argumentField: 'month',
                    valueField: '2014',
                    type: 'splinearea',
                    lineColor: '#68b828',
                    minColor: '#68b828',
                    maxColor: '#7c38bc',
                    pointSize: 6,
                    showMinMax: true,
                    showFirstLast: false
                },
                thirdMonth = {
                    dataSource: getThirdMonthViews(),
                    argumentField: 'month',
                    valueField: '2014',
                    type: 'splinearea',
                    lineColor: '#68b828',
                    minColor: '#68b828',
                    maxColor: '#7c38bc',
                    pointSize: 6,
                    showMinMax: true,
                    showFirstLast: false
                };

        function getFirstMonthViews() {
            return [{ month: 1, 2014: 7341 },
                { month: 2, 2014: 7016 },
                { month: 3, 2014: 7202 },
                { month: 4, 2014: 7851 },
                { month: 5, 2014: 7481 },
                { month: 6, 2014: 6532 },
                { month: 7, 2014: 6498 },
                { month: 8, 2014: 7191 },
                { month: 9, 2014: 7596 },
                { month: 10, 2014: 8057 },
                { month: 11, 2014: 8373 },
                { month: 12, 2014: 8636 }];
        };

        function getSecondMonthViews() {
            return [{ month: 1, 2014: 189742 },
                { month: 2, 2014: 181623 },
                { month: 3, 2014: 205351 },
                { month: 4, 2014: 245625 },
                { month: 5, 2014: 261319 },
                { month: 6, 2014: 192786 },
                { month: 7, 2014: 194752 },
                { month: 8, 2014: 207017 },
                { month: 9, 2014: 212665 },
                { month: 10, 2014: 233580 },
                { month: 11, 2014: 231503 },
                { month: 12, 2014: 232824 }];
        };

        function getThirdMonthViews() {
            return [{ month: 1, 2014: 398},
                { month: 2, 2014: 422},
                { month: 3, 2014: 431},
                { month: 4, 2014: 481},
                { month: 5, 2014: 551},
                { month: 6, 2014: 449},
                { month: 7, 2014: 442},
                { month: 8, 2014: 482},
                { month: 9, 2014: 517},
                { month: 10, 2014: 566},
                { month: 11, 2014: 630},
                { month: 12, 2014: 737}];
        };


        $('.first-month').dxSparkline(firstMonth);
        $('.second-month').dxSparkline(secondMonth);
        $('.third-month').dxSparkline(thirdMonth);


        // Realtime Network Stats
        var i = 0,
                rns_values = [130,150],
                rns2_values = [39,50],
                realtime_network_stats = [];

        for(i=0; i<=100; i++)
        {
            realtime_network_stats.push({ id: i, x1: between(rns_values[0], rns_values[1]), x2: between(rns2_values[0], rns2_values[1])});
        }

        $("#realtime-network-stats").dxChart({
            dataSource: realtime_network_stats,
            commonSeriesSettings: {
                type: "area",
                argumentField: "id"
            },
            series: [
                { valueField: "x1", name: "Packets Sent", color: '#7c38bc', opacity: .4 },
                { valueField: "x2", name: "Packets Received", color: '#000', opacity: .5},
            ],
            legend: {
                verticalAlignment: "bottom",
                horizontalAlignment: "center"
            },
            commonAxisSettings: {
                label: {
                    visible: false
                },
                grid: {
                    visible: true,
                    color: '#f5f5f5'
                }
            },
            legend: {
                visible: false
            },
            argumentAxis: {
                valueMarginsEnabled: false
            },
            valueAxis: {
                max: 500
            },
            animation: {
                enabled: false
            }
        }).data('iCount', i);

        $('#network-realtime-gauge').dxCircularGauge({
            scale: {
                startValue: 0,
                endValue: 200,
                majorTick: {
                    tickInterval: 50
                }
            },
            rangeContainer: {
                palette: 'pastel',
                width: 3,
                ranges: [
                    { startValue: 0, endValue: 50, color: "#7c38bc" },
                    { startValue: 50, endValue: 100, color: "#7c38bc" },
                    { startValue: 100, endValue: 150, color: "#7c38bc" },
                    { startValue: 150, endValue: 200, color: "#7c38bc" },
                ],
            },
            value: 140,
            valueIndicator: {
                offset: 10,
                color: '#7c38bc',
                type: 'triangleNeedle',
                spindleSize: 12
            }
        });

        setInterval(function(){  networkRealtimeChartTick(rns_values, rns2_values); }, 1000);
        setInterval(function(){ networkRealtimeGaugeTick(); }, 2000);
        setInterval(function(){ networkRealtimeMBupdate(); }, 3000);



        // CPU Usage Gauge
        $("#cpu-usage-gauge").dxCircularGauge({
            scale: {
                startValue: 0,
                endValue: 100,
                majorTick: {
                    tickInterval: 25
                }
            },
            rangeContainer: {
                palette: 'pastel',
                width: 3,
                ranges: [
                    { startValue: 0, endValue: 25, color: "#68b828" },
                    { startValue: 25, endValue: 50, color: "#68b828" },
                    { startValue: 50, endValue: 75, color: "#68b828" },
                    { startValue: 75, endValue: 100, color: "#d5080f" },
                ],
            },
            value: between(30, 90),
            valueIndicator: {
                offset: 10,
                color: '#68b828',
                type: 'rectangleNeedle',
                spindleSize: 12
            }
        });


        // Resize charts
        $(window).on('xenon.resize', function()
        {
            $("#pageviews-visitors-chart").data("dxChart").render();
            $("#server-uptime-chart").data("dxChart").render();
            $("#realtime-network-stats").data("dxChart").render();

            $('.first-month').data("dxSparkline").render();
            $('.second-month').data("dxSparkline").render();
            $('.third-month').data("dxSparkline").render();
        });

    });

    function networkRealtimeChartTick(min_max, min_max2)
    {
        var $ = jQuery,
                i = 0;

        var chart_data = $('#realtime-network-stats').dxChart('instance').option('dataSource');

        var count = $('#realtime-network-stats').data('iCount');

        $('#realtime-network-stats').data('iCount', count + 1);

        chart_data.shift();
        chart_data.push({id: count + 1, x1: between(min_max[0],min_max[1]), x2: between(min_max2[0],min_max2[1])});

        $('#realtime-network-stats').dxChart('instance').option('dataSource', chart_data);
    }

    function networkRealtimeGaugeTick()
    {
        var nr_gauge = jQuery('#network-realtime-gauge').dxCircularGauge('instance');

        nr_gauge.value( between(50,200) );
    }

    function networkRealtimeMBupdate()
    {
        var $el = jQuery("#network-mbs-packets"),
                options = {
                    useEasing : true,
                    useGrouping : true,
                    separator : ',',
                    decimal : '.',
                    prefix : '' ,
                    suffix : 'mb/s'
                },
                cntr = new countUp($el[0], parseFloat($el.text().replace('mb/s')), parseFloat(between(10,25) + 1/between(15,30)), 2, 1.5, options);

        cntr.start();
    }

    function between(randNumMin, randNumMax)
    {
        var randInt = Math.floor((Math.random() * ((randNumMax + 1) - randNumMin)) + randNumMin);

        return randInt;
    }
</script>

<div class="row">
    <div class="col-sm-12">

        <div class="xe-widget xe-counter" data-count=".num" data-from="0" data-to="{{ $post_count }}" data-suffix="篇" data-duration="2">
            <div class="xe-icon">
                <i class="linecons-cloud"></i>
            </div>
            <div class="xe-label">
                <strong class="num">0篇</strong>
                <span>文章总数</span>
            </div>
        </div>

        <div class="xe-widget xe-counter xe-counter-purple" data-count=".num" data-from="1" data-to="{{ $user_count }}" data-suffix="名" data-duration="3" data-easing="false">
            <div class="xe-icon">
                <i class="linecons-user"></i>
            </div>
            <div class="xe-label">
                <strong class="num">1名</strong>
                <span>用户数量</span>
            </div>
        </div>

        <div class="xe-widget xe-counter xe-counter-info" data-count=".num" data-from="1" data-to="{{ $photography_count }}" data-duration="4" data-easing="true">
            <div class="xe-icon">
                <i class="linecons-camera"></i>
            </div>
            <div class="xe-label">
                <strong class="num">0</strong>
                <span>摄影图片数量</span>
            </div>
        </div>

    </div>
</div>






@endsection

@section('js')

<div class="page-loading-overlay">
    <div class="loader-2"></div>
</div>

<!-- Imported scripts on this page -->
<script src="{{ asset('assets/js/xenon-widgets.js') }}"></script>
<script src="{{ asset('assets/js/devexpress-web-14.1/js/globalize.min.js') }}"></script>
<script src="{{ asset('assets/js/devexpress-web-14.1/js/dx.chartjs.js') }}"></script>
<script src="{{ asset('assets/js/toastr/toastr.min.js') }}"></script>
@endsection