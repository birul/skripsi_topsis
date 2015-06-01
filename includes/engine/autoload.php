<?php
include BASEPATH . 'includes/engine/connection.php';
include BASEPATH . 'includes/engine/query.php';
include BASEPATH . 'includes/engine/session.php';

$session = new session_user();

if(file_exists(BASEPATH . 'includes/engine/development_config.php'))
{
	include BASEPATH . 'includes/engine/development_config.php';	
}

include BASEPATH . 'includes/engine/ajax_admin.php';
