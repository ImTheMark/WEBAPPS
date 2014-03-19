<?php
	include_once('../includes/connection.php');

	$companyname = "";
	$description = "";
	$address = "";
	$contactnumber = "";
	$email = "";
	$website = "";
	$picturelink = "";
	$calendarlink = "";
	$categories = "";

	$idpicture = "";
	$idcategory = "";

	if(isset($_POST['companyname'])){
		$companyname = $_POST['companyname'];		
	}
	if(isset($_POST['description'])){
		$description = $_POST['description'];	
	}
	if(isset($_POST['address'])){
		$address = $_POST['address'];		
	}	
	if(isset($_POST['contactnumber'])){
		$contactnumber = $_POST['contactnumber'];		
	}
	if(isset($_POST['email'])){
		$email = $_POST['email'];	
	}
	if(isset($_POST['website'])){
		$website = $_POST['website'];		
	}	
	if(isset($_POST['picturelink'])){
		$picturelink = $_POST['picturelink'];		
	}	
	if(isset($_POST['calendarlink'])){
		$calendarlink = $_POST['calendarlink'];		
	}	
	if(isset($_POST['categories'])){
		$categories = $_POST['categories'];		
	}	

	$checkIfExisting = "SELECT companyname FROM company WHERE companyname = '$companyname';";
	$checkIfExisting = mysql_query($checkIfExisting);
	$cnumrows = mysql_num_rows($checkIfExisting);
	if($cnumrows > 0){
		$updateCompany = "UPDATE company SET companydescription = '$description', address = '$address', 
		contactnumber = '$contactnumber', email = '$email', website = '$website', calendarlink ='calendarlink' WHERE companyname = '$companyname';";
		mysql_query($updateCompany);
		$updateCompanyPicture = "UPDATE companypicture SET picturelink = '$picturelink' WHERE picturename = '$companyname';";
		mysql_query($updateCompanyPicture);
	}
	else{

		$insertImgQuery = "INSERT INTO companypicture (picturename, picturelink)
		VALUES ('$companyname','$picturelink');";

		mysql_query($insertImgQuery);

		$selectIdpictureQuery = "SELECT idcompanypicture FROM companypicture WHERE picturename = '$companyname';";

		$selectIdpictureQuery = mysql_query($selectIdpictureQuery);
				$numrows = mysql_num_rows($selectIdpictureQuery);
				if($numrows > 0 ){
					$row = mysql_fetch_assoc($selectIdpictureQuery);
					$idpicture = $row['idcompanypicture'];
				}

		$insertCompanyQuery = "INSERT INTO company (companyname, companydescription, address, contactnumber, email, idpicture, website, calendarlink) 
		VALUES ('$companyname','$description','$address','$contactnumber','$email', $idpicture, '$website', '$calendarlink');";

		mysql_query($insertCompanyQuery);

		$selectCompanyID = "SELECT idcompany FROM company
		WHERE companyname = '$companyname';";

		$selectCompanyID = mysql_query($selectCompanyID);
				$enumrows = mysql_num_rows($selectCompanyID);
				if($enumrows > 0 ){
					$erow = mysql_fetch_assoc($selectCompanyID);
					$eventID = $erow['idcompany'];
				}

		foreach ($categories as $selectedCategory) {
			$selectCategoryID = "SELECT idcategory FROM category WHERE category = '$selectedCategory';";
			$selectCategoryID = mysql_query($selectCategoryID);
			if($cnumrows > 0){
				$crow = mysql_fetch_assoc($selectCategoryID);
				$idcategory = $crow['idcategory'];
			}

			$insertCompanyCategory = "INSERT INTO company_category (idcompany, idcategory) VALUES ('$idcompany', '$idcategory');";
			mysql_query($insertCompanyCategory);
		}

	}


?>
