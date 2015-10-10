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

	<div class="c10 centered first">
		<div class="alert info">
			<p style="font-size: 300%; text-align: center;">
				<a href="index.php">INVENTARIO</a>
			</p>
		</div>
		<!-- div alert info -->

		<form method="post" action="list.php">
				<?php
				//include functions
				include ('inc/functions.inc.php');
				
				//send variables POST
				$open=$_POST['open'];
				$del=$_POST['del'];
				$close=$_POST['close'];
				$sec=$_POST['sec'];
				$area=$_POST['area'];
				
				//condition about close
				if($close=='close'){
				  //change the value about finish to 1
				  closeSecArea($sec,$area);
				  echo "<p style='font-size: 100%; text-align: center;'>ZONA CERRADA</p>";
				}
				
			  //condition about open
				if($open=='open'){
				  //change the value about finish to 1
				  openSecArea($sec,$area);
				  echo "<p style='font-size: 100%; text-align: center;'>ZONA REABIERTA</p>";
				}
				
				//condition about del
				if($del=='del'){
				  //change the value about finish to 1
				  delSecArea($sec,$area);
				  echo "<p style='font-size: 100%; text-align: center;'>ZONA BORRADA</p>";
				}
											
				?>
		</form>	
		
				<script type="text/javascript">
    function redireccionar(){
    	  window.location="list.php";
    	  } 
    setTimeout ("redireccionar()", 10000);
    </script>
	</div>
	<!-- Div centered -->
</body>
</html>

