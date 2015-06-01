
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>
			<span class="glyphicon glyphicon-alternative"></span> Alternative list <small>&raquo; View all alternative.</small>
			<a href="?page=master_alternative_add" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Add alternative</a>
		</h2>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-condensed table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th>Kode Alternative</th>
						<th>Nama Alternative</th>
						<th>Keterangan</th>
						<th>Actions</th>
					</tr>
				</thead>
				<?php require_once BASEPATH . 'includes/engine/get_alternative.php';?>
			</table>
		</div>
	</div>
	<div class="panel-footer"></div>
</div>
