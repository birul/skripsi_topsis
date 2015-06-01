<?php include BASEPATH . 'includes/engine/core_engine.php';?>
<!-- DATA MASTER -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>
			<span class="glyphicon glyphicon-align-left"></span> Nilai keputusan alternative untuk setiap kriteria
		</h4>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
		
			<table class="table table-condensed table-standard table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th rowspan="3" style="vertical-align: middle;" class="text-center">Alternative</th>
						<th colspan="<?php echo $topsis->retreiveCriteria('count')?>" style="vertical-align: middle;">Kriteria <?php echo APP_NAME;?></th>
					</tr>
					<tr>
						<th class="text-center"><?php
							$title = $topsis->retreiveCriteria('name'); 
							if($title)echo implode("</th><th class=\"text-center\">",$title);
							?></th>
					</tr>
					<tr>
						<th class="text-center"><?php
							$type = $topsis->retreiveCriteria('type'); 
							if($type)echo "( ".implode(" )</th><th class=\"text-center\">( ",$type)." )";
							?></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th class="text-center">Bobot</th>
						<th class="text-right"><?php
							$weight = $topsis->retreiveCriteria('weight'); 
							if($weight)echo implode(" </th><th class=\"text-right\">",$weight);
							?></th>
					</tr>
				</tfoot>
				<tbody>
					<?php 
						$dataAlternative = $topsis->retreiveAlternative();
						if($dataAlternative)
						{
							foreach($dataAlternative as $alternative => $criteria)
							{
								echo '
								<tr>
									<td>
										<a href="#modal" 
										data-toggle="modal" 
										title="Lihat detail alternative" 
										data-url="?page=view_alternative&ajax=1&alternative_code='.$alternative.'"
										data-large="true"
										data-title="Detail alternative">
										'.$alternative.'
										</a>
									</td>
									<td class="text-right">'.implode("</td><td class=\"text-right\">",$criteria).'</td>
								</tr>';
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- MATRIX TERNORMALISASI R -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>
			<span class="glyphicon glyphicon-random"></span> Matriks ternormalisasi
		</h4>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
		
			<table class="table table-condensed table-standard table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th rowspan="3" style="vertical-align: middle;" class="text-center">Alternative</th>
						<th colspan="<?php echo $topsis->retreiveCriteria('count')?>" style="vertical-align: middle;">Kriteria <?php echo APP_NAME;?></th>
					</tr>
					<tr>
						<th class="text-center"><?php
							$title = $topsis->retreiveCriteria('name'); 
							if($title)echo implode("</th><th class=\"text-center\">",$title);
							?></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$dataR = $topsis->getR();
						if($dataR)
						{
							foreach($dataR as $alternative => $R)
							{
								echo '
								<tr>
									<td>'.$alternative.'</td>
									<td class="text-right">'.implode("</td><td class=\"text-right\">",$R).'</td>
								</tr>';
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- MATRIX TERNORMALISASI Y -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>
			<span class="glyphicon glyphicon-resize-vertical"></span> Matriks ternormalisasi terbobot
		</h4>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
		
			<table class="table table-condensed table-standard table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th rowspan="3" style="vertical-align: middle;" class="text-center">Alternative</th>
						<th colspan="<?php echo $topsis->retreiveCriteria('count')?>" style="vertical-align: middle;">Kriteria <?php echo APP_NAME;?></th>
					</tr>
					<tr>
						<th class="text-center"><?php
							$title = $topsis->retreiveCriteria('name'); 
							if($title)echo implode("</th><th class=\"text-center\">",$title);
							?></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$dataY = $topsis->getY();
						if($dataY)
						{
							foreach($dataY as $alternative =>$Y)
							{
								echo '
								<tr>
									<td>'.$alternative.'</td>
									<td class="text-right">'.implode("</td><td class=\"text-right\">",$Y).'</td>
								</tr>';
							}
						}
					?>
				</tbody>
			</table>
			
		</div>
	</div>
</div>

<!-- SOLUSI POSITIF (A +) -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>
			<span class="glyphicon glyphicon-plus"></span> Solusi ideal positif (A<sup>+</sup>)
		</h4>
	</div>
	<div class="panel-body">
		<pre style="font-weight:bold;">
			<?php 
				$dataY = $topsis->getYInverse();
				if($dataY)
				{
					$n = 0;
					$totalMax = array();
					foreach($dataY as $X => $Y)
					{
						$n++;
						$o = implode("; ",$Y);
						$t = max($Y);
						if(strtok($X,'-') == 'cost')$t = min($Y);
						$totalMax[] = $t;
						
						echo "\nY<sub>{$n}</sub><sup>+</sup> = max { {$o} } = {$t}<br />";
					}
					$result = implode("; ",$totalMax);
					echo "<hr />A<sup>+</sup> = { {$result} } ";
				}
			?>
		</pre>
	</div>
</div>



<!-- SOLUSI (A -) -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>
			<span class="glyphicon glyphicon-minus"></span> Solusi ideal negatif (A<sup>-</sup>)
		</h4>
	</div>
	<div class="panel-body">
		<pre style="font-weight:bold;">
			<?php 
			$dataY = $topsis->getYInverse();
			if($dataY)
			{
				$n = 0;
				$totalMin = array();
				$min = array();
				foreach($dataY as $X => $Y)
				{
					$n++;
					$o = implode("; ",$Y);
					$t = min($Y);
					if(strtok($X,'-') == 'cost')$t = max($Y);
					$totalMin[] = $t;
					
					echo "\nY<sub>{$n}</sub><sup>-</sup> = min { {$o} } = {$t}<br />";
				}
				$result = implode("; ",$totalMin);
				echo "<hr />A<sup>-</sup> = { {$result} } ";
			}
		?>
		</pre>
	</div>
</div>

<!-- JARAK IDEAL POSITIF  -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>
			<span class="glyphicon glyphicon-plus"></span> Jarak antara nilai terbobot setiap alternatif untuk solusi ideal positif (S<sub>i</sub><sup>+</sup>)
		</h4>
	</div>
	<div class="panel-body">
		<pre style="font-weight: bold;">
			<?php 
			
			$dataR = $topsis->getY();
			if($dataR)
			{
				$sub = 0;
				$n = 0;
				$dMax = array();
				foreach($dataR as $alternative => $R)
				{
					$sub = 0;
					foreach($R as $x => $r)
					{
						$sub += (($totalMax[$x] - $r) * ($totalMax[$x] - $r));
					}
					$totalSub = sqrt($sub);
					$n++;
					echo "\nD<sub>{$n}<sup>+</sup></sub> = {$totalSub}";
					$dMax[$n] = $totalSub;
				}
			}
			?>
		</pre>
	</div>
</div>




<!-- JARAK IDEAL NEGATIF  -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>
			<span class="glyphicon glyphicon-plus"></span> Jarak antara nilai terbobot setiap alternatif untuk solusi ideal negatif (S<sub>i</sub><sup>-</sup>)
		</h4>
	</div>
	<div class="panel-body">
		<pre style="font-weight: bold;">
			<?php 
			
			$dataR = $topsis->getY();
			if($dataR)
			{
				$n=0;
				$sub = 0;
				$dMin = array();
				foreach($dataR as $alternative => $R)
				{
					$sub = 0;
					foreach($R as $x => $r)
					{
						$sub += (($totalMin[$x] - $r) * ($totalMin[$x] - $r));
					}
					$totalSub = sqrt($sub);
					$n++;
					echo "\nD<sub>{$n}</sub><sup>-</sup> = {$totalSub}";
					$dMin[$n] = $totalSub;
				}
			}
			?>
		</pre>
	</div>
</div>



<!-- KEDEKATAN SOLUSI IDEAL  -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>
			<span class="glyphicon glyphicon-stats"></span> Kedekatan setiap alternatif terhadap solusi ideal
		</h4>
	</div>
	<div class="panel-body">
		<pre style="font-weight:bold">
			<?php
			 
				$o = $db->r("SELECT alternative_name FROM s_alternative WHERE problem_id = ".APP_ID);
				$alternativeName = array();
				foreach($o as $m)
				{
					$alternativeName[] = $m->alternative_name;
				}
				
				$resultMax = array();
				foreach($dMax as $n => $max)
				{
					$resultMax[] = ($dMin[$n] / ($max+$dMin[$n]) );
					echo "\nV<sub>{$n}</sub> = <span style=\"text-decoration:underline\">{$dMin[$n]}</span> = ".($dMin[$n] / ($max+$dMin[$n]) )."<br/>{$max}+{$dMin[$n]} <hr />";
				}
			?>
		</pre>
	</div>
</div>



<!-- KEDEKATAN SOLUSI IDEAL  -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>
			<span class="glyphicon glyphicon-ok"></span> Hasil analisa
		</h4>
	</div>
	<div class="panel-body">
		<?php 
			$winner = array_keys($resultMax, max($resultMax));
		?>
		<h4>Berdasarkan hasil perhitungan di atas maka ditentukan bahwa <?php echo $alternativeName[$winner[0]]; ?> dengan nilai bobot <?php echo max($resultMax);?> telah dinyatakan sebagai pilihan terbaik dari semua alternative.</h4>
	</div>
</div>
