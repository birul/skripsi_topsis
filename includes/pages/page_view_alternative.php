<?php
$id = $db->g('alternative_id');
$field = "alternative_id";
if(isset($_GET["alternative_code"]))
{
	$field = "alternative_code";
	$id = $db->g($field);
}
$o = $db->o("SELECT * FROM s_alternative WHERE {$field} = '{$id}' AND problem_id = 1 LIMIT 1");

?>
<form action="" class="form-horizontal">
	<div class="form-group">
		<label class="col-md-3">Kode alternative : </label>
		<div class="col-md-8"><input type="text" class="form-control" disabled="disabled" value="<?php echo $o->alternative_code;?>"/></div>
	</div>
	<div class="form-group">
		<label class="col-md-3">Nama Alternative : </label>
		<div class="col-md-8"><input type="text" class="form-control" disabled="disabled" value="<?php echo $o->alternative_name;?>"/></div>
	</div>
	<div class="form-group">
		<label class="col-md-3">Keterangan : </label>
		<div class="col-md-8"><textarea readonly class="form-control"><?php echo $o->alternative_description;?></textarea></div>
	</div>
</form>
