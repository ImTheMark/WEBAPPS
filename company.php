
<!DOCTYPE html>
<html>
	<head>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/customstyles.css" rel="stylesheet">
		<style>
      body{
        background-color: #7C578C;
        background: url('images/bg.png') repeat center center;
      }
      </style>

    <title>EVENTORY - Company List</title>
	</head>
	<body>
	
		
		<?php include('includes/nav.php'); 
		?>
		
		
		<h3> <div class="label label-default"> List of Companies </div></h3>
		<BR>
			
		  
			<div class="col-md-12">
				<div class="list-group">
					<div class="list-group-item clearfix">
						<img src="images/accenture.jpg" class="col-xs-3 img-responsive"/>
						<p class="list-group-item-heading col-xs-6">ACCENTURE</p>
						<p class="list-group-item-text col-xs-6">
							LOCATION:	Makati<br>
							CONTACT NUMBER:	89333566<br>
							EMAIL: accenture@accenture.com<br><br>
						<a class="btn btn-sm btn-primary" href="search.php" role="button">View Company Events</a>&nbsp;&nbsp;<a class="btn btn-sm btn-primary" href="http://accenture.com" role="button">View Website</a></p>
					</div>
					<div class="list-group-item clearfix">
						<img src="images/globe.jpg" class="col-xs-3 img-responsive"/>
						<p class="list-group-item-heading col-xs-6">GLOBE</p>
						<p class="list-group-item-text col-xs-6">
							LOCATION:	Makati<br>
							CONTACT NUMBER:	67489335<br>
							EMAIL: globe@globe.com<br><br>
						<a class="btn btn-sm btn-primary" href="search.php" role="button">View Company Events</a>&nbsp;&nbsp;
						<a class="btn btn-sm btn-primary" href="http://globe.com.ph" role="button">View Website</a></p>
					</div>
					<div class="list-group-item clearfix">
						<img src="images/google.jpg" class="col-xs-3 img-responsive"/>
						<p class="list-group-item-heading col-xs-6">GOOGLE</p>
						<p class="list-group-item-text col-xs-6">
							LOCATION:	Makati<br>
							CONTACT NUMBER:	2236646<br>
							EMAIL: GOOGLE@google.com<br><br>
						<a class="btn btn-sm btn-primary" href="search.php" role="button">View Company Events</a>&nbsp;&nbsp;
						<a class="btn btn-sm btn-primary" href="http://google.com" role="button">View Website</a></p>
					</div>
					<div class="list-group-item clearfix">
						<img src="images/hp.jpg" class="col-xs-3 img-responsive" height="150px"/>
						<p class="list-group-item-heading col-xs-6">HP</p>
						<p class="list-group-item-text col-xs-6">
							LOCATION:	Makati<br>
							CONTACT NUMBER:	7384758<br>
							EMAIL: HP@hp.com<br><br>
						<a class="btn btn-sm btn-primary" href="search.php" role="button">View Company Events</a>&nbsp;&nbsp;
						<a class="btn btn-sm btn-primary" href="http://hp.com" role="button">View Website</a></p>
					</div>
				</div>
			</div>


		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	
		
</html>