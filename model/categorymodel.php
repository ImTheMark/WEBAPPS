<?php
	include_once('includes/connection.php');
	include_once('objects/categoryobject.php');
	class CategoryModel{
	
		function getAllCategories(){
			$categories =  array();
			
			$query = "SELECT * 
					 FROM category";
					 
			$query = mysql_query($query);
			$numrows = mysql_num_rows($query);
				
				if($numrows > 0 ){
					while($row = mysql_fetch_assoc($query)){
						$idcategory = $row['idcategory'];
						$category = $row['category'];
						
						$category = new CategoryObject($idcategory,$category);
						array_push($categories, $category);
						
					}
				}
				return $categories;
		}
		
		function getCompanyCategories($idcompany){
			
			
			$query = "SELECT category.idcategory , category FROM 
				company INNER JOIN company_category INNER JOIN category
				WHERE company.idcompany = company_category.idcompany and company_category.idcategory = category.idcategory
				and company.idcompany=". $idcompany ;
			$query = mysql_query($query);
			$numrows = mysql_num_rows($query);
			
			$categories = array();
			
			if($numrows > 0 ){
					while($row = mysql_fetch_assoc($query)){
						$idcategory = $row['idcategory'];
						$category = $row['category'];
						$category = new CategoryObject($idcategory,$category);
						array_push($categories, $category);
					}
				}
			return $categories;
		}
	
	}
	

?>