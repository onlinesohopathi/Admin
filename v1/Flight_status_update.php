<?php 
require ('mailer.php');

	$Status=$_GET["Status"];
	$Flight_id=$_GET["Flight"];
	$FIRST_NAME = "";
	$LAST_NAME = "";
	$GENDER = "";
	$ADDRESS = "";
	$EMAIL_ID = "";

	$Status =  str_replace("*"," ",$Status);

	$strings = "SELECT P.FIRST_NAME, P.LAST_NAME , P.GENDER , P.ADDRESS, P.EMAIL_ID 
				FROM BOOKING B JOIN PASSENGER P 
				ON P.PASSENGER_ID = B.PASSENGER_ID
				where FLIGHT_ID = '".$Flight_id."'";

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

	    $posts = array();
	  	while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
	    $tmp = array();
	    $i =0 ;   
	  	foreach ($row as $item) {
	        
	        if ($i==0) {
	    		$FIRST_NAME = $item;
	    	} else if($i==1) {
	    		$LAST_NAME = $item;
	        } else if($i==2){
				$GENDER = $item;
	        } else if($i==3){
	         $ADDRESS = $item;	
		    } else if($i==4) {
	    		$EMAIL_ID = $item;
	        }



	    	$i++;
	    }
	   	$message_body = "Dear Mr. Awsaf\\nYour flight has been unfortunately delayed, due to severe weather conditions.\\n We are currently doing everything in our power to resume the flight as fast as possible.\\nRegards,\\nBUETAirlines.com";

$message_subject = "Greetings From BuetAirlines";

$EMAIL_ID = "awsafalam@gmail.com";

	    $message_title = "BUET Airlines";

$mailSender = new MailSender($EMAIL_ID, $message_subject, $message_title, $message_body);

$mailSender->requestMailSend();

	     array_push($posts, $tmp);
	  
	  	}
	  
	  $strings = "UPDATE FLIGHT SET STATUS = '".$Status."' 
	  			WHERE FLIGHT_ID = '".$Flight_id."'";

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