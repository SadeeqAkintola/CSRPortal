@extends('layouts.app')

@section('content')
    {{--<h3 class="page-title">@lang('quickadmin.users.title')</h3>--}}


    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="page-title text-center">Plan 2030 Pillar List</h4>

        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($pillars) > 0 ? 'datatable' : '' }} @can('user_delete')  @endcan">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Pillar Name</th>
                    <th>Pillar Code</th>
                    <th>Description</th>
                    <th class="text-center">  @can('user_create')
                            <a class="btn btn-success" href="{{ route('pillar.create') }}" id="Create" title="Create A New Pillar">
                                <span class="glyphicon glyphicon-plus"></span>
                            </a>
                        @endcan
                    </th>
                </tr>
                </thead>

                <tbody>
                @if (count($pillars) > 0)
                    @foreach ($pillars as $pillar)
                        <tr class="item{{$pillar->id}}">
                            <td>{{$pillar->id}}</td>
                            <td>{{$pillar->pillar_name}}</td>
                            <td>{{$pillar->pillar_code}}</td>
                            <td>{{$pillar->description}}</td>



                            <td class="text-center">

                                <form class="row" method="POST" action="{{ route('pillar.destroy', ['id' => $pillar->id]) }}" onsubmit = "return confirm('Are you sure you want to delete this record?')">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                    <a  href="{{ route('pillar.edit', ['id' => $pillar->id]) }}"  title='Edit'>
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