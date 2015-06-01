<?php



$alternative = $db->r("SELECT * FROM s_alternative WHERE problem_id = ".APP_ID);
$data = array();

foreach($alternative as $o)
{

	$data[] =
	'<tr>
		<td>'.$o->alternative_code.'</td>
		<td>'.$o->alternative_name.'</td>
		<td>'.$o->alternative_description.'</td>
		<td>
			<a href="#modal" data-toggle="modal" class="btn btn-xs btn-danger" data-url="?page=drop_alternative&ajax=1&alternative_id='.$o->alternative_id.'" data-button="true" data-title="Delete this alternative ?" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
			<a href="?page=master_alternative_update&alternative_id='.$o->alternative_id.'" class="btn btn-xs btn-info" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
		</td>
	</tr>';
}

if($data)echo '<tbody>'.implode("\n",$data).'</tbody>';
