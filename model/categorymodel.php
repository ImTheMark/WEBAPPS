<?php
	include('includes/connection.php');
	include('objects/categoryobject.php');
	class CategoryModel{
	
		function getAllCategories(){
			$categories =  array();
			
			$query = "SELECT * 
					 FROM webapps.category";
					 
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
	
	}


?>