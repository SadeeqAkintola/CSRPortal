@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">CPA Board Record Details</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST"  enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">



                        <div>

                            <hr />
                            <dl class="dl-horizontal">


                                <div >
                                    <label class="col-md-4 control-label"> Title</label>
                                    <label class=" control-label" style="font-weight: 300">  {{ $cpa_board->title }}</label>
                                </div>


                                <div >
                                    <label class="col-md-4 control-label"> Details</label>
                                    <label class=" control-label" style="font-weight: 300">  {{ $cpa_board->details }}</label>
                                </div>

                                <div >
                                    <label class="col-md-4 control-label">Source</label>

                                    <label class=" control-label" style="font-weight: 300">  <a href="//{{$cpa_board->link1}}" target="_blank" class="label label-info pull-right">{{ $cpa_board->link1 }}</a> </label>

                                    {{--<label class=" control-label" style="font-weight: 300">  {{ $cpa_board->link1 }}</label>--}}
                                </div>

                                <div >
                                    <label class="col-md-4 control-label"> Comments</label>
                                    <label class=" control-label" style="font-weight: 300">  {{ $cpa_board->link2 }}</label>
                                </div>

                                <div >
                                    <label class="col-md-4 control-label"> Posted By</label>
                                    <label class=" control-label" style="font-weight: 300">  {{ $entered_By }}</label>
                                </div>



                                <div >
                                    <label class="col-md-4 control-label"> Posted Date</label>
                                    <label class=" control-label" style="font-weight: 300">  {{ $cpa_board->created_at }}</label>
                                </div>


                                <div >
                                    <label class="col-md-4 control-label"> Modified By</label>
                                    <label class=" control-label" style="font-weight: 300">  {{ $modified_By }}</label>
                                </div>


                                <div >
                                    <label class="col-md-4 control-label"> Modified Date</label>
                                    <label class=" control-label" style="font-weight: 300">  {{ $cpa_board->modified_date }}</label>
                                </div>

                                <div >
                                    <label class="col-md-4 control-label"> </label>
                                    <label class=" control-label" style="font-weight: 300"> </label>
                                </div>

                                <div class="row">
                                        <div class="col-xs-2"> </div>
                                        <div class="col-xs-6">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Uploaded Document</th>
                                                    <th>Action</th>

                                                </tr>

                                                @foreach ($cpa_board_files as $indexKey => $cpa_board_file)
                                                    <tr>
                                                        <td>{{ $indexKey + 1 }}</td>
                                                        <td> <a target="_blank" class="title" href='{{ asset("CPAFileStore/$cpa_board_file->file_name" ) }}'>File {{  $indexKey + 1 }}</a></td>

                                                        <td>
                                                            <button href="javascript:void(0);" data-id="@item.Id" type="submit" title="Delete File" class='deleteItem glyphicon danger glyphicon-trash'>

                                                            </button>
                                                        </td>
                                                        {{--<td><a href="javascript:void(0);" data-id="@item.Id" class="deleteItem">X</a></td>--}}
                                                    </tr>
                                                @endforeach

                                            </table>

                                        </div>
                                    </div>



                            </dl>
                        </div>






                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">

                                <a class="btn btn-danger" href="{{ url('cpa-board') }}"> << Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script
        src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet"
      href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.6/jquery.validate.unobtrusive.min.js"></script>

<script>
    $('.deleteItem').click(function (e) {
        e.preventDefault();
        var $ctrl = $(this);
        if (confirm('Do you really want to delete this file?')) {
            $.ajax({
                url: '@Url.Action("DeleteFile")',
                type: 'POST',
                data: { id: $(this).data('id') }
            }).done(function (data) {
                if (data.Result == "OK") {
                    $ctrl.closest('li').remove();
                }
                else if (data.Result.Message) {
                    alert(data.Result.Message);
                }
            }).fail(function () {
                alert("There is something wrong. Please try again.");
            })

        }
    });
</script>
@endsection
