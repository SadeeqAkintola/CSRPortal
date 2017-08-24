@extends('layouts.app')
@section('content')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="page-title text-center">Targets Setup</h4>

            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped {{ count($targets) > 0 ? 'datatable' : '' }} @can('user_delete')  @endcan">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Target Name</th>
                        <th>Target Code</th>
                        <th>Plan 2030 Pillar</th>
                        <th>Description</th>
                        <th class="text-center">  @can('user_create')
                                <a class="btn btn-success" href="{{ route('target.create') }}" id="Create" title="Create A New Target">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>
                            @endcan
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @if (count($targets) > 0)
                        @foreach ($targets as $target)
                            <tr class="item{{$target->id}}">
                                <td>{{$target->id}}</td>
                                <td>{{$target->target_name}}</td>
                                <td>{{$target->target_code}}</td>
                                <td>{{$target->pillar_name}}</td>
                                <td>{{$target->description}}</td>



                                <td class="text-center">

                                    <form class="row" method="POST" action="{{ route('target.destroy', ['id' => $target->id]) }}" onsubmit = "return confirm('Are you sure you want to delete this record?')">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                        <a  href="{{ route('target.edit', ['id' => $target->id]) }}"  title='Edit'>
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