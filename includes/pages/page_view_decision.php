<?php 
if($db->p('decision_point') > 0)
{
	$db->u('s_decision',$_POST,"decision_id = '".$db->g('decision_id')."'");
	header('location:?page=keputusan');
	exit();
}
?>

<form action="<?php echo $_SERVER['REQUEST_URI'];?>" class="form-horizontal" method="post">
<?php 
	$id = $db->g('decision_id');
	$o = $db->o("
			SELECT 
				s_criteria.criteria_name,
				s_criteria.criteria_type,
				s_decision.*
			FROM s_decision 
			LEFT JOIN s_criteria
				ON  s_criteria.criteria_id = s_decision.criteria_id
				WHERE s_decision.decision_id = '{$id}' 
				AND s_decision.problem_id = 1 
				LIMIT 1");
	
		echo '
		<div class="form-group">
			<label class="col-md-3 control-label" style="text-align:right">'.$o->criteria_name.' :</label>
			<div class="col-md-9">
				<input 
				type="text" 
				class="form-control" 
				name="decision_point" 
				placeholder="'.$o->criteria_type.'" 
				maxlength="4"
				value="'.$db->g("point").'" />
			</div>
		</div>
		';

?>
</form>