@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new Goals</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('goal.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('goal_name') ? ' has-error' : '' }}">
                            <label for="goal_name" class="col-md-4 control-label">Goal Name</label>

                            <div class="col-md-6">
                                <input id="goal_name" type="text" class="form-control" name="goal_name" value="{{ old('goal_name') }}" required autofocus>

                                @if ($errors->has('goal_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('goal_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('goal_code') ? ' has-error' : '' }}">
                            <label for="goal_code" class="col-md-4 control-label">Goal Code</label>

                            <div class="col-md-6">
                                <input id="goal_code" type="text" class="form-control" name="goal_code" value="{{ old('goal_code') }}" required autofocus>

                                @if ($errors->has('target_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('target_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Target</label>

                            <div class="col-md-6">
                                <select class="form-control" name="target_id">
                                    @foreach ($targets as $target)
                                        <option value="{{$target->id}}">{{$target->target_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Target Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>

                                <a class="btn btn-danger" href="{{ url('system-management/goal') }}">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
