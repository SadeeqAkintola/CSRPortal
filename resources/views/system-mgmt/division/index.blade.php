@extends('layouts.app')
@section('content')

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="page-title text-center">Nigeria Operations Setup</h4>

            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped {{ count($divisions) > 0 ? 'datatable' : '' }} @can('user_delete')  @endcan">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Operations Name</th>
                        <th>Company Name</th>
                        <th class="text-center">  @can('user_create')
                                <a class="btn btn-success" href="{{ route('division.create') }}" id="Create" title="Create A New Nigeria Operations">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>
                            @endcan
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @if (count($divisions) > 0)
                        @foreach ($divisions as $division)
                            <tr class="item{{$division->id}}">
                                <td>{{$division->id}}</td>
                                <td>{{$division->name}}</td>
                                <td>{{$division->company_name}}</td>



                                <td class="text-center">

                                    <form class="row" method="POST" action="{{ route('division.destroy', ['id' => $division->id]) }}" onsubmit = "return confirm('Are you sure you want to delete this record?')">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                        <a  href="{{ route('division.edit', ['id' => $division->id]) }}"  title='Edit'>
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