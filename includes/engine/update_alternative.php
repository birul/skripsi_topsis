<?php

$errorCode = '';
$errorName = '';
$id = $db->g('alternative_id');
if($_POST)
{
	$templateEmpty = '<p class="help help-block help-error"><strong>%s</strong> cannot be empty</p>';
	$templateCustom = '<p class="help help-block help-error">%s</p>';
	
	if(!$db->p('alternative_name'))$errorName = sprintf($templateEmpty,'Alternative Name');
	
	if(!$db->p('alternative_code'))$errorCode = sprintf($templateEmpty,'Alternative Code');
	
	$checkCode = $db->o("SELECT COUNT(alternative_code) AS code FROM s_alternative WHERE alternative_code = '".$db->p('alternative_code')."' AND alternative_name = '".$db->p('alternative_name')."' AND alternative_id != '{$id}' LIMIT 1");
	
	if($checkCode->code > 0)$errorCode = sprintf($templateCustom,'<strong>Code</strong> '.$db->p('alternative_code').' already exists');
	
		
	$totalError = $errorName.$errorCode;
	
	if($totalError == '')
	{
		$db->u('s_alternative',$_POST,"alternative_id = '{$id}'");
		header('location:?page=master_alternative');
		exit();
	}
	
}

$o = $db->o("SELECT * FROM s_alternative WHERE alternative_id = '{$id}' LIMIT 1");
