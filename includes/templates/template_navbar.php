<?php 
$sess = session_user::using();

?><nav class="navbar navbar-default" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle <?php if(PAGE_ACTIVE == 'login')echo 'hide';?>" data-toggle="collapse" data-target=".navbar-ex1-collapse:first">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="./" style="color:#FFFF00;"><em>TOPSIS</em></a>
			</div>
			<?php if(PAGE_ACTIVE != 'login'):?>
			<?php if($sess->data->user_id == 777):?>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="?page=">New Messages</a></li>
					<li><a href="?page=login">Logout</a></li>
				</ul>
			</div>
			<?php else:?>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
				  <li class="<?php echo (PAGE_ACTIVE == 'dashboard')?'active':'';?>"><a href="./">Dashboard</a></li>
				  <li class="dropdown <?php echo (in_array(PAGE_ACTIVE,array(
				  		'master_criteria',
				  		'master_criteria_add',
				  		'master_criteria_update',
				  		'master_alternative',
				  		'master_alternative_add',
				  		'master_alternative_update',
				  		'users',
				  		'user_add',
				  		'user_update'
				  		)))?'active':'';?>">
				    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Master <b class="caret"></b></a>
				    <ul class="dropdown-menu">
				      <li><a href="?page=master_alternative">Alternative</a></li>
				      <li><a href="?page=master_criteria">Kriteria</a></li>
				      <li><a href="?page=users">User</a></li>
				    </ul>
				  </li>
				  <li class="<?php echo (PAGE_ACTIVE == 'bobot_criteria')?'active':'';?>">
				    <a href="?page=bobot_criteria">Bobot Kriteria</a>
				  </li>
				  <li class="<?php echo (PAGE_ACTIVE == 'keputusan')?'active':'';?>">
				    <a href="?page=keputusan">Keputusan</a>
				  </li>
				  <li class="<?php echo (PAGE_ACTIVE == 'hasil_analisa')?'active':'';?>">
				    <a href="?page=hasil_analisa">Hasil Analisa</a>
				  </li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				  <li class="dropdown <?php echo (in_array(PAGE_ACTIVE,array('admin_settings','admin_account')))?'active':'';?>">
				    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
				    <ul class="dropdown-menu">
				      <li class="hide"><a href="?page=admin_settings"><span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
				      <li><a href="?page=admin_account"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
				      <li><a href="?page=login"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				    </ul>
				  </li>
				</ul>
			<?php endif;?>
			<?php endif;?>
			
	</div>
</nav>
