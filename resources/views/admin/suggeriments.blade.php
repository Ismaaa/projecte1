@extends('layouts.app')

@section('content')
    <img src="/assets/img/email.png" width="70%" height="250px" align="center">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2">
                <div class="btn-group">
                    <button type="button" class="btn btn-success">
                        Correu electrònic
                    </button>
                </div>
            </div>
            <div class="col-sm-9 col-md-10">
                <!-- Split button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-default">
                        <div class="checkbox" style="margin: 0;">
                            <label>
                                <input type="checkbox">
                            </label>
                        </div>
                    </button>
                </div>
                <a href="{{ route('admin.suggeriments') }}">
                    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Actualitzar">
                           <span class="glyphicon glyphicon-refresh"></span>
                    </button>
                </a>

                <!-- Single button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Accions
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Marcar com a llegits</a></li>
                        <li class="divider"></li>
                        <li class="text-center"><small class="text-muted">Tancar</small></li>
                    </ul>
                </div>
                <div class="pull-right">
                    <span class="text-muted"><b><!-- SI FICO PAGINACIÓ DESCOMENTAR AIXÒ $suggeriments->links() --></b></span>
                    <div class="btn-group btn-group-sm">
                        <!--
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </button>
                        -->
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-sm-3 col-md-2">
                <a href="#" class="btn btn-danger btn-sm btn-block" role="button">REDACTA</a>
                <hr />
                <ul class="nav nav-pills nav-stacked">
                    <li class="active">
                        <a href="#">Rebuts
                            <span class="badge pull-right">
                                {{ count($suggeriments) }}
                            </span>
                            <!-- ELS DOS FUNCIONEN, PERÒ PREFERIXO EL DE DALT, AMB BLADE -->
                            <?php /*$valor=count($suggeriments);echo $valor*/?>
                            <?php /*echo $suggeriments->count() */?>
                        </a>
                    </li>
                    <li><a>Enviats<span class="badge pull-right">12</span></a></li>
                    <li><a>Importants<span class="badge pull-right">3</span></a></li>
                    <li><a>SPAM<span class="badge pull-right">724</span></a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-md-10">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#suggeriments" data-toggle="tab"><span class="glyphicon glyphicon-inbox">
                </span>Suggeriments</a></li>
                    <li><a href="#errors" data-toggle="tab"><span class="glyphicon glyphicon-exclamation-sign"></span>
                            Errors</a></li>
                    <li><a href="#altres" data-toggle="tab"><span class="glyphicon glyphicon glyphicon-user"></span>
                            Altres</a></li>
                    <li><a href="#mes" data-toggle="tab"><span class="glyphicon glyphicon-plus no-margin">
                </span></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="suggeriments">
                        <div class="list-group">
                            @foreach($suggeriments as $suggeriment)
                                @if($suggeriment->type==0)
                                    <a href="#" class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                        <span class="name" style="min-width: 120px;
                                    display: inline-block;">{{ $suggeriment->user->email }}</span>
                                        <span class="text-muted" style="font-size: 11px;">- {{ $suggeriment->text }}.</span>
                                        <span class="badge">{{ Carbon\Carbon::parse($suggeriment->created_at)->diffForHumans() }}</span>
                                        <span class="pull-right">
                                            <span class="glyphicon glyphicon-paperclip"></span>
                                        </span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="errors">
                        <div class="list-group">
                            @foreach($suggeriments as $suggeriment)
                                @if($suggeriment->type==1)
                                    <a href="#" class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                        <span class="name" style="min-width: 120px;
                                        display: inline-block;">{{ $suggeriment->user->email }}</span>
                                        <span class="text-muted" style="font-size: 11px;">- {{ $suggeriment->text }}.</span>
                                        <span class="badge">{{ Carbon\Carbon::parse($suggeriment->created_at)->diffForHumans() }}</span>
                                        <span class="pull-right">
                                            <span class="glyphicon glyphicon-paperclip"></span>
                                        </span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="altres" data-target="#demo">
                        <div class="list-group">
                            @foreach($suggeriments as $suggeriment)
                                @if($suggeriment->type==2)
                                    <a href="#" class="list-group-item">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                        <span class="name" style="min-width: 120px;
                                        display: inline-block;">{{ $suggeriment->user->email }}</span>
                                        <span class="text-muted" style="font-size: 11px;">- {{ $suggeriment->text }}.</span>
                                        <span class="badge">{{ Carbon\Carbon::parse($suggeriment->created_at)->diffForHumans() }}</span>
                                        <span class="pull-right">
                                            <span class="glyphicon glyphicon-paperclip"></span>
                                        </span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div id="demo" class="collapse">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                    <div class="tab-pane fade in" id="mes">
                        Altres notes per a recordar.
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
