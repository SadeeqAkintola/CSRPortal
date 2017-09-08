@extends('layouts.app')

@section('content')
    {{--<h3 class="page-title">@lang('quickadmin.users.title')</h3>--}}


    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="page-title text-center">Report By Year</h4>

        </div>


    </div>

    {{--<h4>Report By Year</h4>--}}
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//code.highcharts.com/highcharts.js" type="text/javascript"></script>
    <script src="//code.highcharts.com/modules/exporting.js" type="text/javascript"></script>
    <script src="//code.highcharts.com/stock/modules/heatmap.js" type="text/javascript"></script>
    <script src="//code.highcharts.com/stock/modules/data.js" type="text/javascript"></script>


    <div id="container" style="width:1024px; min-width: 310px; height: 500px; margin: 0 auto"></div>




    <script type="text/javascript">
        $(function () {
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Total spends: year comparison',
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    categories: ['2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016'],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Total Cost spent on Projects (in NGN)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Naira</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: "Ashaka",
                    data: [0.000000000000, 90396053.000000000000, 144611378.000000000000, 152946000.000000000000, 118636000.000000000000, 93241723.000000000000, 113676785.490000000000, 145245420.270000000000, 180727086.000000000000, 184486091.000000000000, 135937284.760000000000, 365605136.000000000000, 164686144.020000000000]
                }, {
                    name: "Atlas",
                    data: [425000.000000000000, 0.000000000000, 425000.000000000000, 0.000000000000, 425000.000000000000, 425000.000000000000, 0.000000000000, 15000000.000000000000, 0.000000000000, 1400000.000000000000, 1616100.000000000000, 0.000000000000, 0.000000000000]
                }, {
                    name: "Ewekoro",
                    data: [0.000000000000, 0.000000000000, 37000000.000000000000, 37000000.000000000000, 40000000.000000000000, 63000000.000000000000, 73000000.000000000000, 113350000.000000000000, 88000000.000000000000, 100000000.000000000000, 108400000.000000000000, 125000000.000000000000, 228000000.000000000000]
                }, {
                    name: "Mfamosing ",
                    data: [0.000000000000, 0.000000000000, 0.000000000000, 0.000000000000, 0.000000000000, 138314285.720000000000, 111064285.720000000000, 258906400.550000000000, 120999950.720000000000, 400272877.610000000000, 187572514.250000000000, 113574785.720000000000, 195202193.420000000000]
                }, {
                    name: "Sagamu ",
                    data: [0.000000000000, 13500000.000000000000, 41442500.000000000000, 33200000.000000000000, 45850000.000000000000, 48995000.000000000000, 68610000.000000000000, 70350000.000000000000, 81000000.000000000000, 84600000.000000000000, 101750000.000000000000, 100000000.000000000000, 123810190.000000000000]
                }]
            });
        });
    </script>
@endsection