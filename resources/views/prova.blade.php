@extends('layouts.app')

@section('content')
    <style>
        .widget-area.blank {
            background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            -ms-box-shadow: none;
            -o-box-shadow: none;
            box-shadow: none;
        }
        body .no-padding {
            padding: 0;
        }
        .widget-area {
            background-color: #fff;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
            -ms-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
            -o-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
            box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
            float: left;
            margin-top: 30px;
            padding: 25px 30px;
            position: relative;
            width: 100%;
        }
        .status-upload {
            background: none repeat scroll 0 0 #f5f5f5;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            float: left;
            width: 100%;
        }
        .status-upload form {
            float: left;
            width: 100%;
        }
        .status-upload form textarea {
            background: none repeat scroll 0 0 #fff;
            border: medium none;
            -webkit-border-radius: 4px 4px 0 0;
            -moz-border-radius: 4px 4px 0 0;
            -ms-border-radius: 4px 4px 0 0;
            -o-border-radius: 4px 4px 0 0;
            border-radius: 4px 4px 0 0;
            color: #777777;
            float: left;
            font-family: Lato;
            font-size: 14px;
            height: 142px;
            letter-spacing: 0.3px;
            padding: 20px;
            width: 100%;
            resize:vertical;
            outline:none;
            border: 1px solid #F2F2F2;
        }

        .status-upload ul {
            float: left;
            list-style: none outside none;
            margin: 0;
            padding: 0 0 0 15px;
            width: auto;
        }
        .status-upload ul > li {
            float: left;
        }
        .status-upload ul > li > a {
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            color: #777777;
            float: left;
            font-size: 14px;
            height: 30px;
            line-height: 30px;
            margin: 10px 0 10px 10px;
            text-align: center;
            -webkit-transition: all 0.4s ease 0s;
            -moz-transition: all 0.4s ease 0s;
            -ms-transition: all 0.4s ease 0s;
            -o-transition: all 0.4s ease 0s;
            transition: all 0.4s ease 0s;
            width: 30px;
            cursor: pointer;
        }
        .status-upload ul > li > a:hover {
            background: none repeat scroll 0 0 #606060;
            color: #fff;
        }
        .status-upload form button {
            border: medium none;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            color: #fff;
            float: right;
            font-family: Lato;
            font-size: 14px;
            letter-spacing: 0.3px;
            margin-right: 9px;
            margin-top: 9px;
            padding: 6px 15px;
        }
        .dropdown > a > span.green:before {
            border-left-color: #2dcb73;
        }
        .status-upload form button > i {
            margin-right: 7px;
        }




        /*     DSADDSASADDSA  */

        body{ background: #fafafa;}
        .widget-area.blank {
            background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            -ms-box-shadow: none;
            -o-box-shadow: none;
            box-shadow: none;
        }
        body .no-padding {
            padding: 0;
        }
        .widget-area {
            background-color: #fff;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
            -ms-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
            -o-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
            box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
            float: left;
            margin-top: 30px;
            padding: 25px 30px;
            position: relative;
            width: 100%;
        }
        .status-upload {
            background: none repeat scroll 0 0 #f5f5f5;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            float: left;
            width: 100%;
        }
        .status-upload form {
            float: left;
            width: 100%;
        }
        .status-upload form textarea {
            background: none repeat scroll 0 0 #fff;
            border: medium none;
            -webkit-border-radius: 4px 4px 0 0;
            -moz-border-radius: 4px 4px 0 0;
            -ms-border-radius: 4px 4px 0 0;
            -o-border-radius: 4px 4px 0 0;
            border-radius: 4px 4px 0 0;
            color: #777777;
            float: left;
            font-family: Lato;
            font-size: 14px;
            height: 142px;
            letter-spacing: 0.3px;
            padding: 20px;
            width: 100%;
            resize:vertical;
            outline:none;
            border: 1px solid #F2F2F2;
        }

        .status-upload ul {
            float: left;
            list-style: none outside none;
            margin: 0;
            padding: 0 0 0 15px;
            width: auto;
        }
        .status-upload ul > li {
            float: left;
        }
        .status-upload ul > li > a {
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            color: #777777;
            float: left;
            font-size: 14px;
            height: 30px;
            line-height: 30px;
            margin: 10px 0 10px 10px;
            text-align: center;
            -webkit-transition: all 0.4s ease 0s;
            -moz-transition: all 0.4s ease 0s;
            -ms-transition: all 0.4s ease 0s;
            -o-transition: all 0.4s ease 0s;
            transition: all 0.4s ease 0s;
            width: 30px;
            cursor: pointer;
        }
        .status-upload ul > li > a:hover {
            background: none repeat scroll 0 0 #606060;
            color: #fff;
        }
        .status-upload form button {
            border: medium none;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            color: #fff;
            float: right;
            font-family: Lato;
            font-size: 14px;
            letter-spacing: 0.3px;
            margin-right: 9px;
            margin-top: 9px;
            padding: 6px 15px;
        }
        .dropdown > a > span.green:before {
            border-left-color: #2dcb73;
        }
        .status-upload form button > i {
            margin-right: 7px;
        }





    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>Publicacions dels usuaris</h1>
                </div>
                <div class="container">
                    @foreach($publications as $publication)
                        @if(isset($publication->text))
                            <div class="comment-img">
                                <a href="{{ url('/usuaris/'.$publication->user->id) }}">
                                    <img src="perfils/avatars/{{ $publication->user->avatar }}" style="width: 100px; height: 100px; float: left; border-radius: 50%">
                                </a>
                            </div>
                            <div class="col-sm-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a href="{{ url('/usuaris/'.$publication->user->id) }}">
                                            <strong>{{ $publication->user->name }}.#{{$publication->user->id}}</strong>
                                            @if($publication->user->admin==1)
                                                <span class="label label-success">Administrador</span>
                                            @endif
                                        </a>
                                        <span class="text-muted" style="float: right">{{ Carbon\Carbon::parse($publication->created_at)->diffForHumans() }}</span>
                                    </div>
                                    <div class="panel-body">
                                        {{ $publication->text }}
                                    </div><!-- /panel-body -->
                                </div><!-- /panel panel-default -->
                            </div><!-- /col-sm-5 -->
                        @endif
                    @endforeach
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
                        <div class="container">
                            <div class="row">
                                <h3>Crea una publicació</h3>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="widget-area no-padding blank">
                                        <div class="status-upload">
                                            <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                                                {!! Form::open(['route' => ['usuaris.publicar', Auth::user()], 'method' => 'POST']) !!}
                                                {{ csrf_field() }}
                                                {!! Form::textarea('text', null, ['class' => 'form-control','placeholder' => 'Avui estic molt content i feliç perque...']) !!}
                                                @if ($errors->has('text'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('text') }}</strong>
                                                    </span>
                                                @endif
                                                <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Publica</button>
                                                {!! Form::close() !!}
                                            </div>
                                        </div><!-- Status Upload  -->
                                    </div><!-- Widget Area -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
