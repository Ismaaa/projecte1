@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    {!! Form::open(['url' => '/login', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'Correu electrònic', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::email('email', null, ['class' => 'form-control','placeholder' => 'ismaildidouch@iesmontsia.org','required', 'autofocus']) !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', 'Contrasenya', ['class' => 'col-md-4 control-label', 'placeholder' => '******']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control','placeholder' => '******', 'required']) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Recorda'm
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                {!! Form::submit('Entra', ['class' => 'btn btn-primary']) !!}
<!--
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>-->
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                                    <defs>
                                        <filter id="goo">
                                            <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                                            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 35 -10" result="goo" />
                                            <feBlend in="SourceGraphic" in2="goo" operator="atop" />
                                        </filter>
                                    </defs>
                                </svg>
                                <div class="loader">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    svg {
        height: 0px;
        width: 0px;
    }

    @keyframes loader {
        50% {
            transform: translateY(-16px);
            background-color: #1b98e0;
        }
    }

    .loader {
        filter: url("#goo");
        width: 100px;
        margin: 0 auto;
        position: relative;
        top: 50vh;
        transform: translateY(-10px);
    }
    .loader > div {
        float: left;
        height: 20px;
        width: 20px;
        border-radius: 100%;
        background-color: #006494;
        animation: loader 0.8s infinite;
    }

    .loader > div:nth-child(1) {
        animation-delay: 0.16s;
    }

    .loader > div:nth-child(2) {
        animation-delay: 0.32s;
    }

    .loader > div:nth-child(3) {
        animation-delay: 0.48s;
    }

    .loader > div:nth-child(4) {
        animation-delay: 0.64s;
    }

    .loader > div:nth-child(5) {
        animation-delay: 0.8s;
    }

</style>
@endsection
