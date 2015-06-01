
<?php 
	if($db->p('criteria_weight') > 0)
	{
		$db->u('s_criteria',$_POST,"criteria_id = '".$db->g('criteria_id')."'");
		header('location:?page=bobot_criteria');
		exit();
	}
?>

<form action="<?php echo $_SERVER['REQUEST_URI'];?>" class="form-inline" method="post">
	<div class="form-group">
		Nilai Bobot Kriteria : 
		<input type="text" class="form-control" placeholder="Bobot kriteria" name="criteria_weight"/>
	</div>
</form>
