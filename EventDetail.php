<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="docs-assets/ico/favicon.png">

    <title>EVENTORY - Event Details</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/customstyles.css" rel="stylesheet">
    <link href="css/justified-nav.css" rel="stylesheet">
    <style>
      body{
        background-color: #7C578C;
        background: url('images/bg.png') repeat center center;
      }
	  
      #poster {
				float: left; 
				width: 40%;
				height: auto;
				padding: 10px; 
		}
		
		#detail {
				float: left; 
				width: 70%;
				height: auto;
				padding: 10px; 
		}
		
		#location {
				float: right; 
				width: 30%;
				height: auto;
				padding: 10px; 
		}
		
		#wellColor {
			background-color:#EED2EE;
		}
		
		#panelHead {
			background-color:#B5509C;
		}
		
		h1,h2,h3,h4{
			color:black;
		}
    </style>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
	
	<?php 
			include_once('includes/connection.php');
			include_once('model/eventmodel.php');
			
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$eventModel = new EventModel();
				$event = $eventModel->getEventById($id);
				if($event == null){
					header('Location: detailserror.php');
					exit();
				}
			}
			else{
				header('Location: search.php');
				exit();
			}
			$idevent = $event->idevent;
			$eventname = $event->eventname;
			$startdatetime = $event->startdatetime;
			$enddatetime = $event->enddatetime;
			$description = $event->description;
			$picture = $event->picture;
			$picturename = $event->picturename;
			$active = $event->active;
			//do postings here
		
		?>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
	<?php include('includes/nav.php'); ?>
	<div class="well" id="wellColor">

      <!-- Three columns of text below the carousel -->
      <div class="row">
		<div  class="col-md-14">
			<div id="poster">
				<img src="images/iPad.jpg" class="img-responsive" alt="Responsive image">
			</div>
		</div>
		<div  class="col-md-7">
			<h1><?php $eventname?></h1>
			<h3>OCBC Securities Private Limited </h3>
			<h3>Wednesday, February 26, 2014 from 6:30 PM to 8:30 PM</h3>
			<h3>De La Salle University, Manila</h3>
		</div>
		</div>
		<div class="row">
		<div  class="col-md-8" id="detail">
		<div class="panel panel-danger">
			<div class="panel-heading" id="panelHead" style="color:#FDF8FF;">Event Details</div>
			  <div class="panel-body">
				<h4>The Technical Analysis way</h4>
				<h5>Learn more about how technical analysis can help can help customers make smarter trading decisions</h5>
				<p><strong>This session will cover:</strong></p>
				<p>
					Why technical analysis is one of the best tool for analysing public financial market<br>
					The difference between technical analysis and fundamental analysis<br>
					Basic technical analysis methods and strategies<br>
					How to buy and sell in order to maximise returns and minimise risks<br>
					Some real examples of technical analysis application<br>
					Technical views on the current market outlook<br>
				</p>
				
			  </div>
			</div>
			
		</div>
		
		
		<div  class="col-md-4" id="location">
		<div class="panel panel-danger">
			<div class="panel-heading" id="panelHead" style="color:#FDF8FF;">When & Where</div>
			  <div class="panel-body">
				<?php include('includes/map.php'); ?>
				<p><br>2401 Taft Ave, Manila 1004, Philippines</p>
				<p>Wednesday, February 26, 2014 from 6:30 PM to 8:30 PM</p>
			  </div>
			</div>
		
		</div>
		
		<div  class="col-md-offset-8" id="location">
		<div class="panel panel-danger">
			<div class="panel-heading" id="panelHead" style="color:#FDF8FF;">Organizer</div>
			  <div class="panel-body">
				<h4>OCBC Securities Private Limited</h4>
				<p class="text-justify">OCBC Securities Private Limited ("OCBC Securities") is a wholly-owned subsidiary of 
				OCBC Bank and a member of the Singapore Exchange Securities Trading Limited (SGX-ST) and 
				the Singapore Exchange Derivatives Trading Limited (SGX-DT).<br><br>
				OCBC Securities, one of the leading stock and futures broking firms in Singapore, provides 
				full brokerage services for equities and derivatives trading. State-of-the-art technology is 
				employed to deliver speedy multi-market electronic execution of trades for our customers.</p>
			  </div>
			</div>
		
		
		</div>
		</div>
	
	</div>
	</div>
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
  </body>
</html>