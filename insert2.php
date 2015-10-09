<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A little inventory">
<meta name="author" content="Fundacio Moli Puigvert">
<link rel="shortcurt icon" href="img/favicon.ico">

<!-- css style ivory  http://weice.in/ivory/ -->
<link href="css/ivory.css" rel="stylesheet">

<title>INVENTARIO</title>

<script type="text/javascript">
		function clean(elem){
			elem.value="";
		}	
 	</script>
</head>

<body >

	<?php 
	//save the value GET
	$sec = $_GET['sec'];
	$area = $_GET['area'];

	?>
	<div class="c10 centered first">
		<div class="alert info">
			<p style="font-size: 300%; text-align: center;">
				<a href="index.php">INVENTARIO</a>
			</p>
		</div>
		<!-- div alert info -->

		<h4 class="text-center">C&Oacute;DIGO</h4>
		<form method="post" action="insert2.php">
			<input autofocus
				style="font-size: 300%; text-align: center; margin-left: auto; margin-right: auto; display: block; width: 500px; height: 100px;"
				type="number" name="barcode" id="barcode" placeholder="" onload="clean(barcode);">
			<p style="font-size: 100%; text-align: center;">
			
			
			<p style="font-size: 100%; text-align: center;">SECCION</p>
			<p style="font-size: 100%; text-align: center;">
				<select style="font-size: 120%; text-align: center;" name='sec'
					id='sec'>
					<option value="1"
					<?php if ($sec=="1"){ echo 'selected="selected"';}?>>WOMAN</option>
					<option value="2"
					<?php if ($sec=="2"){ echo 'selected="selected"';}?>>MAN</option>
					<option value="3"
					<?php if ($sec=="3"){ echo 'selected="selected"';}?>>BOYS</option>
				</select>
			</p>
			<p style="font-size: 100%; text-align: center;">ZONA</p>
			<input
				style="font-size: 200%; text-align: center; margin-left: auto; margin-right: auto; display: block; width: 100px; height: 50px;"
				type="number" name="area" id="area" value="<?php echo $area;?>"
				placeholder="">
			<p style="font-size: 200%; text-align: center;"></p>
			<button type="submit" id="confirmar" name="CONFIRMAR"
				style="margin-left: auto; margin-right: auto; display: block; font-size: 200%; height: 60px;"
				class="blue">GUARDAR</button>

		</form>

		<button type="button" id="limpiar" name="LIMPIAR"
			style="margin-left: auto; margin-right: auto; display: block; font-size: 200%; height: 60px;"
			onclick="clean(barcode);" class="blue">NETEJAR</button>
	</div>
	<!-- Div centered -->
</body>
</html>

