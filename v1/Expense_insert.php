<?php 

  $FLight_ID=$_POST["FLigth_ID"];
  $First=$_POST["First"];
  $Business=$_POST["Business"];
  $Economy=$_POST["Economy"];
  
  

  
   $strings = "INSERT INTO INFLIGHT_EXPENSE VALUES (SEQ_INFLIGHT.NEXTVAL , '".$FLight_ID."' , '".$First."' , '".$Business."' , '".$Economy."')" ;


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