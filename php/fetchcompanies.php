<?php


	$query = "SELECT * FROM company INNER JOIN companypicture on company.idpicture = companypicture.idcompanypicture";
					 
	$query = mysql_query($query);
	$numrows = mysql_num_rows($query);
		
		if($numrows > 0 ){
			while($row = mysql_fetch_assoc($query)){
				$idcompany = $row['idcompany'];
				$companyname = $row['companyname'];
				$description = $row['companydescription'];
				$address = $row['address'];
				$contactnumber = $row['contactnumber'];
				$email = $row['email'];
				$website = $row['website'];
				$picturelink= $row['picturelink'];
				$picturename = $row['picturename'];
				$categoryModel = new CategoryModel();
			
				$categories = $categoryModel->getCompanyCategories($idcompany);
				$company = new CompanyObject($idcompany,$companyname,$description,$address,$contactnumber,$email,$website,$categories,$picturename, $picturelink);
				array_push($companies, $company);
				
			}
		}



?>