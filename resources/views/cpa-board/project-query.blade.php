@extends('project.base-query')
@section('action-content')




    <section class="content">
        <body>

        <script src="//code.jquery.com/jquery-1.12.3.js"></script>
        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script
                src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet"
              href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <script
                src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        </head>
        {{--<style>--}}
        {{--.dt-head-left {text-align: left;}--}}
        {{--</style>--}}


        <style type="text/css">
            .webgrid-table {
            }

            .webgrid-table td, th {
                border: 1px solid #98BF21;
                padding: 3px 7px 2px;
            }

            .webgrid-header {
                background-color: #A7C942;
                color: #FFFFFF;
                padding-bottom: 4px;
                padding-top: 5px;
                text-align: left;
            }

            .webgrid-footer {
                text-align: left;
                align-content: flex-start;
            }

            .webgrid-row-style {
                padding: 3px 7px 2px;
            }

            .webgrid-alternating-row {
                background-color: #EAF2D3;
                padding: 3px 7px 2px;
            }
        </style>



        <style type="text/css">
            .name {
                width: 50px;
            }

            .address {
                width: 80px;
            }

            .webgrid-table {
            }

            .webgrid-table td, th {
                border: 1px solid #98BF21;
                padding: 3px 7px 2px;
            }

            .webgrid-header {
                background-color: #A7C942;
                color: #FFFFFF;
                padding-bottom: 4px;
                padding-top: 5px;
                text-align: left;
            }

            .webgrid-footer {
                text-align: left;
                align-content: flex-start;
            }

            .webgrid-row-style {
                padding: 3px 7px 2px;
            }

            .webgrid-alternating-row {
                background-color: #EAF2D3;
                padding: 3px 7px 2px;
            }
        </style>

        <script src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">

        <script type="text/javascript" src="//cdn.datatables.net/tabletools/2.2.1/js/dataTables.tableTools.min.js"></script>
        <link rel="stylesheet" href="//cdn.datatables.net/tabletools/2.2.1/css/dataTables.tableTools.css" />

        <link rel="stylesheet" href="//cdn.datatables.net/colvis/1.1.1/css/dataTables.colVis.css" />
        <script type="text/javascript" src="//cdn.datatables.net/colvis/1.1.1/js/dataTables.colVis.min.js"></script>

        <link rel="stylesheet" href="//cdn.datatables.net/1.9.4/css/jquery.dataTables.css" />
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" />

        <script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.13/filtering/row-based/range_dates.js"></script>

        <script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>




        <script type="text/javascript">
            $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    var min = parseInt($('#min').val(), 10);
                    var max = parseInt($('#max').val(), 10);
                    var year = parseFloat(data[5]) || 0; // use data for the age column

                    if ((isNaN(min) && isNaN(max)) ||
                        (isNaN(min) && year <= max) ||
                        (min <= year && isNaN(max)) ||
                        (min <= year && year <= max)) {
                        return true;
                    }
                    return false;
                }
            );

            $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    var mincost = parseInt($('#mincost').val(), 10);
                    var maxcost = parseInt($('#maxcost').val(), 10);
                    var cost = parseFloat(data[8]) || 0; // use data for the age column

                    if ((isNaN(mincost) && isNaN(maxcost)) ||
                        (isNaN(mincost) && cost <= maxcost) ||
                        (mincost <= cost && isNaN(maxcost)) ||
                        (mincost <= cost && cost <= maxcost)) {
                        return true;
                    }
                    return false;
                }
            );

            $(document).ready(function () {
                $('#example').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                    ],

                    pagingType: 'full_numbers',
                    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    scrollY: "500px"

                });

                $('input.global_filter').on('keyup click', function () {
                    filterGlobal();
                });

                $('input.column_filter').on('keyup click', function () {
                    filterColumn($(this).parents('tr').attr('data-column'));
                });


            });

            $(document).ready(function () {
                var table = $('#example').DataTable();

                // Event listener to the two range filtering inputs to redraw on input
                $('#min, #max').keyup(function () {
                    table.draw();
                });
            });

            $(document).ready(function () {
                var table = $('#example').DataTable();

                // Event listener to the two range filtering inputs to redraw on input
                $('#mincost, #maxcost').keyup(function () {
                    table.draw();
                });
            });


            $(document).ready(function () {
                var table = $('#example').DataTable();

                // Add event listeners to the two range filtering inputs
                $('#fini').keyup(function () { table.draw(); });
                $('#ffin').keyup(function () { table.draw(); });
            });

            $(document).ready(function () {

                // DataTable
                var dtable = $('#example').DataTable();

                $('.filter').on('keyup change', function () {
                    //clear global search values
                    dtable.search('');
                    dtable.column($(this).data('columnIndex')).search(this.value).draw();
                });

                $(".dataTables_filter input").on('keyup change', function () {
                    //clear column search values
                    dtable.columns().search('');
                    //clear input values
                    $('.filter').val('');
                });

                $(document).ready(function () {
                    var table = $('#example').DataTable();

                    $('#dropdown1').on('change', function () {
                        table.columns(1).search(this.value).draw();
                    });
                    $('#dropdown2').on('change', function () {
                        table.columns(2).search(this.value).draw();
                    });
                });


            });

        </script>

        <div class="container ">

            <form class='filter-form'>

                <table width="1077" border="0" class="well">
                    <tbody>
                    <tr>
                        <td width="46" height="34"><strong>ID:</strong></td>
                        <td width="49">
                            <strong>
                                <input type='text' value='' class='filter' data-column-index='0' size="6">
                            </strong>
                        </td>
                        <td width="174"><strong>Nigeria Operations:</strong></td>
                        <td width="181">
                            <strong>
                                <select id="NigeriaOperations" class='filter' data-column-index='1'>
                                    <option value=""></option>
                                    <option value="Ashaka">Ashaka</option>
                                    <option value="Atlas">Atlas</option>
                                    <option value="Ewekoro">Ewekoro</option>
                                    <option value="Mfamosing">Mfamosing </option>
                                    <option value="ReadyMix">ReadyMix</option>
                                    <option value="Sagamu">Sagamu</option>

                                </select>
                            </strong>
                        </td>
                        <td width="101"><strong>Pillar:</strong></td>
                        <td width="205">
                            <strong>
                                <select id="Pillar" class='filter' data-column-index='3'>
                                    <option value=""></option>
                                    <option value="Circular Economy">Circular Economy</option>
                                    <option value="Climate">Climate</option>
                                    <option value="People and Communities">People and Communities </option>
                                    <option value="Water and Nature">Water and Nature</option>
                                </select>
                            </strong>
                        </td>
                        <td width="51" rowspan="2"><strong>Year:</strong></td>
                        <td width="78">
                            <strong>
                                <input type="text" id="min" name="min" placeholder="From" size="6">
                            </strong>
                        </td>
                        <td width="39" rowspan="2"><strong>Cost:</strong></td>
                        <td width="111">
                            <strong>
                                <input type="text" id="mincost" name="mincost" placeholder="Min Cost" size="10">
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td height="39"><strong>State:</strong></td>
                        <td>
                            <strong>
                                <input type='text' class='filter' value='' size="6" data-column-index='7'>
                            </strong>
                        </td>
                        <td><strong>Project Title:</strong></td>
                        <td>
                            <strong>
                                <input type='text' value='' class='filter' data-column-index='2'>
                            </strong>
                        </td>
                        <td><strong>Community:</strong></td>
                        <td>
                            <strong>
                                <input type='text' value='' class='filter' data-column-index='6'>
                            </strong>
                        </td>
                        <td>
                            <strong>
                                <input type="text" id="max" name="max" placeholder="To" size="6">
                            </strong>
                        </td>
                        <td>
                            <strong>
                                <input type="text" id="maxcost" name="maxcost" placeholder="Max Cost" size="10">
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td height="36">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><strong>Targets:</strong></td>
                        <td colspan="3">
                            <strong>
                                <select id="Targets" class='filter' data-column-index='4'>
                                    <option value=""></option>
                                    <option value="Affordable Housing">Affordable Housing</option>
                                    <option value="Business Conduct">Business Conduct</option>
                                    <option value="Communities">Communities</option>
                                    <option value="CO2 Reduction: Customers">CO2 Reduction: Customers </option>
                                    <option value="CO2 Reduction: Supply Chain and Buildings">CO2 Reduction: Supply Chain and Buildings</option>
                                    <option value="Diversity">Diversity</option>

                                    <option value="Energy Use">Energy Use</option>
                                    <option value="Freshwater Withdrawal">Freshwater Withdrawal </option>
                                    <option value="Health & Safety">Health & Safety</option>
                                    <option value="Positive Change on Biodiversity">Positive Change on Biodiversity</option>

                                    <option value="Recycle Construction Waste">Recycle Construction Waste</option>
                                    <option value="Safe Water, Sanitation, and Hygiene">Safe Water, Sanitation, and Hygiene </option>

                                    <option value="Water Net-Positive">Water Net-Positive</option>

                                </select>
                            </strong>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    </tbody>
                </table>



            </form>


            {{ csrf_field() }}
            <div class="table-responsive text-center">
                {{--<table style="font-size: 13px;" class="table table-condensed table-striped table-hover"  id="example">--}}
                    <table id="example" class="display" cellspacing="0" width="100%">
                    <thead class="dt-head-left">
                    <tr>
                        <th>ID</th>
                        <th>Nigeria Operations</th>
                        <th>Project Title</th>
                        <th>Pillar</th>
                        <th>Target</th>
                        <th>Year</th>
                        <th>Community</th>
                        <th>State</th>
                        <th>Cost</th>
                    </tr>
                    </thead>
                    @foreach ($projects as $project)
                        <tr class="item{{$project->id}}">
                            <td>{{$project->id}}</td>
                            <td>{{$project->name}}</td>
                            <td>{{$project->title}}</td>
                            <td>{{$project->target_name}}</td>
                            <td>{{$project->pillar_name}}</td>
                            <td>{{$project->year}}</td>
                            <td>{{$project->community}}</td>
                            <td>{{$project->state}}</td>
                            <td>{{$project->cost}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        {{--<script>--}}
            {{--$(document).ready(function() {--}}
                {{--$('#example2').DataTable({--}}
                    {{--"order": [[ 0, "desc" ]],--}}
                    {{--"columnDefs": [--}}
                        {{--{ className: "text-left", "targets": [0,1,2,3,4,5,6,7,8]},--}}
                        {{--{ className: "text-nowrap", "targets": [0,1] }--}}
                    {{--]--}}
                {{--});--}}
            {{--} );--}}
        {{--</script>--}}

        </body>
    </section>
    <!-- /.content -->
    </div>




    </section>
    <!-- /.content -->
  </div>
@endsection