@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-4 sidebar1">
                <div class="logo">
                    <img src="/perfils/avatars/{{ Auth::user()->avatar }}" style="width: 200px; height: 200px; float: left; border-radius: 50%">
                </div>
                <br>
                <div class="left-navigation">
                    <ul class="list">
                        <h5 class="label label-info" style="font-size: larger"><strong>{{ Auth::user()->name }}</strong></h5>
                        <a href="{{ route('portada') }}" class="btn btn-primary btn-block btn-sm">Portada</a>
                        <a href="{{ route('admin.tauler') }}" class="btn btn-primary btn-block btn-sm">Tauler</a>
                        <a href="{{ route('admin.historialpdf') }}" class="btn btn-primary btn-block btn-sm">Historial de PDF's</a>
                        <a href="{{ route('admin.taulerllistat') }}" class="btn btn-primary btn-block btn-sm">Llistat d'administradors</a>
                        <a href="{{ route('admin.usuaris') }}" class="btn btn-primary btn-block btn-sm">Llistat d'usuaris</a>
                        <a href="{{ route('admin.suggeriments') }}" class="btn btn-primary btn-block btn-sm">Bústia de suggeriments</a>
                    </ul>
                    <br>
                </div>
            </div>
            <div class="col-md-10 col-sm-8 main-content">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Cognoms</th>
                        <th>DNI</th>
                        <th>E-mail</th>
                        <th>Població</th>
                        <th>Adreça</th>
                        <th>Telèfon</th>
                        <th>Biografia</th>
                        <th>Data de creació</th>
                        <th>Darrera modificació</th>
                        <th>Acció</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ ($user->id) }}</td>
                            <td>{{ ($user->name) }}</td>
                            <td>{{ ($user->surnames) }}</td>
                            <td>{{ ($user->dni) }}</td>
                            <td>{{ ($user->email) }}</td>
                            <td>{{ ($user->city) }}</td>
                            <td>{{ ($user->address) }}</td>
                            <td>{{ ($user->phone) }}</td>
                            <td>{{ ($user->bio) }}</td>
                            <td>{{ ($user->created_at) }}</td>
                            <td>{{ ($user->updated_at) }}</td>
                            @if(Auth::user()->id == $user->id)
                                <td>
                                    <a href="{{ route('usuaris.esborrar', $user->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Segur que vols eliminar aquest usuari?')">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </a>
                                    <a href="{{ route('usuaris.editar', $user->id) }}" class="btn btn-warning btn-xs">
                                        <span class="glyphicon glyphicon-edit btn-xs" aria-hidden="true"></span>
                                    </a>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('usuaris.perfil', $user->id) }}" class="btn btn-primary btn-xs">
                                        <span class="glyphicon glyphicon-user btn-xs" aria-hidden="true"></span>
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <style>
        .sidebar1 {
            background: #3cbcf1;
            /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(#f17153, #F58D63, #f1ab53);
            /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(#F17153, #F58D63, #f1ab53);
            /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(#F17153, #F58D63, #f1ab53);
            /* For Firefox 3.6 to 15 */
            background: linear-gradient(#F17153, #F58D63, #f1ab53);
            /* Standard syntax */
            padding: 0px;
            min-height: 100%;
        }
        .logo {
            max-height: 130px;
        }
        .logo>img {
            margin-top: 30px;
            padding: 3px;
            border: 3px solid white;
            border-radius: 100%;
        }
        .list {
            color: #fff;
            list-style: none;
            padding-left: 0px;
        }
        .list::first-line {
            color: rgba(255, 255, 255, 0.5);
        }
        .list> li, h5 {
            padding: 5px 0px 5px 40px;
        }
        .list>li:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-left: 5px solid white;
            color: white;
            font-weight: bolder;
            padding-left: 35px;
        }.main-content{
             text-align:center;
         }
    </style>


@endsection
