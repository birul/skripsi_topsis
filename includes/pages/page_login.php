	
	<?php include BASEPATH . 'includes/engine/set_login.php';?>	
	<div class="container">

      <form class="form-signin" method="post" action="?page=login">
        <h2 class="form-signin-heading"><small class="glyphicon glyphicon-lock"></small> Sign in</h2>
        <?php echo $errorEmail;?>
        <input type="text" class="form-control" placeholder="Email address" autofocus name="email">
        <?php echo $errorPassword;?>
        <input type="password" class="form-control" placeholder="Password" name="password">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->

