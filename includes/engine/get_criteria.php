<?php



$criteria = $db->r("SELECT * FROM s_criteria WHERE problem_id = ".APP_ID);
$data = array();

foreach($criteria as $o)
{

	$data[] =
	'<tr>
		<td>'.$o->criteria_name.'</td>
		<td>'.$o->criteria_type.'</td>
		<td>'.$o->criteria_description.'</td>
		<td>
			<a href="#modal" data-toggle="modal" class="btn btn-xs btn-danger" data-url="?page=drop_criteria&ajax=1&criteria_id='.$o->criteria_id.'" data-button="true" data-title="Delete this criteria ?" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
			<a href="?page=master_criteria_update&criteria_id='.$o->criteria_id.'" class="btn btn-xs btn-info" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
		</td>
	</tr>';
}

if($data)echo '<tbody>'.implode("\n",$data).'</tbody>';
