@extends('system-mgmt.department.base')
@section('action-content')


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
    <style>
        .dt-head-left {text-align: left;}
    </style>
    <section class="content">
        <a class="btn btn-success" href="{{ route('department.create') }}" id="Create" title="Create A New Plan 2030 Pillar">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
        <body>
        <div class="container ">
            {{ csrf_field() }}
            <div class="table-responsive text-center">
                <table class="table table-borderless dt-head-left" id="table">
                    <thead class="dt-head-left">
                    <tr>
                        <th>ID</th>
                        <th>Pillar</th>
                        <th>Nigeria Operations</th>

                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    @foreach ($departments as $department)
                        <tr class="item{{$department->id}}">
                            <td>{{$department->id}}</td>
                            <td>{{$department->name}}</td>
                            <td>{{$department->division_name}}</td>



                            <td class="text-center">

                                <form class="row" method="POST" action="{{ route('department.destroy', ['id' => $department->id]) }}" onsubmit = "return confirm('Are you sure you want to delete this record?')">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                    <a  href="{{ route('department.edit', ['id' => $department->id]) }}"  title='Edit'>
                                        <span class='glyphicon glyphicon-edit'> </span>
                                    </a>



                                        | <button type="submit" title="Delete" class='glyphicon danger glyphicon-trash'>

                                        </button>


                                </form>
                            </td>




                        </tr>
                    @endforeach
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




    </section>
    <!-- /.content -->
  </div>
@endsection