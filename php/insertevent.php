<?php
	include_once('../includes/connection.php');

	$eventname = "";
	$location = "";
	$startdatetime = "";
	$enddatetime = "";
	$description = "";
	$photoURL = "";
	$companyID = "";

	$idpicture = "";
	$eventID = "";

	if(isset($_POST['eventname'])){
		$eventname = $_POST['eventname'];		
	}
	if(isset($_POST['location'])){
		$location = $_POST['location'];	
	}
	if(isset($_POST['startdatetime'])){
		$startdatetime = $_POST['startdatetime'];		
	}	
	if(isset($_POST['enddatetime'])){
		$enddatetime = $_POST['enddatetime'];		
	}
	if(isset($_POST['description'])){
		$description = $_POST['description'];	
	}
	if(isset($_POST['photoURL'])){
		$photoURL = $_POST['photoURL'];		
	}	
	if(isset($_POST['companyID'])){
		$companyID = $_POST['companyID'];		
	}	

	$checkIfExisting = "SELECT eventname FROM event WHERE eventname = '$eventname';";
	$checkIfExisting = mysql_query($checkIfExisting);
		$cnumrows = mysql_num_rows($checkIfExisting);
		if($cnumrows > 0){
			$updateEvent = "UPDATE event SET location = '$location', startdatetime = '$startdatetime', 
			enddatetime = '$enddatetime', description = '$description'
			WHERE eventname = '$eventname';";
			mysql_query($updateEvent);
			$updateEventPicture = "UPDATE eventpicture SET picturelink = '$photoURL' WHERE picturename = '$eventname';";
			mysql_query($updateEventPicture);
		}
		else{

			$insertImgQuery = "INSERT INTO eventpicture (picturename, picturelink)
			VALUES ('$eventname','$photoURL');";

			mysql_query($insertImgQuery);

			$selectIdpictureQuery = "SELECT ideventpicture FROM eventpicture WHERE picturename = '$eventname';";

			$selectIdpictureQuery = mysql_query($selectIdpictureQuery);
					$numrows = mysql_num_rows($selectIdpictureQuery);
					if($numrows > 0 ){
						$row = mysql_fetch_assoc($selectIdpictureQuery);
						$idpicture = $row['ideventpicture'];
					}

			$insertEventQuery = "INSERT INTO event (eventname, location, startdatetime, enddatetime, description, active, idpicture) 
			VALUES ('$eventname','$location','$startdatetime','$enddatetime','$description','YES', $idpicture);";

			mysql_query($insertEventQuery);

			$selectEventID = "SELECT idevent FROM event
			WHERE eventname = '$eventname';";

			$selectEventID = mysql_query($selectEventID);
					$enumrows = mysql_num_rows($selectEventID);
					if($enumrows > 0 ){
						$erow = mysql_fetch_assoc($selectEventID);
						$eventID = $erow['idevent'];
					}

			$insertCompanyEventQuery = "INSERT INTO company_event 
			VALUES ('$companyID', '$eventID'); ";

			mysql_query($insertCompanyEventQuery);


		}
?>
