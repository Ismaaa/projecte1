@extends('layouts.app')

@section('content')

    <div class="panel panel-info">
        <div class="jumbotron" align="center">
            <h1>Generador de PDF's</h1>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12" align="center">
                <img src="/assets/img/pdfbanner.jpg">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2>
                            PDF's disponibles - Possibilitat de visualitzar i descarregar
                        </h2>
                    </div>
                    <table class="table">
                        <tr>
                            <td>
                                <h3>
                                    <span class="label label-info">
                                        Llistat d'usuaris ordenats per cognoms
                                    </span>
                                </h3>
                            </td>
                            <td>
                                <h3>
                                    <span class="label label-warning">
                                        Llistat d'usuaris ordenats per DNI
                                    </span>
                                </h3>
                            </td>
                            <td>
                                <h3>
                                    <span class="label label-success">
                                        Llistat d'usuaris agrupats per població
                                    </span>
                                </h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>
                                    <span class="text text-danger">Cognoms ascendents</span>
                                </h4>
                                <a href="{{ route('cog_asc') }}" target="_blank" class="btn btn-sm btn-info">
                                    Visualitzar
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </a>
                                <a href="{{ route('cog_asc_down') }}" class="btn btn-sm btn-success">
                                    Descarregar
                                    <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                </a>
                            </td>
                            <td>
                                <h4>
                                    <span class="text text-danger">DNI ascendents</span>
                                </h4>
                                <a href="{{ route('dni_asc') }}" target="_blank" class="btn btn-sm btn-info">
                                    Visualitzar
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </a>
                                <a href="{{ route('dni_asc_down') }}" class="btn btn-sm btn-success">
                                    Descarregar
                                    <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                </a>
                            </td>
                            <td>
                                <h4>
                                    <span class="text text-danger">Població ascendent</span>
                                </h4>
                                <a href="{{ route('pobl_asc') }}" target="_blank" class="btn btn-sm btn-info">
                                    Visualitzar
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </a>
                                <a href="{{ route('pobl_asc_down') }}" class="btn btn-sm btn-success">
                                    Descarregar
                                    <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>
                                    <span class="text text-danger">Cognoms descendents</span>
                                </h4>
                                <a href="{{ route('cog_desc') }}" target="_blank" class="btn btn-sm btn-info">
                                    Visualitzar
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </a>
                                <a href="{{ route('cog_desc_down') }}" class="btn btn-sm btn-success">
                                    Descarregar
                                    <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                </a>
                            </td>
                            <td>
                                <h4>
                                    <span class="text text-danger">DNI descendents</span>
                                </h4>
                                <a href="{{ route('dni_desc') }}" target="_blank" class="btn btn-sm btn-info">
                                    Visualitzar
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </a>
                                <a href="{{ route('dni_desc_down') }}" class="btn btn-sm btn-success">
                                    Descarregar
                                    <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                </a>
                            </td>
                            <td>
                                <h4>
                                    <span class="text text-danger">Població descendent</span>
                                </h4>
                                <a href="{{ route('pobl_desc') }}" target="_blank" class="btn btn-sm btn-info">
                                    Visualitzar
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </a>
                                <a href="{{ route('pobl_desc_down') }}" class="btn btn-sm btn-success">
                                    Descarregar
                                    <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
    </div>


@endsection