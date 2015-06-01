<?php

$user = $db->r("SELECT * FROM s_user WHERE user_id != '{$session->data->user_id}'");
$data = array();

foreach($user as $o)
{

	$data[] =
	'<tr>
		<td>'.$o->user_name.'</td>
		<td>'.$o->user_email.'</td>
		<td>'.$o->user_address.'</td>
		<td>
			<a href="#modal" data-toggle="modal" class="btn btn-xs btn-danger" data-url="?page=drop_user&ajax=1&user_id='.$o->user_id.'" data-button="true" data-title="Delete this cv?" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
			<a href="?page=user_update&user_id='.$o->user_id.'" class="btn btn-xs btn-info" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
		</td>
	</tr>';
}

if($data)echo '<tbody>'.implode("\n",$data).'</tbody>';

