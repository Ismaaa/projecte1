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
                <!--Main content code to be written here -->

                <video width="60%" height="60%" autoplay loop>
                    <source src="http://statics.vayagif.com/gifs/2014/02/GIF_190448_alcanzando_el_nirvana.webm?cb=59508" type="video/mp4">
                </video>
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
