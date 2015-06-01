<?php
$id = $db->g('criteria_id');
if($db->p('criteria_id') > 0)
{
	$db->d('s_criteria',array('criteria_id'=>$id));
	header('location:?page=master_criteria');
	exit();
}
else
{
	echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
			<input type="hidden" value="'.$id.'" name="criteria_id" />
			<h3>Remove criteria ? <small>This action cannot me undone.</small></h3>
		</form>';
}
