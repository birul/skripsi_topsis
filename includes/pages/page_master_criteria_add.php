<?php require BASEPATH . 'includes/engine/save_criteria.php'; ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>
					<span class="glyphicon glyphicon-user"></span> 
					Create New Criteria
					<a href="?page=master_criteria" class="btn btn-info"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
				</h2>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<fieldset>
						<legend>Criteria info</legend>
						<input type="hidden" name="problem_id" value="<?php echo APP_ID;?>" />
						<div class="form-group">
							<label class="col-md-3">Type Criteria * : </label>
							<div class="col-md-4">
								<select name="criteria_type" id="" class="form-control">
									<option value="benefit">Benefit</option>
									<option value="cost">Cost</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3">Nama Criteria * : </label>
							<div class="col-md-4"><input type="text" class="form-control" name="criteria_name" value="<?php echo $db->p('criteria_name');?>" /><?php echo $errorName;?></div>
						</div>
						<div class="form-group">
							<label class="col-md-3">Keterangan : </label>
							<div class="col-md-6"><textarea name="criteria_description" id="" cols="30" rows="10" name="criteria_description" class="form-control"><?php echo $db->p('criteria_description');?></textarea></div>
						</div>
						<div class="form-group">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<button class="btn btn-info" type="submit">
									<span class="glyphicon glyphicon-ok"></span>
									Save
								</button>
								<button class="btn btn-default" type="reset">
									<span class="glyphicon glyphicon-refresh"></span>
									Reset
								</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="panel-footer"></div>
		</div>
