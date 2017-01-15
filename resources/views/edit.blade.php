@extends('layouts.app')

@section('content')
    <div class="create center-block">
        <h3 class="page-title">Edit</h3>

        {!! Form::model($advert, ['method' => 'PUT', 'route' => ['private.update', $advert->id]]) !!}

        <div class="panel panel-default">
            <div class="panel-heading">
                Edit ad:
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('title'))
                            <p class="help-block">
                                {{ $errors->first('title') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('description', 'Description*', ['class' => 'control-label']) !!}
                        {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('description'))
                            <p class="help-block">
                                {{ $errors->first('description') }}
                            </p>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@stop

