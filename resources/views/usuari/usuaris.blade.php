@extends('layouts.app')

@section('content')

                <div class="panel panel-info">
                    <div class="jumbotron" align="center">
                        <h1>Llistat d'usuaris</h1>
                    </div>
                    <hr>
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
                            <th>Data de creació</th>
                            <th>Darrera modificació</th>
                            <th>Acció</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @if($user->admin)
                                <tr class="bg-info">
                            @else
                                <tr>
                                    @endif
                                    <td>{{ ($user->id) }}</td>
                                    <td>{{ ($user->name) }}</td>
                                    <td>{{ ($user->surnames) }}</td>
                                    <td>{{ ($user->dni) }}</td>
                                    <td>{{ ($user->email) }}</td>
                                    <td>{{ ($user->city) }}</td>
                                    <td>{{ ($user->address) }}</td>
                                    <td>{{ ($user->phone) }}</td>
                                    <td>{{ ($user->created_at) }}</td>
                                    <td>{{ ($user->updated_at) }}</td>
                                    @if(Auth::user()->id == $user->id || Auth::user()->admin == 1 && $user->admin == false)
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
                    <div class="container">
                        {!!  $users->render() !!}
                    </div>
                </div>
@endsection