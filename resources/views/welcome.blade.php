<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="{{ asset('favicon/favicon.png') }}">

	@include('sweet::alert')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="assets/img/favicon.png">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<title>Usuaris Ismail</title>

	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="assets/css/main.css" rel="stylesheet">

	<!-- Fonts from Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
	</script>
</head>

<body>

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url('/') }}"><b>USUARIS.IS</b></a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				@if (Auth::guest())
					<li><a href="{{ url('/login') }}">Entra</a></li>
					<li><a href="{{ url('/register') }}">Registra't</a></li>
				@else
					<li><a href="{{ url('/usuaris/'.Auth::user()->id) }}">El meu perfil - {{ Auth::user()->name }}</a></li>
				@endif
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>

<div id="headerwrap">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h1>El millor sistema<br/>
					de gestió d'usuaris.</h1>
				<h1>La pàgina encara està en desenvolupament, però ja la pots utilitzar.<br/></h1>
				<div class="progress">
					<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%;">
						<span class="sr-only"></span>
					</div>
				</div>
			</div><!-- /col-lg-6 -->
			<div class="col-lg-6">
				<img class="img-responsive" src="assets/img/ipad-hand.png" alt="">
			</div><!-- /col-lg-6 -->

		</div><!-- /row -->
	</div><!-- /container -->
</div><!-- /headerwrap -->


<div class="container">
	<div class="row mt centered">
		<div class="col-lg-6 col-lg-offset-3">
			<h1>Creada amb el framework<br/><span style="color: #f4645f; font-size: larger"> Laravel.</span></h1>
			<h3>Entre moltes coses, la nostra pàgina ha estat creada gràcies a:</h3>
		</div>
	</div><!-- /row -->

	<div class="row mt centered">

		<div class="col-lg-4">
			<img src="assets/img/php.png" width="180" alt="">
			<h4>Llenguatge PHP</h4>
			<p>
				PHP és el llenguatge de programació que hem utilitzat per a construir
				<span style="font-size: larger; color: #3498db;font-weight:bold">Usuar.is</span>.
			</p>
		</div><!--/col-lg-4 -->

		<div class="col-lg-4">
			<img src="assets/img/laravel.png" width="180" alt="laravel">
			<h4>Laravel</h4>
			<p>
				Laravel és el <span style="color: #f4645f;font-weight:bold">framework més utilitzat</span> per al llenguatge <span style="color: #3498db;font-weight:bold">PHP</span> el qual ens encanta!
			</p>

		</div><!--/col-lg-4 -->

		<div class="col-lg-4">
			<img src="assets/img/esforc.png" width="180" alt="esforç">
			<h4>Il·lusió i esforç!</h4>
			<p><span style="color: #D72638; font-weight: bold">L'esforç</span> i la nostra <span style="color: #3DA5D9; font-weight: bold">il·lusió</span> ha estat un dels pilars alhora de crear aquesta pàgina.</p>

		</div><!--/col-lg-4 -->
	</div><!-- /row -->
</div><!-- /container -->

<div class="container">
	<!--<hr>-->
	<div class="row centered">
		<div class="col-lg-6 col-lg-offset-3">
			<!--
			<form class="form-inline" role="form">
				<h3>Ens posem en contacte amb tú.</h3>
				<div class="form-group">
					<input type="email" class="form-control" id="exampleInputEmail1" placeholder="ismaildidouch@iesmontsia.org">
				</div>
				<button type="submit" class="btn btn-warning btn-lg">Tinc una pregunta</button>
			</form>
			-->
		</div>
		<div class="col-lg-3"></div>
	</div><!-- /row -->
	<hr>
</div><!-- /container -->

<div class="container">
	<div class="row mt centered">
		<div class="col-lg-6 col-lg-offset-3">
			<h1>Uneix-te!</h1>
			<h3>Una xarxa social creada per alumnes<br> i feta per a alumnes! </h3>
			<h1>ESBORRAR AQUEST H1 I FICAR IMATGES DEL SISTEMA DE GESTIÓ</h1>
		</div>
	</div><!-- /row -->

	<! -- CAROUSEL -->
	<div class="row mt centered">
		<div class="col-lg-6 col-lg-offset-3">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<img src="assets/img/p01.png" alt="">
					</div>
					<div class="item">
						<img src="assets/img/p02.png" alt="">
					</div>
					<div class="item">
						<img src="assets/img/p03.png" alt="">
					</div>
				</div>
			</div>
		</div><!-- /col-lg-8 -->
	</div><!-- /row -->
</div><! --/container -->
<hr>
<div class="container">
	<div class="row mt centered">
		<div class="col-lg-6 col-lg-offset-3">
			<h1>Aquests som nosaltres<br/>Som el grup1 d'M7.</h1>
			<h3>Company, company, i li va fotre la dona.</h3>
		</div>
	</div><!-- /row -->

	<div class="row mt centered">
		<div class="col-lg-4">
			<img class="img-circle" src="assets/img/pic1.jpg" width="140" alt="">
			<h4>Michael Robson</h4>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
			<p><i class="glyphicon glyphicon-send"></i> <i class="glyphicon glyphicon-phone"></i> <i class="glyphicon glyphicon-globe"></i></p>
		</div><!--/col-lg-4 -->

		<div class="col-lg-4">
			<img class="img-circle" src="assets/img/me.png" width="140" alt="">
			<h4>Ismail Didouh</h4>
			<p>Desenvolupador del front-end i del backend d'aquesta pàgina.</p>
			<p><i class="glyphicon glyphicon-send"></i> <i class="glyphicon glyphicon-phone"></i> <i class="glyphicon glyphicon-globe"></i></p>
		</div><!--/col-lg-4 -->

		<div class="col-lg-4">
			<img class="img-circle" src="assets/img/pic3.jpg" width="140" alt="">
			<h4>Angelica Finning</h4>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
			<p><i class="glyphicon glyphicon-send"></i> <i class="glyphicon glyphicon-phone"></i> <i class="glyphicon glyphicon-globe"></i></p>
		</div><!--/col-lg-4 -->
	</div><!-- /row -->
</div><!-- /container -->

<div class="container">
	<div class="row centered">

		<div class="col-lg-3"></div>
	</div><!-- /row -->
	<hr>
	<p class="centered">Aquesta plantilla ha estat creada per BlackTie.co, un crack - Attribution License 3.0 - 2013</p>
</div><!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
