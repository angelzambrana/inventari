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

</head>

<body>

	<?php

	// route variables
	//include("../horari/inc/variables.inc.php");
	include("../inventari/inc/functions.inc.php");

	// save value barcode
	$barcode=$_POST['barcode'];
	// save sec 1-> WOMAN 2 -> MAN 3-> BOY
	$sec=$_POST['sec'];
	//save area
	$area=$_POST['area'];


	//date now
	$datat = getdate();
	//date complet
	$datahour = returndaycomplet($datat);

	//Boolean for check
	$bb = true;

	if ($sec==null){
	  $bb=false;
	}

	if ($area<=0){
	  $bb=false;
	}
	if ($area>150){
	  $bb=false;

	}

	if ($bb==false){
	  echo '<script>';
	  echo 'alert("Revisa les dades");';
	  echo '</script>';
	} else {

	  $article = searchBarcode($barcode);


	  if (is_null($article)){

	    echo '<script>';
	    echo 'alert("Article inexistent");';
	    echo '</script>';
	  }else{


	    ?>


	<div class="c10 centered first">

		<div class="alert info">
			<p style="font-size: 300%; text-align: center;">
				INVENTARI
				<?php //echo $project;?>
			</p>
		</div>
		<!-- div alert info -->

		<div class="alert success">
			<p style="font-size: 250%; text-align: center;">
				<!-- Show name about worker -->
				<?php echo $article;?>
			</p>
		</div>
		<!-- div alert success -->


		<!-- Send for post method  -->
		<input type="hidden" name="sec" value="<?php echo $sec;?>"></input> <input
			type="hidden" name="area" value="<?php echo $area;?>"></input>
		<?php 	

		//function insert in database
		insertBarcode($barcode, $sec, $area,$datahour);
		echo '<div class="alert success" style="text-align:center;">ARTICLE GUARDAT</div>';
	  }
	}
	?>


		<!--  Retorn pàgina inicial -->
		<script type="text/javascript">
    function redireccionar(){
    	  window.location="insert.php?sec=<?php echo  $sec;?>&area=<?php echo $area?>";
    	  } 
    setTimeout ("redireccionar()", 1000);
    </script>

	</div>
	<!-- Div centered-->

</body>
</html>
