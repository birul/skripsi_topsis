<?php

$sql = "SELECT * FROM s_criteria WHERE problem_id = ".APP_ID;
foreach($db->r($sql) as $o)
{
	echo '
	<tr>
		<td>'.$o->criteria_name.'</td>
		<td>'.$o->criteria_type.'</td>
		<td>'.$o->criteria_weight.'</td>
		<td width="10">
			<a href="#modal" data-toggle="modal" data-url="?page=view_comparison&ajax=1&criteria_id='.$o->criteria_id.'" class="btn btn-info btn-xs" title="Update Bobot" data-title="Update bobot criteria" data-button="true">
				<span class="glyphicon glyphicon-pencil"></span>
			</a>		
		</td>
	</tr>';
}



