
        @extends('layouts.app')
        @section('content')

            {{--<script src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.js"></script>--}}
            {{--<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">--}}
            {{--<link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.css">--}}
            {{--<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">--}}

            {{--<script type="text/javascript" src="//cdn.datatables.net/tabletools/2.2.1/js/dataTables.tableTools.min.js"></script>--}}
            {{--<link rel="stylesheet" href="//cdn.datatables.net/tabletools/2.2.1/css/dataTables.tableTools.css" />--}}

            {{--<link rel="stylesheet" href="//cdn.datatables.net/colvis/1.1.1/css/dataTables.colVis.css" />--}}
            {{--<script type="text/javascript" src="//cdn.datatables.net/colvis/1.1.1/js/dataTables.colVis.min.js"></script>--}}

            {{--<link rel="stylesheet" href="//cdn.datatables.net/1.9.4/css/jquery.dataTables.css" />--}}
            {{--<link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />--}}
            {{--<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" />--}}

            {{--<script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.13/filtering/row-based/range_dates.js"></script>--}}

            <script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
            <script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
            <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
            <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
            <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
            <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>



            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="page-title text-center">CPA Board Records</h4>
                    <legend>Search By: </legend>
                    <form class='filter-form'>
                        <table width="1056" border="0" class="well">
                            <tbody>
                            <tr>
                                <td width="95" height="34"><strong>Title:</strong></td>
                                <td width="196">
                                    <strong>
                                        <input type='text' value='' class='filter' data-column-index='0'>
                                    </strong>
                                </td>
                                <td width="18">&nbsp;</td>
                                <td width="126"><strong>Posted By:</strong></td>
                                <td width="219">
                                    <strong>
                                        <input type='text' value='' class='filter' data-column-index='4'>
                                    </strong>
                                </td>
                                <td width="18" rowspan="2">&nbsp;</td>
                                <td width="197"><strong>Posted Date/Time:</strong></td>
                                <td width="153">
                                    <strong>
                                        <input type='text' value='' class='filter' data-column-index='5'>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td height="39"><strong>Details:</strong></td>
                                <td>
                                    <strong>
                                        <input type='text' value='' class='filter' data-column-index='1'>
                                    </strong>
                                </td>
                                <td>&nbsp;</td>
                                <td><strong>Modified By:</strong></td>
                                <td>
                                    <strong>
                                        <input type='text' value='' class='filter' data-column-index='6'>
                                    </strong>
                                </td>
                                <td><strong>Modified Date/Time:</strong></td>
                                <td>
                                    <strong>
                                        <input type='text' value='' class='filter' data-column-index='7'>
                                    </strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </form>
                </div>

                <div class="panel-body table-responsive">
                    <table id="example" class="table table-bordered table-striped {{ count($cpa_boards) > 0 ? 'datatable' : '' }} @can('user_delete')  @endcan">
                        <thead>
                        <tr>

                            <th>Title</th>
                            <th>Details</th>
                            <th>Source</th>
                            <th>Comments</th>
                            <th>Posted By</th>
                            <th>Posted Date</th>
                            <th>Modified By</th>
                            <th>Modified Date</th>

                            <th class="text-center">  @can('user_create')
                                    <a class="btn btn-success" href="{{ route('cpa-board.create') }}" id="Create" title="Create A New CPA Board Record">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </a>
                                @endcan
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @if (count($cpa_boards) > 0)
                            @foreach ($cpa_boards as $cpa_board)
                                <tr class="item{{$cpa_board->id}}">

                                    <td>{{$cpa_board->title}}</td>
                                    <td>{{$cpa_board->details}}</td>
                                    <td>

                                        <a href="//{{$cpa_board->link1}}" target="_blank" class="label label-info pull-right">View Link</a>

                                        </td>
                                    <td>{{$cpa_board->link2}}</td>
                                    <td>{{$cpa_board->entered_by}}</td>
                                    <td>{{$cpa_board->created_at}}</td>
                                    <td>{{$cpa_board->modified_by}}</td>
                                    <td>{{$cpa_board->modified_date}}</td>



                                    <td class="text-center">

                                        <form class="row" method="POST" action="{{ route('cpa-board.destroy', ['id' => $cpa_board->id]) }}" onsubmit = "return confirm('Are you sure you want to delete this CPA Board record?')">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                            <a  href="{{ route('cpa-board.details', ['id' => $cpa_board->id]) }}"  title='Details'>
                                                <span class='glyphicon glyphicon-search'> </span>
                                            </a> |

                                            <a  href="{{ route('cpa-board.edit', ['id' => $cpa_board->id]) }}"  title='Edit'>
                                                <span class='glyphicon glyphicon-edit'> </span>
                                            </a>



                                            | <button type="submit" title="Delete" class='glyphicon danger glyphicon-trash'>

                                            </button>


                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>


            <script type="text/javascript">

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





                    $('input.global_filter').on('keyup click', function () {
                        filterGlobal();
                    });

                    $('input.column_filter').on('keyup click', function () {
                        filterColumn($(this).parents('tr').attr('data-column'));
                    });


                });



                $(document).ready(function () {
                    var table = $('#example').DataTable();

                    // Add event listeners to the two range filtering inputs
                    $('#fini').keyup(function () { table.draw(); });
                    $('#ffin').keyup(function () { table.draw(); });
                });





            </script>



            <script>

                $(document).ready(function() {
                    $('#example').DataTable();
                } );

            </script>

        </body>
    </section>
    <!-- /.content -->
    </div>

@endsection