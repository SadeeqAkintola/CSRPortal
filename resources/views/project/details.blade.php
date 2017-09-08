@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Project Details</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST"  enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">



                        <div>

                            <hr />
                            <dl class="dl-horizontal">


                                <div >
                                    <label class="col-md-4 control-label">Project ID</label>
                                    <label class=" control-label" style="font-weight: 300">  {{ $project->id }}</label>
                                </div>


                                <div >
                                    <label class="col-md-4 control-label">Project Title</label>
                                    <label class=" control-label" style="font-weight: 300">  {{ $project->title }}</label>
                                </div>

                                <div>
                                    <label class="col-md-4 control-label">Nigeria Operations</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $selectedDivision }}</label>
                                </div>

                                <div>
                                    <label class="col-md-4 control-label">Plan 2030 Pillars</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $selectedPillar }}</label>
                                </div>


                                <div>
                                    <label class="col-md-4 control-label">Target</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $selectedTarget }}</label>
                                </div>






                                <div>
                                    <label class="col-md-4 control-label">Objective/Summary</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $project->objective }}</label>
                                </div>

                                <div>
                                    <label class="col-md-4 control-label">Initiative</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $selectedInitiative }}</label>
                                </div>

                                <div>
                                    <label class="col-md-4 control-label">Year</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $project->year }}</label>
                                </div>










                                <div>
                                    <label class="col-md-4 control-label">Community</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $project->community }}</label>
                                </div>

                                <div>
                                    <label class="col-md-4 control-label">Town</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $project->town }}</label>
                                </div>

                                <div>
                                    <label class="col-md-4 control-label">Local Govt. Area</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $project->lga }}</label>
                                </div>

                                <div>
                                    <label class="col-md-4 control-label">Project Cost</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $project->cost }}</label>
                                </div>

                                <div>
                                    <label class="col-md-4 control-label">Target/No. of Beneficiaries</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $project->target_summary }}</label>
                                </div>

                                <div>
                                    <label class="col-md-4 control-label">Address</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $project->address }}.</label>
                                </div>

                                <div>
                                    <label class="col-md-4 control-label">Street Name</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $project->street }}.</label>
                                </div>

                                <div>
                                    <label class="col-md-4 control-label">State</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $project->state }}.</label>
                                </div>

                                <div>
                                    <label class="col-md-4 control-label">Country</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $project->country }}.</label>

                                </div>

                                <div>
                                    <label class="col-md-4 control-label">Full Location</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $project->full_location }}.</label>
                                </div>

                                <div>
                                    <label class="col-md-4 control-label">Project Stage</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $project->project_stage }}.</label>
                                </div>

                                <div>
                                    <label class="col-md-4 control-label">Comments</label>
                                    <label class=" control-label" style="font-weight: 300">{{ $project->target_details }}.</label>
                                </div>

                                <div>
                                                                       .
                                </div>
                                <div class="row">
                                    <div class="col-xs-2"> </div>
                                    {{--<div class="col-xs-6">--}}
                                        {{--<table class="table table-bordered">--}}
                                            {{--<tr>--}}
                                                {{--<th>S/N</th>--}}
                                                {{--<th>Uploaded Document</th>--}}
                                                {{--<th>Action</th>--}}

                                            {{--</tr>--}}

                                            {{--@foreach ($project_files as $indexKey => $project_file)--}}
                                                {{--<tr>--}}
                                                    {{--<td>{{ $indexKey + 1 }}</td>--}}
                                                    {{--<td> <a target="_blank" class="title" href='{{ asset("FileStore/$project_file->file_name" ) }}'>{{ $project_file->file_name }}</a></td>--}}

                                                    {{--<td>--}}
                                                        {{--<button href="javascript:void(0);" data-id="@item.Id" type="submit" title="Delete File" class='deleteItem glyphicon danger glyphicon-trash'>--}}

                                                    {{--</button>--}}
                                                    {{--</td>--}}
                                                    {{--<td><a href="javascript:void(0);" data-id="@item.Id" class="deleteItem">X</a></td>--}}
                                                {{--</tr>--}}
                                            {{--@endforeach--}}

                                        {{--</table>--}}

                                    {{--</div>--}}


                                    <div class="row">
                                        <div class="col-xs-2"> </div>
                                        <div class="col-xs-6">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Uploaded Document</th>
                                                    <th>Action</th>

                                                </tr>

                                                @foreach ($project_files as $indexKey => $project_file)
                                                    <tr>
                                                        <td>{{ $indexKey + 1 }}</td>
                                                        <td> <a target="_blank" class="title" href='{{ asset("FileStore/$project_file->file_name" ) }}'>File {{  $indexKey + 1 }}</a></td>

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
                                </div>




                            </dl>
                        </div>






                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">

                                <a class="btn btn-danger" href="{{ url('project') }}"> << Back</a>
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
    function seoUrl($string) {
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
</script>

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
