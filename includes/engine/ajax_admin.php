<?php

if(isset($_GET['ajax']) && (bool) $_GET['ajax'] === TRUE)
{
	require_once BASEPATH . 'includes/pages/page_' . PAGE_ACTIVE . '.php';
	exit();	
}
