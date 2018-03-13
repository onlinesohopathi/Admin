<?php 

  $Route_id=$_POST["Route_id"];
  $Economy=$_POST["Economy"];
  $Business=$_POST["Business"];
  $First=$_POST["First"];
  
  
	$strings = "DECLARE
				ID NUMBER;
				BEGIN
				  ID:= SEQ_PRICE.NEXTVAL;
				  INSERT INTO PRICE (PRICE_ID , ROUTE_ID, START_DATE ) VALUES 
				  (ID,'".$Route_id."', SYSDATE);
				  INSERT INTO PRICE_ITEM VALUES (ID , 1 , '".$Economy."');
				  INSERT INTO PRICE_ITEM VALUES (ID , 2 , '".$Business."');
				  INSERT INTO PRICE_ITEM VALUES (ID , 3 , '".$First."');

				END;
				";

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

    $strings = "COMMIT";


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