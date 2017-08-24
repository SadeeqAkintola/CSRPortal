
        @extends('layouts.app')
        @section('content')
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="page-title text-center">CPA Board Records</h4>

                </div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped {{ count($cpa_boards) > 0 ? 'datatable' : '' }} @can('user_delete')  @endcan">
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


            <script>
                $(document).ready(function() {
                    $('#table').DataTable();
                } );
            </script>

        </body>
    </section>
    <!-- /.content -->
    </div>

@endsection