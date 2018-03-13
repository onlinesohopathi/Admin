<?php 

  $FirstName=$_POST["FirstName"];
  $LastName=$_POST["LastName"];
  $PhoneNumber=$_POST["PhoneNumber"];
  $Address=$_POST["Address"];
  $EmailID=$_POST["EmailID"];
  $Gender=$_POST["Gender"];
  $Nationality=$_POST["Nationality"];
  $Designation=$_POST["Designation"];
  $Salary=$_POST["Salary"];
 
  $strings = "DECLARE
				E_ID NUMBER;
				BEGIN
				E_ID := SEQ_EMPLOYEE.NEXTVAL;
				INSERT INTO EMPLOYEE VALUES (E_ID , '".$FirstName."' , 
				  			'".$LastName."' , '".$Gender."' , '".$PhoneNumber."', '".$Address."' ,
				  			'".$EmailID."',SYSDATE , '".$Nationality."', '".$Salary."', '".$Designation."');

				INSERT INTO ENGINEER VALUES (E_ID , '".$Designation."');
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