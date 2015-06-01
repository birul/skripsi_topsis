<?php
$errorPassword1 = '';
$errorPassword2 = '';
$errorPassword3 = '';

if($_POST && isset($_POST['user_password1']))
{
	
	$templateEmpty = '<p class="help help-block help-error"><strong>%s</strong> cannot be empty.</p>';
	$templateCustom = '<p class="help help-block help-error">%s.</p>';
	
	
	
	if(!$session->p('user_password1'))
	{
		$errorPassword1 = sprintf($templateEmpty,'Old password');
	}
	else
	{
		$c = $db->o("SELECT COUNT(*) AS rows FROM s_user WHERE user_id = '{$c->user_id}' AND user_password = MD5('{$_POST['user_password1']}') ");
		
		if($c->rows < 1)$errorPassword1 = sprintf($templateCustom,'Wrong <strong>Old password</strong>');
	}
	
	if(!$session->p('user_password2'))$errorPassword2 = sprintf($templateEmpty,'New password');
	
	if(!$session->p('user_password3'))$errorPassword3 = sprintf($templateEmpty,'Confirm new password');
	
	if($session->p('user_password2') != $session->p('user_password3'))$errorPassword3 = sprintf($templateCustom,'Confirm password did not match.');
		
	if($errorPassword1.$errorPassword2.$errorPassword3 == '')
	{
		$db->u('s_user',array('user_password'=>md5($_POST['user_password2'])),"user_id = '{$session->data->user_id}'");
		header('location:?page=login&success=password');
		exit();
	}
}
