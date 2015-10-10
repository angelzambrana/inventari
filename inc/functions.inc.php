<?php 
//ini_set('display_errors', 'On');
//error_reporting(E_ALL);


/**
 * Close Sec Area
 * @param string sec
 * @param string area
 */
function closeSecArea($sec,$area){

  //include variables
  include 'variables.inc.php';

  //connect to database
  $dbconn = pg_connect($ruta) or die($noconnect.' '.pg_last_error());

  //select exist a permission about worker and day and is visible
  $query = "UPDATE bershka_inventory SET finish='1' WHERE area=".$area." AND sec=".$sec.";";

  //execute query
  $result = pg_query($dbconn,$query) or die($errorsearch.' '.pg_last_error());

  //select correct value
  $line = pg_fetch_array($result, null, PGSQL_ASSOC);

  //Clean the $result string
  pg_free_result($result);
   
  // Close connection
  pg_close($dbconn);
 

 }
 /**
  * del Sec Area
  * @param string sec
  * @param string area
  */
 function delSecArea($sec,$area){
 
   //include variables
   include 'variables.inc.php';
 
   //connect to database
   $dbconn = pg_connect($ruta) or die($noconnect.' '.pg_last_error());
 
   //select exist a permission about worker and day and is visible
   $query = "DELETE FROM bershka_inventory WHERE finish='0'AND area=".$area." AND sec=".$sec.";";
 
   //execute query
   $result = pg_query($dbconn,$query) or die($errorsearch.' '.pg_last_error());
 
   //select correct value
   $line = pg_fetch_array($result, null, PGSQL_ASSOC);
 
   //Clean the $result string
   pg_free_result($result);
    
   // Close connection
   pg_close($dbconn);
 
 
 }
 
 /**
  * Close Sec Area
  * @param string sec
  * @param string area
  */
 function openSecArea($sec,$area){
 
   //include variables
   include 'variables.inc.php';
 
   //connect to database
   $dbconn = pg_connect($ruta) or die($noconnect.' '.pg_last_error());
 
   //select exist a permission about worker and day and is visible
   $query = "UPDATE bershka_inventory SET finish='0' WHERE area=".$area." AND sec=".$sec.";";
 
   //execute query
   $result = pg_query($dbconn,$query) or die($errorsearch.' '.pg_last_error());
 
   //select correct value
   $line = pg_fetch_array($result, null, PGSQL_ASSOC);
 
   //Clean the $result string
   pg_free_result($result);
    
   // Close connection
   pg_close($dbconn);
 
 
 }
 
/**
 * Return total euros about section and area
 * @param string sec
 * @param string area
 * @return string
 */
function totalSecArea($sec,$area){

  //include variables
  include 'variables.inc.php';

  //connect to database
  $dbconn = pg_connect($ruta) or die($noconnect.' '.pg_last_error());

  //select exist a permission about worker and day and is visible
  $query = "SELECT sum(i.quantity * (l.price)) as total FROM bershka_inventory i, bershka_list l WHERE  substr(i.barcode,1,11)=l.barcode AND area=".$area." AND sec=".$sec.";";

  //execute query
  $result = pg_query($dbconn,$query) or die($errorsearch.' '.pg_last_error());

  //select correct value
  $line = pg_fetch_array($result, null, PGSQL_ASSOC);

  //Clean the $result string
  pg_free_result($result);
   
  // Close connection
  pg_close($dbconn);

  return $line['total'];
}


/**
 * Return number of article about section and area
 * @param string sec
 * @param string area
 * @return string 
 */
function countSecArea($sec,$area){

  //include variables
  include 'variables.inc.php';

  //connect to database
  $dbconn = pg_connect($ruta) or die($noconnect.' '.pg_last_error());

  //select exist a permission about worker and day and is visible
  $query = "SELECT count(inventary_id)as number FROM bershka_inventory WHERE area=".$area." AND sec=".$sec.";";
  
  //execute query
  $result = pg_query($dbconn,$query) or die($errorsearch.' '.pg_last_error());

  //select correct value
  $line = pg_fetch_array($result, null, PGSQL_ASSOC);

  //Clean the $result string
  pg_free_result($result);
   
  // Close connection
  pg_close($dbconn);

  return $line['number'];
}


/**
 * Return exist sec-area open
 * @param string sec
 * @param string area
 * @return string exists
 */
function searchSecArea($sec,$area){
  
  //include variables
  include 'variables.inc.php';

   //connect to database
  $dbconn = pg_connect($ruta) or die($noconnect.' '.pg_last_error());

  //select exist a permission about worker and day and is visible
  $query = "SELECT finish FROM bershka_inventory WHERE area=".$area." AND sec=".$sec.";";

  //execute query
  $result = pg_query($dbconn,$query) or die($errorsearch.' '.pg_last_error());

  //select correct value
  $line = pg_fetch_array($result, null, PGSQL_ASSOC);

  //Clean the $result string
  pg_free_result($result);
   
  // Close connection
  pg_close($dbconn);

  return $line['finish'];
}



/**
 * Return exist barcode
 * @param string barcode
 * @return string permis type
 */
function searchBarcode($barcode){
  //include variables
  include 'variables.inc.php';

  $barcode2=substr($barcode,0,11);
  
  //connect to database
  $dbconn = pg_connect($ruta) or die($noconnect.' '.pg_last_error());

  //select exist a permission about worker and day and is visible
  $query = "SELECT name FROM bershka_list WHERE barcode='".$barcode2."';";
  
  //execute query
  $result = pg_query($dbconn,$query) or die($errorsearch.' '.pg_last_error());
  
  //select correct value
  $line = pg_fetch_array($result, null, PGSQL_ASSOC);
  
  //Clean the $result string
  pg_free_result($result);
   
  // Close connection
  pg_close($dbconn);
  
  return $line['name'];
}



/**
 * Show a list about articles
 * @param integer section
 * @param integer area
 */
function showArticles($sec,$area){

  //include variables
  include 'variables.inc.php';

  //connect to database
  $dbconn = pg_connect($ruta) or die($noconnect.' '.pg_last_error());

  //select all articles
  $query = "SELECT i.barcode as codi, l.name as nom, sum(i.quantity) as quantitat, l.price as preu FROM bershka_inventory i, bershka_list l WHERE substr(i.barcode,1,11)=l.barcode AND sec=".$sec." AND area=".$area." GROUP BY i.barcode, l.name, l.price ORDER by codi ASC ;";

  //execute query
  $result = pg_query($dbconn,$query) or die($errorsearch.' '.pg_last_error());

  //Construeix la taula
  while ($line = pg_fetch_assoc($result)) {
    echo '<tr>';
    $num=$line['preu']/100;
    echo '<td class="text-center">'.$line['codi'].'</td><td>'.$line['nom'].'</td><td>'.$line['quantitat'].'</td><td>'.$num.'</td>';
    echo '</tr>';
  }
   
  //Clean the $result string
  pg_free_result($result);
   
  // Close connection
  pg_close($dbconn);

}


/**
 * Show a list about area
 * @return string list open areas
 */
function showAreaOpen($sec){
  
  //include variables
  include 'variables.inc.php';

  //connect to database
  $dbconn = pg_connect($ruta) or die($noconnect.' '.pg_last_error());
  
  //select all workers
  $query = "SELECT distinct area FROM bershka_inventory WHERE finish='0' AND sec=".$sec." ORDER by area ASC;";
  
  //execute query
  $result = pg_query($dbconn,$query) or die($errorsearch.' '.pg_last_error());
  
  //add a null value
  echo '<option value=""></option>';
  $areaopeni='Zonas Abiertas ';
  
  //Construeix el select
  while ($line = pg_fetch_assoc($result)) {
    $areaopen=$line['area'];
    $areaopeni = $areaopeni."--".$areaopen;
     echo '<option value="'.$line['area'].'">'.$line['area'].'</option>';
   }
   
   //Clean the $result string
   pg_free_result($result);
   
   // Close connection
   pg_close($dbconn);
   
   return $areaopeni;
  
  }
  /**
   * Show a list about area
   * @return string list closed areas
   */
  function showAreaClosed($sec){
  
    //include variables
    include 'variables.inc.php';
  
    //connect to database
    $dbconn = pg_connect($ruta) or die($noconnect.' '.pg_last_error());
  
    //select all workers
    $query = "SELECT distinct area FROM bershka_inventory WHERE finish='1' AND sec=".$sec." ORDER by area ASC;";
  
    //execute query
    $result = pg_query($dbconn,$query) or die($errorsearch.' '.pg_last_error());
    
    //show closed areas
    $areaopenc='Zonas Cerradas ';
    
    //add a null value
    echo '<option value=""></option>';
    //Construeix el select
    while ($line = pg_fetch_assoc($result)) {
      $areaopen=$line['area'];
      $areaopenc = $areaopenc."--".$areaopen;
      echo '<option value="'.$line['area'].'">'.$line['area'].'</option>';
    }
     
    //Clean the $result string
    pg_free_result($result);
     
    // Close connection
    pg_close($dbconn);
  
    //return a string
    return $areaopenc;
  }
  
/**
 * insert in to database a new value of barcode
 * @param integer $barcode -> barcode
 * @param string $sec --> section WOMAN, MAN, BOYS 
 * @param string $area --> area worker
 * @param string $datahour --> data and hour complete
 */
function insertBarcode($barcode, $sec, $area,$datahour){

	//include variables
	include 'variables.inc.php';
	//check if sec and area is closed
	$exist= searchSecArea($sec, $area);
	
	//conditional about close sec - area
	if($exist=='1'){

	  echo '<script>';
	  echo 'alert("Seccio - Area tancada");';
	  echo 'history.go(-1);';
	  echo '</script>';
	
	}else{
	  
	  //connect to database
	  $dbconn = pg_connect($ruta) or die($noconnect.' '.pg_last_error());
	  
	  //insert a new value of database
	  $query = "INSERT INTO bershka_inventory (barcode, sdata,quantity,area,sec) values ('".$barcode."','".$datahour."',1,".$area.",".$sec.")";
	  
	  //execute query
	  $result = pg_query($dbconn,$query) or die($errorsearch.' '.pg_last_error());
	  
	  //Clean the $result string
	  pg_free_result($result);
	  
	  // Close connection
	  pg_close($dbconn);
	   
	}
			
}

/**
 * insert in to database a new value of barcode
 * @param integer $barcode -> barcode
 * @param string $sec --> section WOMAN, MAN, BOYS
 * @param string $area --> area worker
 * @param string $datahour --> data and hour complete
 * @param double $price --> price about article
 */
function insertNewBarcode($barcode, $article,$price){

  //include variables
  include 'variables.inc.php';

  //connect to database
  $dbconn = pg_connect($ruta) or die($noconnect.' '.pg_last_error());

  //no decimals
  $price = round($price *100);
  
  //barcode little
  $barcode = substr($barcode, 0,11);
  
  //insert a new value of database
  $query = "INSERT INTO bershka_list (barcode, name,price,new) values ('".$barcode."','".$article."',".$price.",'1')";

  //execute query
  $result = pg_query($dbconn,$query) or die($errorsearch.' '.pg_last_error());

  //Clean the $result string
  pg_free_result($result);

  // Close connection
  pg_close($dbconn);
  	
}

/**
 * Format day in day - month - year
 * @param date in array $d
 */
function returnday($d){
		
	//Make the format about date
	return $d['mday'].'-'.$d['mon'].'-'.$d['year'];
}

function returndayinsert($d){
	//Make the format about date
	return $d['year'].'-'.$d['mon'].'-'.$d['mday'];
	}
/**
 * Format day in year - month - day hour:minuts:seconds
 * @param String aboutunknown_type $d
 */
function returndaycomplet($d){
	//Make complete date
	return $d['year'].'-'.$d['mon'].'-'.$d['mday'].' '.$d['hours'].':'.$d['minutes'].':'.$d['seconds'];
}

function returnhour($d){
	//Make complete date
	return $d['hours'].':'.$d['minutes'].':'.$d['seconds'];
}
?>
