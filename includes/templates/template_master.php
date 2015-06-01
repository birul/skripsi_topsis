<!DOCTYPE HTML>
<html>
<head>
	<title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./assets/css/cosmo/bootstrap.min.css" />
	<link rel="stylesheet" href="./assets/css/jquery-ui-1.10.4.custom.css" />
	<link rel="stylesheet" href="./assets/plugins/dt_bootstrap/css/dataTables.bootstrap.css" />
	<link rel="stylesheet" href="./assets/plugins/select2.3/select2-bootstrap3.css" />
	<link rel="stylesheet" href="./assets/plugins/select2.3/select2.css" />
	<link rel="stylesheet" href="./assets/css/style.css" />
</head>
<body>
	
	<?php include BASEPATH . 'includes/templates/template_navbar.php';?>
	
	<div class="container-fluid">
		<?php require_once BASEPATH . 'includes/pages/page_' . PAGE_ACTIVE . '.php';?>		
	</div>
	
	<?php require_once BASEPATH . 'includes/templates/template_footer.php';?>
	<?php require_once BASEPATH . 'includes/templates/template_modal.php';?>
	
	<script src="./assets/js/jquery-1.11.0.min.js"></script>
	<script src="./assets/js/jquery-ui.min.js"></script>
	<script src="./assets/js/bootstrap.min.js"></script>
	<script src="./assets/plugins/dt_bootstrap/js/jquery.dataTables.min.js"></script>
	<script src="./assets/plugins/dt_bootstrap/js/dataTables.bootstrap.js"></script>
	<script src="./assets/plugins/select2.3/select2.js"></script>
	<script src="./assets/js/publicVars.js"></script>
	<script src="./assets/js/script.js"></script>
</body>
</html>
