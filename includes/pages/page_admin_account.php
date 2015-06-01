<?php include BASEPATH.'includes/engine/update_admin_info.php';?>
<?php include BASEPATH.'includes/engine/update_admin_password.php';?>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-ld-6">
		<div class="panel panel-default">
			<div class="panel-heading"><h2><span class="glyphicon glyphicon-user"></span> Update Account Info</h2></div>
			<div class="panel-body">
				<form action="?page=admin_account" class="form-horizontal" method="post">
					<fieldset>
						<legend><?php echo $info;?></legend>
						<div class="form-group">
							<label class="col-md-12">Full name * : <?php echo $errorName;?></label>
							<div class="col-md-12"><input type="text" class="form-control" name="user_name" value="<?php echo $o->user_name;?>" /></div>
						</div>
						<div class="form-group">
							<label class="col-md-12">Email * :  <?php echo $errorEmail;?></label>
							<div class="col-md-12"><input type="text" class="form-control" name="user_email" value="<?php echo $o->user_email;?>" /></div>
						</div>
						<div class="form-group">
							<label class="col-md-12">Address : </label>
							<div class="col-md-12"><textarea name="user_address" cols="30" rows="10" class="form-control"><?php echo $o->user_address;?></textarea></div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
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
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-ld-6">
		<div class="panel panel-default">
			<div class="panel-heading"><h2><span class="glyphicon glyphicon-lock"></span> Update Password</h2></div>
			<div class="panel-body">
				<form action="?page=admin_account" class="form-horizontal" method="post">
					<fieldset>
						<legend>Change password </legend>
						<div class="form-group">
							<label class="col-md-12">Old password * : <?php echo $errorPassword1;?></label>
							<div class="col-md-12"><input type="password" class="form-control" name="user_password1" /></div>
						</div>
						<div class="form-group">
							<label class="col-md-12">New password * : <?php echo $errorPassword2;?></label>
							<div class="col-md-12"><input type="password" class="form-control" name="user_password2" /></div>
						</div>
						<div class="form-group">
							<label class="col-md-12">Confirm new password * : <?php echo $errorPassword3;?></label>
							<div class="col-md-12"><input type="password" class="form-control" name="user_password3" /></div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
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
	</div>
</div>

