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
				width: 100%;
				height: auto;
				padding: 20px; 
		}
		
		
		#wellColor {
			background-color:#EED2EE;
		}
		
		#panelHead {
			background-color:#A74CAB;
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
  </head>
<!-- NAVBAR
================================================== -->
  <body>
	<?php include('includes/nav.php'); ?>
	<div class="well" id="wellColor">

      <!-- Three columns of text below the carousel -->
      <div class="row">
		<div  class="col-md-14">
			<div  class="col-md-4">
				<div id="poster">
					<img src="images/accenture.jpg" class="img-responsive" alt="Responsive image">
				</div>
			</div>
			<br>
			<div  class="col-md-8">
			<div class="panel" >
				<div class="panel-heading" id="panelHead" style="color:#FDF8FF;"><h4>Accenture| Management consulting, Technology and Outsourcing<h4></div>
				  <div class="panel-body">
					<p>Accenture helps organizations assess how to maximize their performance and works with them to achieve their vision. We develop and 
					implement technology to improve our clients' productivity and efficiency - and may run parts of their business. Ultimately, we enable 
					our clients to become high-performance businesses and governments.</p>
					<p><strong>official website:</strong></p>
					<a href="http://www.accenture.com">http://www.accenture.com</a></li>
					</div>
			</div>
			</div>
		</div>
		</div>
		
		<div class="row">
		<div  class="col-xs-12" >
			<div class="panel panel-danger">	
				<div class="panel-heading" id="panelHead" style="color:#FDF8FF;"><h4>Events</h4></div>
				  <div class="panel-body" >			
						<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
							<li class="active"><a href="#current" data-toggle="tab">Current Events</a></li>
							<li><a href="#past" data-toggle="tab">Past Events</a></li>
						</ul>
					 <div id="my-tab-content" class="tab-content">
						<div class="tab-pane active" id="current">
							<div class="list-group">
								<div class="list-group-item clearfix" id="detail">
									<a href="#" class="thumbnail col-xs-1">
									  <img src="images/IT-poster2.png" alt="...">
									</a>
									<p class="event-title list-group-item-heading col-xs-6">IT SERVICES</p>
									<p class="event-body list-group-item-text col-xs-6">
										<span class="glyphicon glyphicon-calendar"></span> January 23,2014 &nbsp
										<span class="glyphicon glyphicon-time"> 8am
										<span class="glyphicon glyphicon-map-marker"></span> DLSU </p>
									<p class="event-body list-group-item-text col-xs-6"><br>Using the Visual Thinking Strategies (VTS) facilitation method, this event 
									encourages educators to explore works from Public Intimacy at YBCA....</p>
								</div>
								<div class="list-group-item clearfix">
									<a href="#" class="thumbnail col-xs-1">
									  <img src="images/leap.jpg" alt="...">
									</a>
									<p class="event-title list-group-item-heading col-xs-6">LEAP</p>
									<p class="event-body list-group-item-text col-xs-6">
										<span class="glyphicon glyphicon-calendar"></span> August 04,2014 &nbsp
										<span class="glyphicon glyphicon-time"> 8am - 5pm
										<span class="glyphicon glyphicon-map-marker"></span> Edsa Shangrila </p>
									<p class="event-body list-group-item-text col-xs-6"><br>Using the Visual Thinking Strategies (VTS) facilitation method, this event 
									encourages educators to explore works from Public Intimacy at YBCA....</p>
									
								</div>
							</div>
						</div>
						<div class="tab-pane" id="past">
							<div class="list-group">
								<div class="list-group-item clearfix">
									<a href="#" class="thumbnail col-xs-1">
									  <img src="images/gamedev-poster.png" alt="...">
									</a>
									<p class="event-title list-group-item-heading col-xs-6">Game Development</p>
									<p class="event-body list-group-item-text col-xs-6">
										<span class="glyphicon glyphicon-calendar"></span> March 23,2014 &nbsp
										<span class="glyphicon glyphicon-time"> 8am - 4pm
										<span class="glyphicon glyphicon-map-marker"></span> DLSU </p>
									<p class="event-body list-group-item-text col-xs-6"><br>Using the Visual Thinking Strategies (VTS) facilitation method, this event 
									encourages educators to explore works from Public Intimacy at YBCA....</p>
								</div>
								<div class="list-group-item clearfix">
									<a href="#" class="thumbnail col-xs-1">
									  <img src="images/IT-poster.png" alt="...">
									</a>
									<p class="event-title list-group-item-heading col-xs-6">IT Services</p>
									<p class="event-body list-group-item-text col-xs-6">
										<span class="glyphicon glyphicon-calendar"></span> Febuary 29,2014 &nbsp
										<span class="glyphicon glyphicon-time"> 10am - 1pm
										<span class="glyphicon glyphicon-map-marker"></span> Makati Shangrila </p>
									<p class="event-body list-group-item-text col-xs-6"><br>Using the Visual Thinking Strategies (VTS) facilitation method, this event 
									encourages educators to explore works from Public Intimacy at YBCA....</p>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<<script type="text/javascript">
		jQuery(document).ready(function ($) {
		$('#tabs').tab();
		});
	</script> 

		<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
  </body>
</html>