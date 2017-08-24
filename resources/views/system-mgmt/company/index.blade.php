@extends('system-mgmt.company.base')
@section('action-content')
    <!-- Main content -->
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

        .dt-head-center {text-align: center;}
    </style>
    <section class="content">
        <a class="btn btn-success" href="{{ route('company.create') }}" id="Create" title="Create New Company">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
        <body>
        <div class="container ">
            {{ csrf_field() }}
            <div class="table-responsive text-center">
                <table class="table table-borderless dt-head-left" id="table">
                    <thead class="dt-right">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Company Name</th>
                        <th class="text-center">Company Code</th>
                        <th class="text-center">Purpose</th>
                        <th class="text-center">Period</th>


                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    @foreach ($companies as $company)
                        <tr class="item{{$company->id}}">
                            <td>{{$company->id}}</td>
                            <td>{{$company->company_name}}</td>
                            <td>{{$company->company_code}}</td>
                            <td>{{$company->purpose}}</td>
                            <td>{{$company->period}}</td>



                            <td class="text-center">

                            <form class="row" method="POST" action="{{ route('company.destroy', ['id' => $company->id]) }}" onsubmit = "return confirm('Are you sure you want to delete this record?')">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                    <a  href="{{ route('company.edit', ['id' => $company->id]) }}"  title='Edit'>
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

@endsection