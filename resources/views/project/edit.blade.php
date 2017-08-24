@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Project</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('project.update', ['id' => $project->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">




                            <div class="form-group">
                                <label class="col-md-4 control-label">Company *</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="company_id" readonly="readonly">
                                        @foreach ($companies as $company)
                                            <option value="{{$company->id}} {{ $selectedCompany == $company->id ? 'selected="selected"' : ''}}">{{$company->company_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Nigeria Operations *</label>

                            <div class="col-md-6">
                                <select class="form-control" name="division_id">
                                    @foreach ($divisions as $division)
                                        <option value="{{$division->id}}"
                                            {{ $selectedDivision == $division->id ? 'selected="selected"' : ''}}>
                                            {{$division->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Project Title *</label>

                            <div class="col-md-6">
                                <textarea id="title" type="text" class="form-control" name="title" required>{{ $project->title }}</textarea>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Plan 2030 Pillar *</label>

                            <div class="col-md-6">
                                <select class="form-control" name="pillar_id">
                                    @foreach ($pillars as $pillar)
                                        <option value="{{$pillar->id}}"
                                                {{ $selectedPillar == $pillar->id ? 'selected="selected"' : ''}}>
                                            {{$pillar->pillar_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Target *</label>

                            <div class="col-md-6">
                                <select class="form-control" name="target_id">
                                    @foreach ($targets as $target)
                                        <option value="{{$target->id}}"
                                        {{ $selectedTarget == $target->id ? 'selected="selected"' : ''}}>{{$target->target_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>





                        <div class="form-group{{ $errors->has('objective') ? ' has-error' : '' }}">
                            <label for="objective" class="col-md-4 control-label">Objective/Summary</label>

                            <div class="col-md-6">
                                <textarea id="objective" type="text" class="form-control" name="objective">{{ $project->objective }}</textarea>


                                @if ($errors->has('objective'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('objective') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-4 control-label">Initiative *</label>

                            <div class="col-md-6">
                                <select class="form-control" name="initiative_id">
                                    @foreach ($initiatives as $initiative)
                                        <option value="{{$initiative->id}}" {{ $selectedInitiative == $initiative->id ? 'selected="selected"' : ''}}>{{$initiative->initiative_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year" class="col-md-4 control-label">Year *</label>

                            <div class="col-md-6">
                                <input id="year" type="number" class="form-control" name="year" value="{{ $project->year }}" required autofocus>

                                @if ($errors->has('year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group{{ $errors->has('community') ? ' has-error' : '' }}">
                            <label for="community" class="col-md-4 control-label">Community *</label>

                            <div class="col-md-6">
                                <input id="community" type="text" class="form-control" name="community" value="{{ $project->community }}" required autofocus>

                                @if ($errors->has('community'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('community') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
                            <label for="town" class="col-md-4 control-label">Town *</label>

                            <div class="col-md-6">
                                <input id="town" type="text" class="form-control" name="town" value="{{ $project->town }}" required autofocus>

                                @if ($errors->has('town'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('lga') ? ' has-error' : '' }}">
                            <label for="lga" class="col-md-4 control-label">Local Govt. Area  *</label>

                            <div class="col-md-6">
                                <input id="lga" type="text" class="form-control" name="lga" value="{{ $project->lga }}" required autofocus>

                                @if ($errors->has('lga'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lga') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                            <label for="cost" class="col-md-4 control-label">Project Cost *</label>

                            <div class="col-md-6">
                                <input id="cost" type="number" class="form-control" name="cost" value="{{ $project->cost }}" required autofocus>

                                @if ($errors->has('cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('target_summary') ? ' has-error' : '' }}">
                            <label for="target_summary" class="col-md-4 control-label">Target/No. of Beneficiaries</label>

                            <div class="col-md-6">
                                <input id="target_summary" type="text" class="form-control" name="target_summary" value="{{ $project->target_summary }}">

                                @if ($errors->has('target_summary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('target_summary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>








                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea id="address" type="text" class="form-control" name="address">{{ $project->address }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                            <label for="street" class="col-md-4 control-label">Street Name</label>

                            <div class="col-md-6">
                                <input id="street" type="text" class="form-control" name="street" value="{{ $project->street }}">

                                @if ($errors->has('street'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>






                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">State</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state" value="{{ $project->state }}">

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-4 control-label">Country</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}">

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group{{ $errors->has('full_location') ? ' has-error' : '' }}">
                            <label for="full_location" class="col-md-4 control-label">Full Location</label>

                            <div class="col-md-6">
                                <input id="full_location" type="text" class="form-control" name="full_location" value="{{ $project->full_location }}">

                                @if ($errors->has('full_location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('full_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('project_stage') ? ' has-error' : '' }}">
                            <label for="project_stage" class="col-md-4 control-label">Project Stage</label>

                            <div class="col-md-6">
                                <input id="project_stage" type="text" class="form-control" name="project_stage" value="{{ $project->project_stage }}">

                                @if ($errors->has('project_stage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('project_stage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Current Status</label>

                            <div class="col-md-6">
                                <input id="status" type="text" class="form-control" name="status" value="{{ $project->status }}">

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('target_details') ? ' has-error' : '' }}">
                            <label for="target_details" class="col-md-4 control-label">Comments</label>

                            <div class="col-md-6">
                                <textarea id="target_details" type="text" class="form-control" name="target_details">{{ $project->target_details }}</textarea>
                                @if ($errors->has('target_details'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('target_details') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="target_details" class="col-md-4 control-label">Upload Documents</label>

                            <div class="col-md-6">
                                <input class="form-control" type="file" name="p_files[]" multiple />

                            </div>
                        </div>

                        <div>
                            .
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


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>

                                <a class="btn btn-danger" href="{{ url('project') }}">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
