<!DOCTYPE html>
<html lang="en">
  <head>
  
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/customstyles.css" rel="stylesheet">
		
		<style>
		      body{
		        background-color: #7C578C;
		        background: url('images/bg.png') repeat center center;
		      }
		
			#container1 {
				
				display: table; width: 100%;
				background-color: #F5F5F5;
				position:relative;
				
				
			}
			
			#container2 {
				
				display: table; width: 100%;
				background-color: #F5F5F5;
				position:relative;
				border: 1px solid black;
				border-radius: 5px;
				padding: 10px;
				
				
			}
			
			
			#poster {
				float: left; 
				width: 40%;
				height: 600px;
				padding: 10px; 
			}
			
			#detail {
				
				float: left; 
				width: 60%; 
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
				
				text-shadow: 2px 3px 3px #292929;  
				letter-spacing: -7px;  
				-webkit-text-stroke: 1px white;  
				
				background: #95a5a6;
				padding: 0px 0px 0px 10px;
				font-weight: bold;
				color: #ffffff;
			}
			
			h2{
			
			
			}
			p {
				font-size: 1.25em;
				line-height: 1.25em;
				font-weight: bold;
				margin: 1.25em 0;
				text-align: left;
				font-family:"Arial", Courier, Monospace;
				text-align: justify;
			}
			
			h2{
				
				font-weight: bold;
				
			}
			
			h1 span{
				font-size: 35px;
				letter-spacing: 1px;
			}
			
			.panel-title{
				font-weight: bold;
				font-size: 35px;
			
			}
			
			.panel-body{
				text-align: justify;
			}
			
		</style>
    <title>EVENTORY - IT Services</title>
  </head>
  
  <body>

	<?php include('includes/nav.php'); ?>
	
	
	<div id ="container1">
		<div id="poster">
			<img id="img" img src="images/IT-poster2.png" alt="Generic placeholder image"> 	
		</div>
		<div id="detail">
			<h1> IT SERVICES <span>  by Azeus</span></h1>
			<div class="well">
				<p>DATE : MARCH 20, 2014</p>
				<p>TIME : 2:00 pm - 5:00 pm</p>
				<p>LOCATION : DE LASALLE UNIVERSITY&nbsp;<span style="font-size: 10px;"><a href="#map">SEE DIRECTIONS</a></span></p>
				<p>CATEGORY : COMPUTER</p>
			</div>
			
			
			
			<div class="panel panel-default">
            <div class="panel-heading">
			
              <h3 class="panel-title">Description</h3>
            </div>
            <div class="panel-body">
              IT workshop is an event for computer science student. It will held on march 20, 2014 in De Lasalle University. This speaker of this workshop is from Australia University. 
			  bhdksdks skdkdjk jkasjkdjads lsdkdlad ljdladka klkldakdka adaldalk kdladklad kdjksdj. Lkdkadka akdlakdakld kladkadka k;asdadka jkaskjdja jfejfje jfjjdf jksdkj bdsbds sdhshdjshd
			  djhshkdshjd hdskhdhskjd shdskhdhf fhfkhdhfdjhf fhjhffhd fhdhfdh. Hjdhfkhdfkhdjf hdfjkhdfhjdhf dhjkfdjhfhjd. sklsfl hfkhhjksfhjs fhkhfksdhjkfhs dkhhdjfhjdf kfhfdhf
			  dhfdhjkfhsjk skjhfhksfhks dhkfshfhjs dhfshfhsd skfhksfhs kjhsfhksfhjs kjhsdfhksfh slkhlkfshfsh.
          </div>
			
		</div>


			<div class="panel panel-default">
            <div class="panel-heading">
			
              <h3 class="panel-title">Directions</h3>
            </div>
            <div class="panel-body"><a id="map">
				<img src="images/map.png" width="620px"/></a>
			</div>
			
		</div>
		
	</div>
	
	
	<script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
  </body>
</html>