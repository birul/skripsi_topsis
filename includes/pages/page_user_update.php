<?php require BASEPATH . 'includes/engine/update_user.php'; ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>
					<span class="glyphicon glyphicon-user"></span> 
					Update User Account
					<a href="?page=users" class="btn btn-info"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
				</h2>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<fieldset>
						<legend>User info</legend>
						<div class="form-group">
							<label class="col-md-3">Full name * : </label>
							<div class="col-md-4"><input type="text" class="form-control" name="user_name" value="<?php echo $o->user_name;?>" /><?php echo $errorName;?></div>
						</div>
						<div class="form-group">
							<label class="col-md-3">Email * : </label>
							<div class="col-md-4"><input type="text" class="form-control" name="user_email" value="<?php echo $o->user_email;?>" /><?php echo $errorEmail;?></div>
						</div>
						<div class="form-group">
							<label class="col-md-3">Address : </label>
							<div class="col-md-6"><textarea name="user_address" id="" cols="30" rows="10" name="user_address" class="form-control"><?php echo $o->user_address;?></textarea></div>
						</div>
						<!--
						<div class="form-group">
							<label class="col-md-3">Password * : </label>
							<div class="col-md-4"><input type="password" name="user_password" class="form-control" /><?php echo $errorPassword;?></div>
						</div>
						<div class="form-group">
							<label class="col-md-3">Confirm password * : </label>
							<div class="col-md-4"><input type="password" name="user_password2" class="form-control" /><?php echo $errorPassword2;?></div>
						</div>
						-->
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
