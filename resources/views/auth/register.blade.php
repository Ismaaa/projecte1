<style>
    body {
        background-color: #fff5f0;
    }

    .elephant-container {
        width: 466px;
        margin: 130px auto 0px auto;
        height: 283px;
        position: relative;
    }

    .elephant {
        position: relative;
        left: 35px;
        height: 100%;
    }
    .elephant .elephant-body {
        position: absolute;
        left: 0;
        top: 12px;
        width: 280px;
        height: 268px;
    }
    .elephant .elephant-body .top-body {
        position: absolute;
        left: 0;
        top: 0;
        width: 220px;
        height: 220px;
        background-color: #83868f;
        border-radius: 50%;
    }
    .elephant .elephant-body .bottom-body {
        position: absolute;
        left: 57px;
        top: 135px;
        width: 240px;
        height: 100px;
        background-color: #83868f;
        border-radius: 50%;
    }
    .elephant .elephant-body .elephant-legs {
        position: absolute;
        bottom: 0;
        left: 1px;
        width: 280px;
        height: 143px;
    }
    .elephant .elephant-body .elephant-legs .elephant-leg {
        width: 82px;
        height: 100%;
        background: -webkit-radial-gradient(50% 100% circle, #e7dad1 9px, #ffffff 10px, rgba(231, 218, 209, 0) 11px) 0 100%, #83868f;
        background: radial-gradient(circle at 50% 100%, #e7dad1 9px, #ffffff 10px, rgba(231, 218, 209, 0) 11px) 0 100%, #83868f;
        background-size: 20px 20px;
        background-repeat: repeat-x;
        position: absolute;
        top: 0;
        border-radius: 0px 0px 20px 20px;
        overflow: hidden;
    }
    .elephant .elephant-body .elephant-legs .elephant-leg-left {
        left: 0;
    }
    .elephant .elephant-body .elephant-legs .elephant-leg-right {
        right: 0;
    }
    .elephant .elephant-body .elephant-tail {
        position: absolute;
        top: 118px;
        left: -31px;
        width: 44px;
        height: 47px;
    }
    .elephant .elephant-body .elephant-tail:before, .elephant .elephant-body .elephant-tail:after {
        content: " ";
        display: block;
        position: absolute;
    }
    .elephant .elephant-body .elephant-tail:before {
        width: 44px;
        height: 8px;
        background-color: #83868f;
        top: 0;
        right: 0;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }
    .elephant .elephant-body .elephant-tail:after {
        width: 27px;
        height: 27px;
        background-color: #83868f;
        bottom: 20px;
        left: -1px;
        border-radius: 50%;
    }
    .elephant .elephant-head {
        position: absolute;
        left: 140px;
        top: 0;
        width: 220px;
        height: 220px;
        background-color: #83868f;
        border-radius: 50%;
    }
    .elephant .elephant-head .elephant-ear {
        position: absolute;
        left: -14px;
        top: 27px;
        height: 188px;
        width: 140px;
        background-color: #91949b;
        border-radius: 50%;
        -webkit-transform: rotate(-15deg);
        transform: rotate(-15deg);
    }
    .elephant .elephant-head .elephant-ear:after {
        content: "";
        display: block;
        width: 40px;
        height: 113px;
        position: absolute;
        top: 61px;
        right: -29px;
        background-color: #83868f;
        -webkit-transform: rotate(15deg);
        transform: rotate(15deg);
    }
    .elephant .elephant-head .elephant-eye {
        background-color: #36393e;
        position: absolute;
        right: 39px;
        bottom: 55px;
        height: 28px;
        width: 28px;
        border-radius: 50%;
        z-index: 2;
    }
    .elephant .elephant-head .elephant-eye:after {
        content: "";
        display: block;
        width: 14px;
        height: 14px;
        background-color: #fff;
        border-radius: 50%;
        position: absolute;
        top: 1px;
        left: 4px;
    }
    .elephant .elephant-head .elephant-nose {
        position: absolute;
        top: 103px;
        right: -87px;
        width: 103px;
        height: 61px;
        border: 10px solid transparent;
        border-left: 72px solid #83868f;
        border-bottom: 29px solid #83868f;
        border-radius: 50%;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }
    .elephant .elephant-head .elephant-nose:after {
        content: "";
        display: block;
        position: absolute;
        top: 47px;
        right: -3px;
        -webkit-transform: rotate(107deg);
        transform: rotate(107deg);
        background-color: #83868f;
        width: 17px;
        height: 17px;
        border-radius: 50% 50% 0% 50%;
    }

    @-webkit-keyframes heart-animation {
        0% {
            top: 0;
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 1;
        }
        33% {
            top: -40px;
            -webkit-transform: scale(0.75);
            transform: scale(0.75);
            opacity: 1;
        }
        66% {
            top: -80px;
            -webkit-transform: scale(0.35);
            transform: scale(0.35);
            opacity: 0.5;
        }
        93% {
            top: -120px;
            -webkit-transform: scale(0);
            transform: scale(0);
            opacity: 0;
        }
        100% {
            top: -120px;
            -webkit-transform: scale(0);
            transform: scale(0);
            opacity: 0;
        }
    }

    @keyframes heart-animation {
        0% {
            top: 0;
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 1;
        }
        33% {
            top: -40px;
            -webkit-transform: scale(0.75);
            transform: scale(0.75);
            opacity: 1;
        }
        66% {
            top: -80px;
            -webkit-transform: scale(0.35);
            transform: scale(0.35);
            opacity: 0.5;
        }
        93% {
            top: -120px;
            -webkit-transform: scale(0);
            transform: scale(0);
            opacity: 0;
        }
        100% {
            top: -120px;
            -webkit-transform: scale(0);
            transform: scale(0);
            opacity: 0;
        }
    }
    .hearts {
        position: absolute;
        right: 41px;
        top: 25px;
    }
    .hearts .heart {
        position: absolute;
        width: 63px;
        height: 70px;
        top: 0;
        left: 0;
        -webkit-animation: heart-animation 1.5s linear 0s infinite;
        animation: heart-animation 1.5s linear 0s infinite;
    }
    .hearts .heart:before, .hearts .heart:after {
        content: "";
        display: block;
        background-color: #c42319;
        width: 40px;
        height: 70px;
        border-radius: 20px;
        top: 0;
        position: absolute;
    }
    .hearts .heart:before {
        left: 0;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }
    .hearts .heart:after {
        right: 0;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

</style>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Registre</div>
                <div class="panel-body">
                    {!! Form::open(['url' => '/register', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="form-group">
                            {!! Form::label('name', 'Nom', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Ismail', 'required']) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('surnames') ? ' has-error' : '' }}">
                        <div class="form-group">
                            {!! Form::label('surnames', 'Cognoms', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('surnames', null, ['class' => 'form-control','placeholder' => 'Didouh', 'required']) !!}

                                @if ($errors->has('surnames'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surnames') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                        <div class="form-group">
                            {!! Form::label('dni', 'DNI', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('dni', null, ['class' => 'form-control','placeholder' => '41254785F', 'required']) !!}
                                @if ($errors->has('dni'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="form-group">
                            {!! Form::label('email', 'Correu electrònic', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::email('email', null, ['class' => 'form-control','placeholder' => 'ismaildidouch@iesmontsia.org', 'required']) !!}
                            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        <div class="form-group">
                            {!! Form::label('city', 'Ciutat', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('city', null, ['class' => 'form-control','placeholder' => 'Amposta', 'required']) !!}
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <div class="form-group">
                            {!! Form::label('address', 'Adreça', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('address', null, ['class' => 'form-control','placeholder' => 'C/ Mandarina, 14', 'required']) !!}
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <div class="form-group">
                            {!! Form::label('phone', 'Telèfon', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::tel('phone', null, ['class' => 'form-control','placeholder' => '977 73 21 25', 'required']) !!}
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                        <div class="form-group">
                            {!! Form::label('bio', 'Biografía', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('bio', null, ['class' => 'form-control','placeholder' => 'Sóc DJ, YouTuber, Viner, i altres mentires....', 'required']) !!}
                                @if ($errors->has('bio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="form-group">
                            {!! Form::label('password', 'Contrasenya', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control','placeholder' => '******', 'required']) !!}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Repeteix la contrasenya', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', ['class' => 'form-control','placeholder' => '******', 'required']) !!}

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                {!! Form::submit('Registrar-se', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="elephant-container">
    <div class="hearts">
        <div class="heart"></div>
    </div>
    <div class="elephant">
        <div class="elephant-body">
            <div class="top-body"></div>
            <div class="bottom-body"></div>
            <div class="elephant-legs">
                <div class="elephant-leg elephant-leg-left"></div>
                <div class="elephant-leg elephant-leg-right"></div>
            </div>
            <div class="elephant-tail"></div>
        </div>
        <div class="elephant-head">
            <div class="elephant-ear"></div>
            <div class="elephant-eye"></div>
            <div class="elephant-nose"></div>
        </div>
    </div>
</div>
@endsection
