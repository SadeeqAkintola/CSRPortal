@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Targets</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('target.update', ['id' => $target->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('target_name') ? ' has-error' : '' }}">
                            <label for="target_name" class="col-md-4 control-label">Target Name</label>

                            <div class="col-md-6">
                                <input id="target_name" type="text" class="form-control" name="target_name" value="{{ $target->target_name }}" required autofocus>

                                @if ($errors->has('target_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('target_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('target_code') ? ' has-error' : '' }}">
                            <label for="target_code" class="col-md-4 control-label">Target Code</label>

                            <div class="col-md-6">
                                <input readonly="readonly" disabled="disabled" id="target_code" type="text" class="form-control" name="target_code" value="{{ $target->target_code }}" required autofocus>

                                @if ($errors->has('target_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('target_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Plan 2030 Pillar</label>

                            <div class="col-md-6">
                                <select class="form-control" name="pillar_id">
                                    @foreach ($pillars as $pillar)
                                        <option value="{{$pillar->id}}"
                                                {{ $selectedPillar == $pillar->id ? 'selected="selected"' : ''}}
                                        >{{$pillar->pillar_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Target Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $target->description }}" required autofocus>

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

                                <a class="btn btn-danger" href="{{ url('system-management/target') }}">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
