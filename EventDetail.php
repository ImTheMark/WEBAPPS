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
				padding: 10px; 
          		display: block;
          		overflow: hidden;
          		height: 250px;
          		width: 400px;
		}
		
      #poster img {
		          display: block; /* Otherwise it keeps some space around baseline */
		          min-width: 100%;    /* Scale up to fill container width */
		          min-height: 100%;   /* Scale up to fill container height */
		          -ms-interpolation-mode: bicubic; /* Scaled images look a bit better in IE now */
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
		
		iframe{
			width:100%;
			height:100%;
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
			include_once('model/companymodel.php');
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$eventModel = new EventModel();
				$event = $eventModel->getEventById($id);
				$companyModel = new CompanyModel();
				$company = $companyModel->getCompanyGivenEventId($id);
				if($event == null){
					header('Location: search.php');
					exit();
				}
			}
			else{
				header('Location: search.php');
				exit();
			}
			$idevent = $event->idevent;
			$eventname = $event->eventname;
			$location = $event->location;
			$startdatetime = date_create($event->startdatetime);
			$enddatetime = $event->enddatetime;
			$eventdescription = $event->description;
			$picturelink = $event->picturelink;
			$picturename = $event->picturename;
			$active = $event->active;
			$companyname = $company->companyname;
			$companydescription = $company->description;
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
				<img src="<?php echo $picturelink ?>" class="img-responsive" alt="<?php echo $picturename?>">
			</div>
		</div>
		<div  class="col-md-7">
			<h1><?php echo $eventname?></h1>
			<h3><?php echo $companyname ?></h3>
			<h3><?php echo date_format($startdatetime, 'l jS F Y') ?></h3>
			<h3><?php echo date_format($startdatetime, 'G:ia'); ?> </h3>
			<h3><?php echo $location ?></h3>
		</div>
		</div>
		<div class="row">
		<div  class="col-md-8" id="detail">
		<div class="panel panel-danger">
			<div class="panel-heading" id="panelHead" style="color:#FDF8FF;">Event Details</div>
			  <div class="panel-body">
				<p>
					<?php echo $eventdescription ?>
				</p>
				
			  </div>
			</div>
			
		</div>
		
		
		<div  class="col-md-4" id="location">
		<div class="panel panel-danger">
			<div class="panel-heading" id="panelHead" style="color:#FDF8FF;">When & Where</div>
			  <div id="map" style="width: 300px; height: 300px;"></div>
			  <div class="panel-body">
				<p id="address"><?php echo $location ?></p>
				<p><?php echo date_format($startdatetime, 'l jS F Y') ?></p>
				<p><?php echo date_format($startdatetime, 'G:ia'); ?> </p>
			  </div>
			</div>
		
		</div>
		
		<div class="col-md-offset-8" id="location">
		<div class="panel panel-danger">
			<div class="panel-heading" id="panelHead" style="color:#FDF8FF;">Organizer</div>
			  <div class="panel-body">
				<h4><?php echo $companyname ?></h4>
				<p class="text-justify"><?php echo $companydescription ?></p>
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
	<script src="http://maps.google.com/maps/api/js?sensor=false" 
           type="text/javascript"></script> 
    <script src="js/bootstrap.min.js"></script>
	<script src="js/eventdetail.js"></script>
    <script src="js/holder.js"></script>
	 <script src="js/removesession.js"></script>
	
  </body>
</html>