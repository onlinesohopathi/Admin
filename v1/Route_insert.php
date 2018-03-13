<?php 

  $Source=$_POST["Source"];
  $Destination=$_POST["Destination"];
  $Economy=$_POST["Economy"];
  $Business=$_POST["Business"];
  $First=$_POST["First"];
  $Duration = $_POST["Duration"];
  
  
	$strings = "DECLARE
				SRC NUMBER;
				DST NUMBER;
				ROUTE_ID NUMBER;
				PRICE_ID NUMBER;
				BEGIN
				SELECT AIRPORT_ID INTO SRC FROM AIRPORT WHERE NAME = '".$Source."' ;
				SELECT AIRPORT_ID INTO DST FROM AIRPORT WHERE NAME = '".$Destination."' ;

				ROUTE_ID := SEQ_ROUTE.NEXTVAL;
				INSERT INTO ROUTE VALUES (ROUTE_ID , SRC , DST , '".$Duration."' );

				PRICE_ID := SEQ_PRICE.NEXTVAL;
				INSERT INTO PRICE (PRICE_ID , ROUTE_ID , START_DATE) VALUES (PRICE_ID , ROUTE_ID , SYSDATE);

				INSERT INTO PRICE_ITEM VALUES (PRICE_ID , 1 , '".$Economy."');
				INSERT INTO PRICE_ITEM VALUES (PRICE_ID , 2 , '".$Business."');
				INSERT INTO PRICE_ITEM VALUES (PRICE_ID , 3 , '".$First."');

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