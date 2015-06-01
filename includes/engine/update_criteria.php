<?php

$errorName = '';
$id = $db->g("criteria_id");
if($_POST)
{
	$templateEmpty = '<p class="help help-block help-error"><strong>%s</strong> cannot be empty</p>';
	$templateCustom = '<p class="help help-block help-error">%s</p>';
	
	if(!$db->p('criteria_name'))$errorName = sprintf($templateEmpty,'Criteria Name');
	
	$checkName = $db->o("SELECT COUNT(criteria_name) AS `name` FROM s_criteria WHERE criteria_name = '".$db->p('criteria_name')."' AND criteria_id != '{$id}' LIMIT 1");
	
	if($checkName->name > 0)$errorName = sprintf($templateCustom,'<strong>Code</strong> '.$db->p('criteria_name').' already exists');
	
	if( $errorName == '' )
	{
		$db->u('s_criteria',$_POST,"criteria_id = '{$id}'");
		header('location:?page=master_criteria');
		exit();
	}
	
}
$o = $db->o("SELECT * FROM s_criteria WHERE criteria_id = '{$id}' LIMIT 1");

