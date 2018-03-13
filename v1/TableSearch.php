<?php 

require ('mailer.php');

	
	function JSONsendFLight($strings)
	{
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

	  // Fetch the results of the query
	   $posts = array();
	  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
	    $tmp = array();
	    $i =0 ;   
	  	foreach ($row as $item) {
	        
	        if ($i==0) {
	    		$tmp["Employee_id"] = $item;
	    	
	        } else if($i==1) {
	    		$tmp["FirstName"] = $item;
	        } else if($i==2){
				$tmp["LastName"] = $item;
	        } else if($i==3){
	         $tmp["Gender"] = $item;	
		    } else if($i==4) {
	    		$tmp["PhoneNumber"] = $item;
	        } else if($i==5) {
	    		$tmp["Address"] = $item;
	        } else if($i==6) {
	    		$tmp["EmailID"] = $item;
	        }else if($i==7) {
	    		$tmp["HireDate"] = $item;
	        }else if($i==8) {
	    		$tmp["Nationality"] = $item;
	        }else if($i==9) {
	    		$tmp["Salary"] = $item;
	        }
		    else{
		     	$tmp["Designation"] = $item;
		    }
	    	$i++;
	    }
	     array_push($posts, $tmp);
	  
	  	}
	  
	     // $posts->close();

	  echo json_encode($posts);

	  
	  oci_free_statement($stid);

	  
	  oci_close($conn);
	}


	
	function ShowTable($strings)
	{
	
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

	  	// Fetch the results of the query
		echo "<div class=\"row\">
	                <div class=\"col-lg-12\">
	                    <div class=\"panel panel-default\">
	                        <div class=\"panel-heading\">
	                        </div>
	                        <div class=\"panel-body\">
	                            <table width=\"100%\" class=\"table table-striped highlight centered table-bordered table-hover\" id=\"dataTables-example\">
	                                <thead>
	                                    <tr>
	                                      <th>Flight</th>
	                                      <th>Source</th>
	                                      <th>Destination</th>
	                                      <th>Arrival</th>
	                                      <th>Departure</th>
	                                    </tr>
	                                </thead>
	                                <tbody>\n";


		  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
		      echo "<tr>\n";
		      foreach ($row as $item) {
		          echo "<th>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</th>\n";
		      }
		      echo "</tr>\n";
		  }
		  echo "</table>\n";

		  oci_free_statement($stid);

	  
		  oci_close($conn);
	}

	 

	function EmployeeValidate($strings , $pass)
	{

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

	  // Fetch the results of the query
	   $posts = array();
	  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
	    $tmp = array();
	    $i =0 ;   
	  	foreach ($row as $item) {
	        
	        if ($i==0) {
	    		$tmp["id"] = $item;
	    	
	        } else{
	        	$tmp["pass"] = $item ;
	        }
	    	$i++;
	    }

		    if($tmp["pass"] == $pass){
		     array_push($posts, $tmp);
		    }
	  
	  	}
	  
	     // $posts->close();

	  echo json_encode($posts);

	  
	  oci_free_statement($stid);

	  
	  oci_close($conn);

	}
	
	function CalendarEvents($strings)
	{
		# code...
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

	  // Fetch the results of the query
	   $posts = array();
	  	while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
	    $tmp = array();
	    $i =0 ;   
	  	foreach ($row as $item) {
	        
	        if ($i==0) {
	    		$tmp["Aircraft_id"] = $item;
	    	
	        } else if($i==1) {
	    		$tmp["Source"] = $item;
	        } else if($i==2){
				$tmp["Destination"] = $item;
	        } else if($i==3){
	         $tmp["Arrival"] = $item;	
		    } else if($i==4) {
	    		$tmp["Departure"] = $item;
	        } else if($i==5) {
	    		$tmp["Status"] = $item;
	        } else if($i==6) {
	    		$tmp["Type"] = $item;
	        }
	        else if($i==7) {
	    		$tmp["Flight"] = $item;
	        }
	    		// else if($i==8) {
	    	// 	$tmp["Nationality"] = $item;
	     //    }else if($i==9) {
	    	// 	$tmp["Salary"] = $item;
	     //    }
		    // else{
		    //  	$tmp["Designation"] = $item;
		    // }
	    	$i++;
	    }
	     array_push($posts, $tmp);
	  
	  	}
	  
	     // $posts->close();

	  echo json_encode($posts);

	  
	  oci_free_statement($stid);

	  
	  oci_close($conn);
	}

	function fetchJSON($strings)
	{
		# code...
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

	  // Fetch the results of the query
	   $posts = array();
	  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
	    $tmp = array();
	   	foreach ($row as $item) {
	        array_push($tmp, $item);
	    }
	     array_push($posts, $tmp);
	  
	  	}
	  
	  echo json_encode($posts);

	  
	  oci_free_statement($stid);

	  
	  oci_close($conn);
	}

	function ExecuteQuery($strings)
	{
		# code...
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

	}

	function MailAllPassengers($strings)
	{
		# code...

		$FIRST_NAME = "";
		$LAST_NAME = "";
		$GENDER = "";
		$ADDRESS = "";
		$EMAIL_ID = "";

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

$EMAIL_ID = "anfuad96@yahoo.com";

	    $message_title = "BUET Airlines";

$mailSender = new MailSender($EMAIL_ID, $message_subject, $message_title, $message_body);

$mailSender->requestMailSend();

	     array_push($posts, $tmp);
	  
	  	}
	}

 ?>