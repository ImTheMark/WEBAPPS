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
	
	print_r($selectedCategories);
	print_r($selectedCompanies);
	print_r($searchWord);
	
	$query = "SELECT COUNT(*) FROM event";
	
	$results = mysql_query($query)

?>