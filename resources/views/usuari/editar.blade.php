@extends('layouts.app')
@extends('layouts.app')

@section('content')
    <div class="jumbotron" align="center">
        <h1>Perfil de l'usuari <span class="label label-info">{{ $user->name }}</span></h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    @if ($errors->has('email'))

                    @endif
                    <div class="col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    {{ $user->name }}
                                    @if($user->admin && $user->id=='1')
                                        <span style="float: right" class="label label-danger"> Administrador </span>
                                        <span style="float: right" class="label label-success"> Master creador </span>
                                    @elseif($user->admin)
                                        <span style="float: right" class="label label-danger">Administrador</span>
                                    @else
                                        <span style="float: right" class="label label-success">Membre</span>
                                    @endif
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <img src="/perfils/avatars/{{ $user->avatar }}" style="width: 200px; height: 200px; float: left; border-radius: 50%">

                                    <div class=" col-md-9 col-lg-9 ">
                                        <table class="table table-user-information table-hover">
                                            {!! Form::open(['route' => ['usuaris.modificar', $user], 'files' => true, 'method' => 'put']) !!}
                                            {{ csrf_field() }}
                                            <tbody>
                                                    <tr>
                                                        <td>Nom</td>
                                                        <td>
                                                            @if ($errors->has('name'))
                                                                <strong style="color: darkred">{{ $errors->first('name') }}</strong>
                                                                {!! Form::text('name', $user->name, ['class' => 'form-control','placeholder' => 'Nom', 'required']) !!}
                                                            @else
                                                                {!! Form::text('name', $user->name, ['class' => 'form-control','placeholder' => 'Nom', 'required']) !!}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cognoms</td>
                                                        <td>
                                                            @if ($errors->has('surnames'))
                                                                <strong style="color: darkred">{{ $errors->first('surnames') }}</strong>
                                                                {!! Form::text('surnames', $user->surnames, ['class' => 'form-control','placeholder' => 'Cognoms', 'required']) !!}
                                                            @else
                                                                {!! Form::text('surnames', $user->surnames, ['class' => 'form-control','placeholder' => 'Cognoms', 'required']) !!}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @if(Auth::user()->id == $user->id || Auth::user()->admin == 1)
                                                        <tr>
                                                            <td>DNI</td>
                                                            <td>
                                                                @if ($errors->has('dni'))
                                                                    <strong style="color: darkred">{{ $errors->first('dni') }}</strong>
                                                                    {!! Form::text('dni', $user->dni, ['class' => 'form-control','placeholder' => 'dni', 'disabled' => 'disabled', 'required']) !!}
                                                                @else
                                                                    {!! Form::text('dni', $user->dni, ['class' => 'form-control','placeholder' => 'dni', 'disabled' => 'disabled', 'required']) !!}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <td>E-mail</td>
                                                        <td>
                                                            @if ($errors->has('email'))
                                                                <strong style="color: darkred">{{ $errors->first('email') }}</strong>
                                                                {!! Form::email('email', $user->email, ['class' => 'form-control has-errors has-feedback','placeholder' => 'E-Mail', 'required']) !!}
                                                            @else

                                                                {!! Form::email('email', $user->email, ['class' => 'form-control','placeholder' => 'E-Mail', 'required']) !!}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ciutat</td>
                                                        <td>
                                                            @if ($errors->has('city'))
                                                                <strong style="color: darkred">{{ $errors->first('city') }}</strong>
                                                                {!! Form::text('city', $user->city, ['class' => 'form-control','placeholder' => 'Ciutat', 'required']) !!}
                                                            @else
                                                                {!! Form::text('city', $user->city, ['class' => 'form-control','placeholder' => 'Ciutat', 'required']) !!}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Adreça</td>
                                                        <td>
                                                            @if ($errors->has('address'))
                                                                <strong style="color: darkred">{{ $errors->first('address') }}</strong>
                                                                {!! Form::text('address', $user->address, ['class' => 'form-control','placeholder' => 'Adreça']) !!}
                                                            @else
                                                                {!! Form::text('address', $user->address, ['class' => 'form-control','placeholder' => 'Adreça']) !!}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Telèfon</td>
                                                        <td>
                                                            @if ($errors->has('phone'))
                                                                <strong style="color: darkred">{{ $errors->first('phone') }}</strong>
                                                                {!! Form::tel('phone', $user->phone, ['class' => 'form-control','placeholder' => 'Telèfon', 'required']) !!}
                                                            @else
                                                                {!! Form::tel('phone', $user->phone, ['class' => 'form-control','placeholder' => 'Telèfon', 'required']) !!}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Imatge de perfil</td>
                                                        <td>
                                                            {!! Form::file('avatar', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biografia</td>
                                                        <td>
                                                            @if ($errors->has('bio'))
                                                                <strong style="color: darkred">{{ $errors->first('bio') }}</strong>
                                                                {!! Form::textarea('bio', $user->bio, ['class' => 'form-control','placeholder' => 'Biografia']) !!}
                                                            @else
                                                                {!! Form::textarea('bio', $user->bio, ['class' => 'form-control','placeholder' => 'Biografia']) !!}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <!-- SI ÉS ADMINISTRADOR NO CALDRÀ QUE FIQUI CONTRASENYA, NOMÉS SI ESTÀ MODIFICANT EL SEU PERFIL -->
                                                    @if(!Auth::user()->admin || Auth::user()->admin && Auth::user()->id == $user->id)
                                                    <tr>
                                                        <td>Contrasenya</td>
                                                        <td>
                                                            @if ($errors->has('password'))
                                                                <strong style="color: darkred">{{ $errors->first('password') }}</strong>
                                                                {!! Form::password('password', ['class' => 'form-control','placeholder' => '*********', 'required']) !!}
                                                            @else
                                                                {!! Form::password('password', ['class' => 'form-control','placeholder' => '*********', 'required']) !!}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Repeteix la contrasenya</td>
                                                        <td>
                                                            @if ($errors->has('password_confirmation'))
                                                                <strong style="color: darkred">{{ $errors->first('password_confirmation') }}</strong>
                                                                {!! Form::password('password_confirmation', ['class' => 'form-control','placeholder' => '*********', 'required']) !!}
                                                            @else
                                                                {!! Form::password('password_confirmation', ['class' => 'form-control','placeholder' => '*********', 'required']) !!}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                        </table>
                                        @if(Auth::user()->id == $user->id || Auth::user()->admin)
                                                {!! Form::submit('Guardar canvis', ['class' => 'btn btn-primary']) !!}
                                        @else
                                            <span style="cursor:not-allowed">
                                                <a class="btn btn-primary disabled">Guardar canvis</a>
                                            </span>
                                        @endif
                                        {!! Form::close() !!}
                                        <span class="label label-success" style="float: right; font-size: larger">
                                            Darrera modificació
                                            {{ Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="{{ route('usuaris.perfil', $user->id) }}" class="btn btn-info hvr-icon-back">Tornar al perfil</a>
                                <span class="pull-right">
                                    @if(Auth::user()->id == $user->id  || Auth::user()->admin && $user->admin == false)
                                        <td>
                                            <a class="btn btn-sm btn-warning">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            </a>

                                            <a href="{{ route('usuaris.esborrar', $user->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Segur que vols eliminar aquest usuari?')">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    @else
                                        <td style="cursor:not-allowed">
                                            <a class="btn btn-sm btn-warning">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true" style="cursor:not-allowed"></span>
                                            </a>
                                            <a class="btn btn-sm btn-danger">
                                                <span class="glyphicon glyphicon-remove disabled" aria-hidden="true" style="cursor:not-allowed"></span>
                                            </a>
                                        </td>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
