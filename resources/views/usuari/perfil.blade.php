@extends('layouts.app')

@section('content')
    <div class="jumbotron" align="center">
        <h1>Perfil de l'usuari <span class="label label-info">{{ $user->name }}</span></h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
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
                                    <div class="col-md-3 col-lg-3 " align="center">
                                        <img src="/perfils/avatars/{{ $user->avatar }}" style="width: 200px; height: 200px; float: left; border-radius: 50%">
                                    </div>

                                    <div class=" col-md-9 col-lg-9 ">
                                        <table class="table table-user-information table-hover">
                                            <tbody>
                                            <tr>
                                                <td>Nom</td>
                                                <td>{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Cognoms</td>
                                                <td>{{ $user->surnames }}</td>
                                            </tr>
                                            @if(Auth::user()->id == $user->id || Auth::user()->admin == 1)
                                                <tr>
                                                    <td>DNI</td>
                                                    <td>{{ $user->dni }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td>E-mail</td>
                                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                            </tr>
                                            <tr>
                                                <td>Ciutat</td>
                                                <td>{{ $user->city }}</td>
                                            </tr>
                                            <tr>
                                                <td>Adreça</td>
                                                <td>{{ $user->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Telèfon</td>
                                                <td>{{ $user->phone }}</td>
                                            </tr>
                                                <td>Data registre</td>
                                                <td>{{ $user->created_at }}</td>
                                            </tr>
                                            </tr>
                                                <td>Darrera modificació</td>
                                                <td>{{ $user->updated_at }}</td>
                                            </tr>
                                            </tr>
                                            <td>Biografia</td>
                                            <td>{{ $user->bio }}</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                        @if(Auth::user()->id == $user->id || Auth::user()->admin == 1 && $user->admin == false)
                                            <a href="{{ route('usuaris.editar', $user->id) }}" class="btn btn-primary">Modificar dades</a>
                                        @else
                                            <span style="cursor:not-allowed">
                                                <a class="btn btn-primary disabled">Editar informació</a>
                                            </span>
                                        @endif
                                        <span class="label label-success" style="float: right; font-size: larger">
                                            Darrera modificació
                                            {{ Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="{{ route('portada', $user->id) }}" class="btn btn-info hvr-icon-back">Anar a la portada</a>
                                <span class="pull-right">
                                    @if(Auth::user()->id == $user->id  || Auth::user()->admin && $user->admin == false)
                                        <td>
                                            <a href="{{ route('usuaris.editar', $user->id) }}" class="btn btn-sm btn-warning">
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
