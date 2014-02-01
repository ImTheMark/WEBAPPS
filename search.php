<!DOCTYPE html>
<html>
	<head>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/customstyles.css" rel="stylesheet">
	</head>
	<body>
		<?php include('includes/nav.php'); 
			  include('includes/connection.php');?>
		<?php 
		$search = $_GET['search'];
		$query = "SELECT * FROM company ";
		
		
		
		$query = mysql_query($query);
		$numrows = mysql_num_rows($query);
		
		if($numrows > 0 ){
			while($row = mysql_fetch_assoc($query)){
				$id = $row['idcompany'];
				$companyname = $row['companyname'];
				$contact = $row['contact'];
				echo "<h2> id = ". $id . " companyname = " . $companyname . " contact = " . $contact . " " . "<br></h2>";
			}
		}
		
		
		
		?>
		
		
		
		
		
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	
		
</html>