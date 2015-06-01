<?php
$id = $db->g('alternative_id');
if($db->p('alternative_id') > 0)
{
	$db->d('s_alternative',array('alternative_id'=>$id));
	header('location:?page=master_alternative');
	exit();
}
else
{
	echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
			<input type="hidden" value="'.$id.'" name="alternative_id" />
			<h3>Remove alternative ? <small>This action cannot me undone.</small></h3>
		</form>';
}
