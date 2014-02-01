<!DOCTYPE html>
<html>
	<head>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/customstyles.css" rel="stylesheet">
	</head>
	<body>
		<?php include('includes/nav.php');
			include('model/eventmodel.php');?>
		
		<button type="submit" onclick = "myfunc()">Submit</button>
		<p id ="S"> HELLO </p>
		
		<script>
			function myfunc(){
				x = document.getElementById('S');
				x.innerHTML = "<?php
						echo "HESS";
					?>";
			}
		</script>
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	
		
</html>