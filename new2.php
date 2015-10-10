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

	<?php

	// route variables
	//include("../horari/inc/variables.inc.php");
	include("../inventari/inc/functions.inc.php");

	// save value barcode
	$barcode=$_POST['barcode'];
	// save name of article
	$article=$_POST['article'];
	//save price of article
	$price=$_POST['price'];


	//Boolean for check
	$bb = true;

	//A value null
	if ($barcode==null){
	  $bb=false;
	}
	if($price==null){
	  $bb=false;
	}
	if($article==null){
	  $bb=false;
	}
	
	// negative value
	if ($price<=0){
	  $bb=false;
	}
	// A numeric value
	if(!is_numeric($price)){
	  $bb=false;
	}

    $largo=substr($barcode, 0,11);
    
	//Barcode 11 letters
	if(strlen($largo)!=11){
	 $bb=false;
	}
	
	if ($bb==false){
	  echo '<script>';
	  echo 'alert("Revisa les dades");';
	  echo '</script>';
	} else {

	  $articles = searchBarcode($barcode);


	  if (!is_null($articles)){

	    echo '<script>';
	    echo 'alert("Article existent");';
	    echo 'history.go(-1)';
	    echo '</script>';
	  }else{


	    ?>


	<div class="c10 centered first">

		<div class="alert info">
			<p style="font-size: 300%; text-align: center;">
				INVENTARIO
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


		<?php 	

		//function insert in database
		insertNewBarcode($barcode, $article,$price);
		echo '<div class="alert success" style="text-align:center;">ARTICLE GUARDAT</div>';
	  }
	}
	?>


		<!--  Retorn pàgina inicial -->
		<script type="text/javascript">
    function redireccionar(){
    	  window.location="new.php";
    	  } 
    setTimeout ("redireccionar()", 1000);
    </script>

	</div>
	<!-- Div centered-->

</body>
</html>
