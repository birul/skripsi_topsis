<?php

$errorName = '';

if($_POST)
{
	$templateEmpty = '<p class="help help-block help-error"><strong>%s</strong> cannot be empty</p>';
	$templateCustom = '<p class="help help-block help-error">%s</p>';
	
	if(!$db->p('criteria_name'))$errorName = sprintf($templateEmpty,'Criteria Name');
	
	$checkName = $db->o("SELECT COUNT(criteria_name) AS `name` FROM s_criteria WHERE criteria_name = '".$db->p('criteria_name')."' LIMIT 1");
	
	if($checkName->name > 0)$errorName = sprintf($templateCustom,'<strong>Code</strong> '.$db->p('criteria_name').' already exists');
	
	if( $errorName == '' )
	{
		$db->s('s_criteria',$_POST);
		$id = mysql_insert_id();
		$s = $db->r("SELECT alternative_id FROM s_alternative WHERE problem_id = ".APP_ID);
		foreach($s as $f)
		{
			$db->s('s_decision',array('alternative_id'=>$f->alternative_id,'criteria_id'=>$id,'problem_id'=>1));
		}
		header('location:?page=master_criteria');
		exit();
	}
	
}


