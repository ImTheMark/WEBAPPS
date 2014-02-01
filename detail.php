<!DOCTYPE html>
<html lang="en">
  <head>
  
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/customstyles.css" rel="stylesheet">
		
		<style>
		
			#container1 {
				
				display: table; width: 100%;
				background-color: #F5F5F5;
				position:relative;
				
				
			}
			
			
			#poster {
				float: left; 
				width: 50%;
				padding: 10px; 
			}
			
			#detail {
				float: left; 
				width: 50%; 
				padding: 20px; 
			}
		
			#img{
				max-width:100%; 
				max-height:100%;
			
			}
			
			h1{
			
			   position: relative;  
				font-size: 70px;  
				margin-top: 0;  
				font-family: 'Myriad-Pro', 'Myriad', helvetica, arial, sans-serif;  
				text-shadow: 2px 3px 3px #292929;  
				letter-spacing: -7px;  
				-webkit-text-stroke: 1px white;  
			}
			
			h2{
			
			
			}
			p {
				font-size: 1em;
				line-height: 1.25em;
				margin: 1.25em 0;
				text-align: left;
				font-family:"Courier New", Courier, Monospace;
			}
		</style>
  </head>
  
  <body>

	<?php include('includes/nav.php'); ?>
	
	
	<div id ="container1">
		<div id="poster">
			<img id="img" img src="images/dlsu.jpg" alt="Generic placeholder image"> 	
		</div>
		<div id="detail">
			<h1> Job Expo</h1>
			<p>location : dlsu</p>
			<p>time : 2:00 pm - 5:00 pm</p>
			<p>price : free</p>
		</div>
	
	</div>
	<div id ="container2">
		<h2>Description</h2>
	</div>
	
	<script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
  </body>
</html>