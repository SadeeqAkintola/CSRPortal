@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Goal</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('goal.update', ['id' => $goal->id]) }}">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group{{ $errors->has('goal_name') ? ' has-error' : '' }}">
                                <label for="goal_name" class="col-md-4 control-label">Goal Name</label>


                                <div class="col-md-6">
                                <input id="goal_name" type="text" class="form-control" name="goal_name" value="{{ $goal->goal_name }}" required autofocus>

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
                                <input readonly="readonly" disabled="disabled" id="goal_code" type="text" class="form-control" name="goal_code" value="{{ $goal->goal_code }}" required autofocus>

                                @if ($errors->has('goal_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('goal_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Target</label>

                            <div class="col-md-6">
                                <select class="form-control" name="target_id">
                                    @foreach ($targets as $target)
                                        <option value="{{$target->id}}"
                                                {{ $selectedTarget == $target->id ? 'selected="selected"' : ''}}
                                        >{{$target->target_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Goal Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $goal->description }}" required autofocus>

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
                                    Update
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
