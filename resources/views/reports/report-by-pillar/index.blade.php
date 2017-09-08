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

    {{--<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>--}}



    <div style="display:none">
    <table class="table table-borderless dt-head-left" id="datatable">
        <thead class="dt-right">
        <tr>
            <th class="text-center">Pillar</th>
            <th class="text-center">Total (N) Spent</th>

        </tr>
        </thead>
        @foreach ($pillarReportData as $pillarReport)
{{--            <tr class="item{{$pillarReport->pillar}}">--}}
                <td>{{$pillarReport->Pillar}}</td>
                <td>{{$pillarReport->TotalCost}}</td>

            </tr>
        @endforeach
    </table>
    </div>



    <script type="text/javascript">

        Highcharts.setOptions({
            lang: {
                decimalPoint: '.',
                thousandsSep: ', '
            }
        })

        $(function () {
            Highcharts.chart('container', {
                data: {
                    table: 'datatable'
                },
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Report By Pillar'
                },
                tooltip: {
                    valueDecimals: 2,
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>, NGN {point.y:,.2f}'

                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            formatter: function () { return '<b>' + this.point.name + '</b>: '  + this.percentage.toFixed(2) + ' %' + ', NGN ' + this.point.y },
                        },
                        showInLegend: true
                    }
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'Units'
                    }
                }
            });
        });
    </script>
@endsection