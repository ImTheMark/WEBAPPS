<!DOCTYPE html>
<html>
	<head>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/customstyles.css" rel="stylesheet"> 
	</head>
	<body>
		<?php include('includes/nav.php'); 
			  include('includes/connection.php')?>
		<?php 
		$search = $_GET['search'];
		$query = "SELECT * FROM events WHERE eventname LIKE '%$search%'";
		
		
		
		$query = mysql_query($query);
		$numrows = mysql_num_rows($query);
		
		if($numrows > 0 ){
			while($row = mysql_fetch_assoc($query)){
				$id = $row['id'];
				$events = $row['eventname'];
				echo "<h2> id = ". $id . " eventname = " . $events . "<br></h2>";
			}
		}
		
		?>
		
		
		
		
		
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	
		
</html>