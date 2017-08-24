@extends('layouts.app')
@section('content')




        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="page-title text-center">Goals Setup</h4>

            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped {{ count($goals) > 0 ? 'datatable' : '' }} @can('user_delete')  @endcan">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Goal Name</th>
                        <th>Goal Code</th>
                        <th>Target</th>
                        <th>Description</th>
                        <th class="text-center">  @can('user_create')
                                <a class="btn btn-success" href="{{ route('goal.create') }}" id="Create" title="Create A New Goal">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>
                            @endcan
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @if (count($goals) > 0)
                        @foreach ($goals as $goal)
                            <tr class="item{{$goal->id}}">
                                <td>{{$goal->id}}</td>
                                <td>{{$goal->goal_name}}</td>
                                <td>{{$goal->goal_code}}</td>
                                <td>{{$goal->target_name}}</td>
                                <td>{{$goal->description}}</td>



                                <td class="text-center">

                                    <form class="row" method="POST" action="{{ route('goal.destroy', ['id' => $goal->id]) }}" onsubmit = "return confirm('Are you sure you want to delete this record?')">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                        <a  href="{{ route('goal.edit', ['id' => $goal->id]) }}"  title='Edit'>
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