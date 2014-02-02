<?php

	include('includes/connection.php');
	include('objects/companyobject.php');
	
	class CompanyModel{
		function getAllCompanies(){
			$companies =  array();
			
			$query = "SELECT * 
					 FROM company";
					 
			$query = mysql_query($query);
			$numrows = mysql_num_rows($query);
				
				if($numrows > 0 ){
					while($row = mysql_fetch_assoc($query)){
						$idcompany = $row['idcompany'];
						$companyname = $row['companyname'];
						$address = $row['address'];
						$contactnumber = $row['contactnumber'];
						$email = $row['email'];
						
						$company = new CompanyObject($idcompany,$companyname,$address,$contactnumber,$email);
						array_push($companies, $company);
						
					}
				}
				return $companies;
		}
		
		function getAllCompaniesByCategory($arraycategoriesobjects){
			$companies =  array();
			
			$query = "SELECT * FROM webapps.company_category INNER JOIN webapps.company 
					ON webapps.company_category.idcompany = webapps.company.idcompany";
			
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
						$address = $row['address'];
						$contactnumber = $row['contactnumber'];
						$email = $row['email'];
						
						$company = new CompanyObject($idcompany,$companyname,$address,$contactnumber,$email);
						array_push($companies, $company);
						
					}
				}
				return $companies;
		}
		
	}

?>

