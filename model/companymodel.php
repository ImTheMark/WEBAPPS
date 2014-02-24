<?php

	include_once('includes/connection.php');
	include_once('objects/companyobject.php');
	include_once('model/categorymodel.php');
	class CompanyModel{
		
		function getAllCompanies(){
			$companies =  array();
			
			$query = "SELECT * 
					 FROM company INNER JOIN companypicture on company.idpicture = companypicture.idcompanypicture";
					 
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
				return $companies;
		}
		
		function getCompanyById($id){
			$query = "SELECT * 
					 FROM company INNER JOIN companypicture on company.idpicture = companypicture.idcompanypicture WHERE idcompany =" . $id;
					 
			$query = mysql_query($query);
			$numrows = mysql_num_rows($query);
			if($numrows > 0){
				$row = mysql_fetch_assoc($query);
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
				$company = new CompanyObject($idcompany,$companyname,$description,$address,$contactnumber,$email,$website,$categories,$picturename,$picturelink);
				return $company;
			}
			else{
				return null;
			}
		}
		
		function getAllCompaniesByCategory($arraycategoriesobjects){
			$companies =  array();
			
			$query = "SELECT * FROM company_category INNER JOIN company 
					ON company_category.idcompany = company.idcompany";
			
			$i = 0;
			foreach($arraycategoriesobjects as $category){
				if($i ==0){
					$query .= " WHERE idcategory = " . $category->idcategory;
					$i == 1;
				}
				else{
					$query.= "OR idcategory = " . $category->idcategory;
				}					
			}
					 
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
						$categoryModel = new CategoryModel();
					
						$categories = $categoryModel->getCompanyCategories($idcompany);
						$company = new CompanyObject($idcompany,$companyname,$description,$address,$contactnumber,$email,$website,$categories,null,null);
						array_push($companies, $company);
						
					}
				}
				return $companies;
		}
		
		function getCompanyGivenEventId($id){
			$query = "SELECT *
					  FROM company
					  INNER JOIN company_event ON company.idcompany = company_event.idcompany
					  INNER JOIN event ON company_event.idevent = event.idevent
					  WHERE event.idevent=$id;";
			$query = mysql_query($query);
			$numrows = mysql_num_rows($query);
			
			if($numrows > 0 ){
				$row = mysql_fetch_assoc($query);
					$idcompany = $row['idcompany'];
					$companyname = $row['companyname'];
					$description = $row['companydescription'];
					$address = $row['address'];
					$contactnumber = $row['contactnumber'];
					$email = $row['email'];
					$website = $row['website'];
					$categoryModel = new CategoryModel();
				
					$categories = $categoryModel->getCompanyCategories($idcompany);
					$company = new CompanyObject($idcompany,$companyname,$description,$address,$contactnumber,$email,$website,$categories,null,null);
					return $company;		
			}
			else{
				return null;
			}
		}
		
	}
?>

