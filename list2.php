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

		<form method="post" action="list3.php">
			<p style="font-size: 100%; text-align: center;">ZONA ABIERTAS</p>
				<p style="font-size: 100%; text-align: center;">
			<select style="font-size: 120%; text-align: center;" name='areao'
				id='areao'>
				<?php 
				$sec=$_POST['sec'];
				include ('inc/functions.inc.php');
				//add a null value
				$listopen=showAreaOpen($sec);
				?>
			</select> 
			
			</p>
			<p style="font-size: 100%; text-align: center;">ZONA CERRADAS</p>
				<p style="font-size: 100%; text-align: center;">
			<select style="font-size: 120%; text-align: center;" name='areac'
				id='areac'>
				<?php 
				//add a null value
				$listclose=showAreaClosed($sec);
				?>
			</select> 
			</p>
			<input type="hidden" id="sec" name="sec" value="<?php echo $sec;?>">
			<button type="submit" id="confirmar" name="CONFIRMAR"
					style="margin-left: auto; margin-right: auto; display: block; font-size: 200%; height: 60px;"
					class="blue">ABRIR</button>
		
		</form>
			<p style="font-size: 100%; text-align: center;"><?php echo $listopen;?></p>
			<p style="font-size: 100%; text-align: center;"><?php echo $listclose;?></p>
	</div>
	<!-- Div centered -->
</body>
</html>

