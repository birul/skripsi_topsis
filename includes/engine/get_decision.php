<?php

$alternative = $db->r("SELECT * FROM s_alternative WHERE problem_id = ".APP_ID);
$data = array();

foreach($alternative as $o)
{

	$Q = $db->r("SELECT * FROM s_criteria WHERE problem_id = ".APP_ID);
	$decision = array();
	foreach($Q as $d)
	{
		$p = $db->o("SELECT * FROM s_decision WHERE criteria_id = '{$d->criteria_id}' AND alternative_id = '{$o->alternative_id}' AND problem_id = 1 LIMIT 1");
		
		$point = isset($p->decision_point) ? (double) $p->decision_point : 0;
		
		$decision[] = '
				<li>
					<a href="#modal" 
							title="Tentukan Nilai Keputusan untuk alternative '.$o->alternative_name.' [ '.$o->alternative_code.' ]"
							data-url="?page=view_decision&ajax=1&decision_id='.$p->decision_id.'&point='.$point.'" 
							data-toggle="modal" 
							data-button="true" 
							data-title="Penentuan Nilai Keputusan untuk alternative '.$o->alternative_name.' [ '.$o->alternative_code.' ]">
						<span class="badge pull-right">
							'.$point.'
							'.$d->criteria_type.'s
						</span>
						<span class="glyphicon glyphicon-pencil"></span> 
						'.$d->criteria_name.'
					</a>
				</li>';
	}
	$data[] =
	'<tr>
		<td>
			<a href="#modal" 
			data-toggle="modal" 
			title="Lihat detail alternative" 
			data-url="?page=view_alternative&ajax=1&alternative_id='.$o->alternative_id.'"
			data-large="true"
			data-title="Detail alternative">
				'.$o->alternative_code.'
			</a>
		</td>
		<td><ul class="nav-table">'.implode("\n",$decision).'</ul></td>
	</tr>';
}

if($data)echo '<tbody>'.implode("\n",$data).'</tbody>';
