<?php

$errorName = '';
$errorEmail = '';
$errorPassword = '';
$errorPassword2 = '';
$id = mysql_real_escape_string($_GET['user_id']);
if($_POST)
{
	$templateEmpty = '<p class="help help-block help-error"><strong>%s</strong> cannot be empty</p>';
	$templateCustom = '<p class="help help-block help-error">%s</p>';
	
	$check = $db->o("SELECT COUNT(user_email) AS email FROM s_user WHERE user_email = '".$db->p('user_email')."' AND user_id != '{$id}' LIMIT 1");
	
	if(!$db->p('user_name'))$errorName = sprintf($templateEmpty,'Full Name');
	
	if(!$db->p('user_email'))
	{
		$errorEmail = sprintf($templateEmpty,'Email');
	}
	else if($check->email > 0)
	{
		$errorEmail = sprintf($templateCustom,'<strong>Email</strong> '.$db->p('user_email').' already exists');
	}
	/*
	if(!$db->p('user_password'))
	{
		$errorPassword = sprintf($templateEmpty,'Password');
	}
	else if($db->p('user_password') != $db->p('user_password2'))
	{
		$errorPassword = sprintf($templateCustom,'<strong>Password</strong> and <strong>Confirm password</strong> did not match');
	}
	
	if(!$db->p('user_password2'))$errorPassword2 = sprintf($templateEmpty,'Confirm Password');
	*/
	$totalError = $errorName.$errorEmail.$errorPassword.$errorPassword2;
	
	if($totalError == '')
	{
		$db->u('s_user',$_POST,'user_id = \''.$id.'\'');
		header('location:?page=users');
		exit();
	}
	
}

$o = $db->o("SELECT * FROM s_user WHERE user_id = '{$id}' LIMIT 1");


