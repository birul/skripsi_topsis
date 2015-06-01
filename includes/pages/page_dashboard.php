<div class="jumbotron">
	<h1>Hello admin... <small>welcome to dashboard</small> </h1>
	
	<div class="alert text-center">
		<span class="glyphicon glyphicon-pencil"></span>
		SISTEM PENUJANG KEPUTUSAN <?php if(defined('APP_NAME'))echo strtoupper(APP_NAME);?> DENGAN METODE <strong>TOPSIS</strong>
	</div>
	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<p>
				<a href="?page=master_alternative" class="btn btn-warning btn-lg btn-block"><span class="glyphicon glyphicon-user"></span> ALTERNATIF</a>
				<a href="?page=master_criteria" class="btn btn-danger btn-lg btn-block"><span class="glyphicon glyphicon-eye-open"></span> KRITERIA</a>	
			</p>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<p>
				<a href="?page=keputusan" class="btn btn-info btn-lg btn-block"><span class="glyphicon glyphicon-ok"></span> KEPUTUSAN</a>
				<a href="?page=bobot_criteria" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-tasks"></span> BOBOT KRITERIA</a>
			</p>
		</div>
		<div class="col-md-12">
			<p>
				<a href="?page=hasil_analisa" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-stats"></span> HASIL ANALISA</a>
			</p>
		</div>
	</div>
</div>

