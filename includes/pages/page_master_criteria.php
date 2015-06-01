
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>
			<span class="glyphicon glyphicon-criteria"></span> Criteria list <small>&raquo; View all Criteria.</small>
			<a href="?page=master_criteria_add" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Add Criteria</a>
		</h2>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-condensed table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th>Nama Criteria</th>
						<th>Type</th>
						<th>Keterangan</th>
						<th>Actions</th>
					</tr>
				</thead>
				<?php require_once BASEPATH . 'includes/engine/get_criteria.php';?>
			</table>
		</div>
	</div>
	<div class="panel-footer"></div>
</div>
