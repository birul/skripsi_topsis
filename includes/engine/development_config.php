<?php
$where_is = '';
$problem_id = isset($_COOKIE['problem_id']) ? $_COOKIE['problem_id']: 1;
if($problem_id > 0)
{
	$where_is = "WHERE problem_id = '".mysql_real_escape_string($problem_id)."' ";
}
$app = $db->o("SELECT * FROM s_problem {$where_is} ORDER BY problem_id DESC LIMIT 1");
if(isset($app->problem_id))
{
	define('APP_NAME' , $app->problem_name);
	define('APP_ID' , $app->problem_id);
}
else
{
	define('APP_NAME' , NULL);
	define('APP_ID',2);
}
