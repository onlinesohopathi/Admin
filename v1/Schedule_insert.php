<?php 

  $Source=$_POST["Source"];
  $Destination=$_POST["Destination"];
  $Aircraft_ID=$_POST["Aircraft_ID"];
  $Departure=$_POST["Departure"];
  $Arrival=$_POST["Arrival"];
  $Plane = $_POST["Plane"];


 //  $strings = "SELECT ROUTE_ID FROM ROUTE WHERE SOURCE = (SELECT AIRPORT_ID FROM AIRPORT WHERE CITY ="."'".$Source . "'".")
	// AND DESTINATION = ((SELECT AIRPORT_ID FROM AIRPORT WHERE CITY =". "'".$Destination."'"."))";

  	// $strings = "DECLARE
  	// 			BEGIN
  	// 				INSERT_SCHEDULE('".$Source."','".$Destination."','".$Departure."',
  	// 				881);
  	// 			END;";

	$strings = "DECLARE
  				BEGIN
  					INSERT_SCHEDULE('".$Source."','".$Destination."','".$Departure."',
  					'".$Plane."');
  				END;";


  		 $conn=oci_connect("BUETAIRLINES" , "113114","localhost/xe");
		if (!$conn) {
		  $e = oci_error();
		  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
	

	    
		$stid = oci_parse($conn, $strings);
		if (!$stid) {
		    $e = oci_error($conn);
		      trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}

	    // Perform the logic of the query
	    $r = oci_execute($stid);
	    if (!$r) {
	      $e = oci_error($stid);
	      trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	    }






?>