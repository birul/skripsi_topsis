<?php

$errorCode = '';
$errorName = '';
if($_POST)
{
	$templateEmpty = '<p class="help help-block help-error"><strong>%s</strong> cannot be empty</p>';
	$templateCustom = '<p class="help help-block help-error">%s</p>';
	
	if(!$db->p('alternative_name'))$errorName = sprintf($templateEmpty,'Alternative Name');
	
	if(!$db->p('alternative_code'))$errorCode = sprintf($templateEmpty,'Alternative Code');
	
	$checkCode = $db->o("SELECT COUNT(alternative_code) AS code FROM s_alternative WHERE alternative_code = '".$db->p('alternative_code')."' AND alternative_name = '".$db->p('alternative_name')."' LIMIT 1");
	
	if($checkCode->code > 0)$errorCode = sprintf($templateCustom,'<strong>Code</strong> '.$db->p('alternative_code').' already exists');
	
		
	$totalError = $errorName.$errorCode;
	
	if($totalError == '')
	{
		$db->s('s_alternative',$_POST);
		$id = mysql_insert_id();
		$s = $db->r("SELECT criteria_id FROM s_criteria WHERE problem_id = ".APP_ID);
		foreach($s as $f)
		{
			$db->s('s_decision',array('alternative_id'=>$id,'criteria_id'=>$f->criteria_id,'problem_id'=>1));
		}
		header('location:?page=master_alternative');
		exit();
	}
	
}


