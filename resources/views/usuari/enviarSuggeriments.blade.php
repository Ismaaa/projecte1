@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
        <div class="container">
            <div class="row">
                <h3>Contacta amb els administradors</h3>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <div class="widget-area no-padding blank">
                        <div class="status-upload">
                            <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                                {!! Form::open(['route' => ['usuaris.publicarSuggeriments', Auth::user()], 'method' => 'POST']) !!}
                                {{ csrf_field() }}

                                {{ Form::label('tipus', 'De què ens vols informar?', ['class' => 'form-control']) }}
                                {{ Form::select('type', ['Suggeriment', 'Error', 'Altres'], null, ['class' => 'form-control']) }}
                                <br>
                                {{ Form::label('text', 'Text', ['class' => 'form-control']) }}
                                {!! Form::textarea('text', null, ['class' => 'form-control','placeholder' => 'Hola!']) !!}
                                @if ($errors->has('text'))
                                    <span class="help-block">
                                                        <strong>{{ $errors->first('text') }}</strong>
                                                    </span>
                                @endif
                                <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Envia</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
