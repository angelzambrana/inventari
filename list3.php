<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A little inventory">
<meta name="author" content="Fundacio Moli Puigvert">
<link rel="shortcurt icon" href="img/favicon.ico">

<link href="css/print.css" type="text/css" media="print" />

<!-- css style ivory  http://weice.in/ivory/ -->
<link href="css/ivory.css" rel="stylesheet">

<title>INVENTARIO</title>

</head>

<body>

	<?php

	// route variables
	//include("../horari/inc/variables.inc.php");
	include("../inventari/inc/functions.inc.php");

	// save value section
	$sec=$_POST['sec'];
	// save value areaopen
	$areao=$_POST['areao'];
	//save value areaclosed
	$areac=$_POST['areac'];

	//search the correct value
	if (strlen($areao)>0){
	  $area=$areao;
	}else{
	  $area=$areac;
	}

	//Boolean for check
	$bb = true;

	if($area==null){
	  $bb=false;
	}

	if(strlen($areao)>0 AND strlen($areac)>0){
	  $bb=false;
	}

	if ($bb==false){
	  echo '<script>';
	  echo 'alert("Revisa les dades");';
	  echo 'history.go(-1)';
	  echo '</script>';
	} else {

	  ?>


	<div class="c10 centered first">

		<div class="alert info">
			<p style="font-size: 300%; text-align: center;">
				<a href="list.php">LISTADO</a>
			</p>
		</div>
		<!-- div alert info -->

		<div class="alert success">
			<p style="font-size: 250%; text-align: center;">
				<!-- Show name about worker -->
				SECCION:
				<?php echo $sec;?>

			</p>
			<p style="font-size: 250%; text-align: center;">
				<!-- Show name about worker -->
				ZONA:
				<?php echo $area;?>
			</p>
		</div>
		<!-- div alert success -->


		<?php 	

		//finish == 0 pending about finish
		$exist=searchSecArea($sec, $area);

		//count number articles
		$num=countSecArea($sec, $area);
		echo '<p style="font-size: 200%; text-align: center;">ARTICULOS:  '.$num.'</p>';

		//count total
		$num2=totalSecArea($sec, $area);
		echo '<p style="font-size: 200%; text-align: center;">EUROS:  '.number_format($num2/100,2).'</p>';


		if($exist=='0'){
		  ?>

		<div class="alert success" style="text-align: center;">DATOS</div>

		<table>
			<tr>
				<th class="text-center">CODI</th>
				<th>ARTICLE</th>
				<th>QUANT</th>
				<th>PREU</th>
			</tr>
			<?php showArticles($sec, $area);?>
		</table>
		<p style="font-size: 100%; text-align: center;"></p>
	<form method="post" action="list4.php">
		<button type="submit" id="close" name="close" value="close"
			style="margin-left: auto; margin-right: auto; display: block; font-size: 200%; height: 60px;"
			class="blue">CERRAR</button>


	

			<button type="submit" id="del" name="del" value="del"
				style="margin-left: auto; margin-right: auto; display: block; font-size: 200%; height: 60px;"
				class="blue">BORRAR</button>

			<input type="hidden" id="sec" name="sec" value="<?php echo $sec;?>">
			<input type="hidden" id="area" name="area"
				value="<?php echo $area;?>">
		</form>

		<?php 
		}else{ ?>
		<div class="alert success" style="text-align: center;">SECCION - ZONA
			CERRADA</div>


		<table>
			<tr>
				<th class="text-center">CODI</th>
				<th>ARTICLE</th>
				<th>QUANT</th>
				<th>PREU</th>
			</tr>
			<?php showArticles($sec, $area);?>
		</table>
		<p style="font-size: 100%; text-align: center;"></p>
		
		<form method="post" action="list4.php">

			<button type="submit" id="open" name="open" value="open"
				style="margin-left: auto; margin-right: auto; display: block; font-size: 200%; height: 60px;"
				class="blue">REABRIR</button>

			<input type="hidden" id="sec" name="sec" value="<?php echo $sec;?>">
			<input type="hidden" id="area" name="area"
				value="<?php echo $area;?>">
		</form>

		<?php 


		}
	}
	?>


		<!--  Retorn pàgina inicial -->


	</div>
	<!-- Div centered-->

</body>
</html>
