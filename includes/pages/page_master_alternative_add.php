<?php require BASEPATH . 'includes/engine/save_alternative.php'; ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>
					<span class="glyphicon glyphicon-user"></span> 
					Create New Alternative
					<a href="?page=master_alternative" class="btn btn-info"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
				</h2>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<fieldset>
						<legend>Alternative info</legend>
						<input type="hidden" name="problem_id" value="<?php echo APP_ID;?>" />
						<div class="form-group">
							<label class="col-md-3">Kode Alternative * : </label>
							<div class="col-md-4"><input type="text" class="form-control" name="alternative_code" value="<?php echo $db->p('alternative_code');?>" /><?php echo $errorCode;?></div>
						</div>
						<div class="form-group">
							<label class="col-md-3">Nama Alternative * : </label>
							<div class="col-md-4"><input type="text" class="form-control" name="alternative_name" value="<?php echo $db->p('alternative_name');?>" /><?php echo $errorName;?></div>
						</div>
						<div class="form-group">
							<label class="col-md-3">Keterangan : </label>
							<div class="col-md-6"><textarea name="alternative_description" id="" cols="30" rows="10" name="alternative_description" class="form-control"><?php echo $db->p('alternative_description');?></textarea></div>
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
