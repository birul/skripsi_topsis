
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>
			<span class="glyphicon glyphicon-user"></span> User list <small>&raquo; View all users.</small>
			<a href="?page=user_add" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Add user</a>
		</h2>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-condensed table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th>Full Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Actions</th>
					</tr>
				</thead>
				<?php require_once BASEPATH . 'includes/engine/get_user.php';?>
			</table>
		</div>
	</div>
	<div class="panel-footer"></div>
</div>
