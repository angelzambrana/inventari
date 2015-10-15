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

</head>

<body>

	<div class="c10 centered first">
		<div class="alert info">
			<p style="font-size: 300%; text-align: center;">
				<a href="index.php">INVENTARIO</a>
			</p>
		</div>
		<!-- div alert info -->

		<form method="post" action="list2.php">

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

			<button type="submit" id="confirmar" name="CONFIRMAR"
					style="margin-left: auto; margin-right: auto; display: block; font-size: 200%; height: 60px;"
					class="blue">ABRIR</button>
		
		</form>
	</div>
	<!-- Div centered -->
</body>
</html>

