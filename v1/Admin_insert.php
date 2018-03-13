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
  $Pass = $_POST["Password"];

  $Pass = sha1($Pass);
  // $key = md5('Awsaf');


  // function encrypt($string , $key)
  // {
  // 	# code...
  // 	$string = rtrim(mcrypt_encrypt(MCERPT_RIJNDAEL_256, $key, $string, MCRYPY_MODE_ECB));

  // 	return $string;
  // }


  // $Pass = encrypt($Pass , $key);
  
  // $strings = "INSERT INTO EMPLOYEE VALUES (SEQ_EMPLOYEE.NEXTVAL , '".$FirstName."' , 
  // 			'".$LastName."' , '".$Gender."' , '".$PhoneNumber."', '".$Address."' ,
  // 			'".$EmailID."',SYSDATE , '".$Nationality."', '".$Salary."', '".$Designation."')";

  
  $strings = "DECLARE
				E_ID NUMBER;
				BEGIN
				E_ID := SEQ_EMPLOYEE.NEXTVAL;
				INSERT INTO EMPLOYEE VALUES (E_ID , '".$FirstName."' , 
				  			'".$LastName."' , '".$Gender."' , '".$PhoneNumber."', '".$Address."' ,
				  			'".$EmailID."',SYSDATE , '".$Nationality."', '".$Salary."', '".$Designation."');

				INSERT INTO ADMIN VALUES (E_ID , '".$Pass."');
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