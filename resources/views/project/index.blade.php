
        @extends('layouts.app')
        @section('content')
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="page-title text-center">List of Projects</h4>

                </div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped {{ count($projects) > 0 ? 'datatable' : '' }} @can('user_delete')  @endcan">
                        <thead>
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

                            <th class="text-center">  @can('user_create')
                                    <a class="btn btn-success" href="{{ route('project.create') }}" id="Create" title="Create A New Project">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </a>
                                @endcan
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @if (count($projects) > 0)
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



                                    <td class="text-center">

                                        <form class="row" method="POST" action="{{ route('project.destroy', ['id' => $project->id]) }}" onsubmit = "return confirm('Are you sure you want to delete this Project record?')">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                            <a  href="{{ route('project.details', ['id' => $project->id]) }}"  title='Details'>
                                                <span class='glyphicon glyphicon-search'> </span>
                                            </a> |

                                            <a  href="{{ route('project.edit', ['id' => $project->id]) }}"  title='Edit'>
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