<?php

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

	echo $eventname . " " . $location . " " . $startdatetime . " " . $enddatetime . " " . $description . " " . $photoURL . " " . $companyID;

?>