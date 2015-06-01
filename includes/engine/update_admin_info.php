<?php
$c = $session->data;
$errorName = '';
$errorEmail = '';
$info = 'Update your info';
if(isset($_GET['success']) && $_GET['success'] == 'info')$info = '<strong>Your info has been changed.</strong>';
if($_POST && isset($_POST['user_email']))
{
	$templateEmpty = '<p class="help help-block help-error"><strong>%s</strong> cannot be empty.</p>';
	if(!$session->p('user_name'))$errorName = sprintf($templateEmpty,'Full name');
	
	if(!$session->p('user_email'))$errorEmail = sprintf($templateEmpty,'Email');
	
	if($errorEmail.$errorName == '')
	{
		$db->u('s_user',$_POST,"user_id = '{$c->user_id}'");
		header('location:?page=admin_account&success=info');
		exit();
	}
	
}

$o = $db->o("SELECT * FROM s_user WHERE user_id = '{$c->user_id}' LIMIT 1");
