<?php 

if($_FILES['file']['size'] > 0 ){

	if($_FILES['file']['size'] <= 1053600){
		$URL = "../../img/portfolio/".$_FILES['file']['name'];
		$URL_SAVE = "img/portfolio/".$_FILES['file']['name'];
		if(move_uploaded_file($_FILES['file']['tmp_name'], $URL)){
			// Now Update Database as well
		$Title = $_POST['Title'];
		$Description = $_POST['Description'];
		$Bronze = $_POST['Bronze'];
		$Silver = $_POST['Silver'];
		$Gold = $_POST['Gold'];
		$Platinum = $_POST['Platinum'];
		$ROUTE_ID = $_POST['Route_id'];

		// echo "string ".$Title." ".$Description;

	  	// $strings = "DECLARE
				// 	D_ID NUMBER;
				// 	BEGIN
				// 	D_ID := SEQ_DISCOUNT.NEXTVAL;

				// 	INSERT INTO DISCOUNT (DISCOUNT_ID , OFFER_START , DESCRIPTION , 
				// 		ROUTE_ID , TITLE , IMAGE_URL) VALUES 
				// 	(D_ID , SYSDATE , '".$Description."' , '".$ROUTE_ID."' ,
				// 	'".$Title."' , '".$URL."');

				// 	INSERT INTO DISCOUNT_ITEM VALUES (D_ID , '1' , '".$Bronze."');
				// 	INSERT INTO DISCOUNT_ITEM VALUES (D_ID , '2' , '".$Silver."');
				// 	INSERT INTO DISCOUNT_ITEM VALUES (D_ID , '3' , '".$Gold."');
				// 	INSERT INTO DISCOUNT_ITEM VALUES (D_ID , '4' , '".$Platinum."');

				// 	END;";


		$strings = "DECLARE
					D_ID NUMBER;
					BEGIN
					D_ID := SEQ_DISCOUNT.NEXTVAL;

					INSERT INTO DISCOUNT (DISCOUNT_ID , OFFER_START , DESCRIPTION , ROUTE_ID , TITLE , IMAGE_URL) VALUES 
					(D_ID , SYSDATE , '".$Description."' , '".$ROUTE_ID."' ,'".$Title."' , '".$URL_SAVE."');

					INSERT INTO DISCOUNT_ITEM VALUES (D_ID , '1' , '".$Bronze."');
					INSERT INTO DISCOUNT_ITEM VALUES (D_ID , '2' , '".$Silver."');
					INSERT INTO DISCOUNT_ITEM VALUES (D_ID , '3' , '".$Gold."');
					INSERT INTO DISCOUNT_ITEM VALUES (D_ID , '4' , '".$Platinum."');

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

			// echo "Uploaded ".$_POST['Title'];
			// echo "Uploaded ".$_POST['Description'];
			echo "Uploaded ";


		}else{
			//Upload Failed
			echo "upload Failed";
		}
	}
	else{

		//File is too big
	}
}

 ?>