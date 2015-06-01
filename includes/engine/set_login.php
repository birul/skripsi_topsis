<?php 

$errorEmail = '';
$errorPassword = '';

if(isset($_GET['success']) && $_GET['success'] == 'password')$errorEmail = '<p class="help help-block help-error"><strong>Password</strong> has been changed.</p>';

if($_POST)
{
	$templateEmpty = '<p class="help help-block help-error"><strong>%s</strong> cannot be empty.</p>';
	if(!$session->p('email'))$errorEmail = sprintf($templateEmpty,'Email');

	if(!$session->p('password'))$errorPassword = sprintf($templateEmpty,'Password');
	
	
	if($errorEmail.$errorPassword == '')
	{		
		if(!$session->check())
		{
			$errorEmail = '<p class="help help-block help-error">Wrong <strong>Email or password.</strong></p>';
		}
		else
		{
			header('location:?page=dashboard');
			exit();
		}
	}
}