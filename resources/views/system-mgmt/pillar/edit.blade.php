@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Plan 2030 Pillar</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('pillar.update', ['id' => $pillar->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <div class="form-group{{ $errors->has('pillar_name') ? ' has-error' : '' }}">
                            <label for="pillar_name" class="col-md-4 control-label">Pillar Name</label>

                            <div class="col-md-6">
                                <input id="pillar_name" type="text" class="form-control" name="pillar_name" value="{{ $pillar->pillar_name }}" required autofocus>

                                @if ($errors->has('pillar_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pillar_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('pillar_code') ? ' has-error' : '' }}">
                            <label for="pillar_code" class="col-md-4 control-label"> Pillar Code</label>

                            <div class="col-md-6">
                                <input id="pillar_code" type="text" class="form-control" name="pillar_code" value="{{ $pillar->pillar_code }}" required>

                                @if ($errors->has('pillar_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pillar_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group{{ $errors->has('purpose') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label"> Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $pillar->description }}" required>

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

                                <a class="btn btn-danger" href="{{ url('system-management/pillar') }}">Cancel</a>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
