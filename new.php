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

<title>INVENTARI</title>

<script type="text/javascript">
		function clean(elem){
			elem.value="";
		}	
 	</script>
</head>

<body onload="clean barcode">

	<?php 
	?>
	<div class="c10 centered first">
		<div class="alert error">
			<p style="font-size: 300%; text-align: center;">
				<a href="index.php">INVENTARIO</a>
				</p>
		</div>
		<!-- div alert info -->

		  <form method="post" action="new2.php">
			<p style="font-size: 100%; text-align: center;">PRECIO (PUNTO NO COMA)</p>
			<input autofocus
				style="font-size: 200%; text-align: center; margin-left: auto; margin-right: auto; display: block; width: 200px; height: 50px;"
				type="text" name="price" id="price" value=""
				placeholder="">
	      <p style="font-size: 200%; text-align: center;"></p>
			<p style="font-size: 100%; text-align: center;">ART&Iacute;CULO</p>
			<input
				style="font-size: 150%; text-align: center; margin-left: auto; margin-right: auto; display: block; width: 400px; height: 50px;"
				type="text" name="article" id="article"	placeholder="">
			<p style="font-size: 200%; text-align: center;"></p>
		<h4 class="text-center">C&Oacute;DIGO</h4>
		  <input
				style="font-size: 300%; text-align: center; margin-left: auto; margin-right: auto; display: block; width: 500px; height: 100px;"
				type="number" name="barcode" id="barcode" placeholder="">
			
			<p style="font-size: 200%; text-align: center;"></p>
			<button type="submit" id="confirmar" name="CONFIRMAR"
				style="margin-left: auto; margin-right: auto; display: block; font-size: 200%; height: 60px;"
				class="blue">GUARDAR</button>

		</form>

		<button type="button" id="limpiar" name="LIMPIAR"
			style="margin-left: auto; margin-right: auto; display: block; font-size: 200%; height: 60px;"
			onclick="clean(barcode);clean(article);clean(price);" class="blue">NETEJAR</button>
	</div>
	<!-- Div centered -->
</body>
</html>

