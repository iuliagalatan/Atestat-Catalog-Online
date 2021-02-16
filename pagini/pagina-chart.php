<?php
	$materie = "";
	if(isset($_GET['materie']))
		$materie = DB_Escape_String($_GET['materie']);
	$dataPoints = [];
	$q = "SELECT * FROM catalog WHERE id_user='".Login()."' ORDER BY data";
	if(! empty($materie))
		$q = "SELECT * FROM catalog WHERE id_user='".Login()."' AND materie='{$materie}' ORDER BY data";
	
	$result = Query_Select($q);
	$cnt = 0;
    foreach($result as $row){
        $dataPoints[] = [
						 "y"=> $row['nota'],
						 "x"=> ++ $cnt,
						 "label" => $row['materie'] . " / " . $row['data'],
						];
    }


	
?>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Evolutia notelor<?=$materie!=""?" la ".$materie:""?>"
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc  
		dataPoints: <?= json_encode($dataPoints, JSON_NUMERIC_CHECK) ?>
	}]
});
chart.render();
 
}
</script>

<div id="navbarBasicExample" class="navbar-menu">
	<div class="navbar-start">
		<a  class="navbar-item <?=""==$materie?"is-active":""?>" href="./?pagina=<?=$pagina?>">Toate materiile</a>
	</div>
    <div class="navbar-end">
	<?php
		foreach($materii as $m)
		{
			$q_rez = Query_Select("SELECT COUNT(*) AS numar_note FROM catalog WHERE id_user=".Login()." AND materie='{$m}'");
			$numar_note = $q_rez[0]['numar_note'];
			if($numar_note > 0)
			{
				?>
					<a href="./?pagina=<?=$pagina?>&materie=<?=$m?>"  class="navbar-item <?=$m==$materie?"is-active":""?>"><?=$m?> <span class="tag is-info"><?=$numar_note?></span></a>
				<?php
			}
		}
	?>
	</div>
</div>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>