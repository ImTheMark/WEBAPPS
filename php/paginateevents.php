<?php
	include_once('../includes/connection.php');
	$selectedCategories = "";
	$selectedCompanies = "";
	$searchWord = "";
	
	if(isset($_POST['companies'])){
		$selectedCompanies = $_POST['companies'];		
	}
	if(isset($_POST['categories'])){
		$selectedCategories = $_POST['categories'];	
	}
	if(isset($_POST['searchWord'])){
		$searchWord = $_POST['searchWord'];		
	}	
	
	$query = "SELECT COUNT(*) as nRows
			  FROM company INNER JOIN company_event on company.idcompany = company_event.idcompany
			 INNER JOIN event on company_event.idevent = event.idevent
			 INNER JOIN company_category on company.idcompany = company_category.idcompany
			 INNER JOIN category on company_category.idcategory = category.idcategory";
	
	if($searchWord!=null && $searchWord!=""){
		$query.= " WHERE companyname LIKE '%" . $searchWord . "%' OR eventname LIKE '%" . $searchWord . "%'";
	}
	echo $query;
	
	$results = mysql_query($query);
	if(mysql_num_rows($results) > 0){
		$result = mysql_fetch_assoc($results);
		echo $result['nRows'];
	}
	else{
		// DB ERROR
	}
	
?>