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
				padding: 10px; 
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
		
		@media screen and (max-width: 450px) {
			#pal{
				position:block;
				float:left;
			}
			
		}
		
		.list-group{
			max-height: 400px;
			overflow-y:scroll; 
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
	<?php include('includes/nav.php'); 
		include('model/CompanyModel.php');
		include('model/EventModel.php');
	if(isset($_GET['id'])){
				$id = $_GET['id'];
				$companyModel = new CompanyModel();
				$company = $companyModel->getCompanyById($id);
				if($company == null){
					header('Location: search.php');
					exit();
				}
				
				$eventModel = new EventModel();
				$events= $eventModel->getEventsGivenCompanyId($id);
				$id = $company->idcompany;
				$name = $company->companyname;
				$description = $company->description;
				$email = $company -> email;
				$address = $company ->address;
				$contact = $company -> contactnumber;
				$website = $company->website;
				$picturename = $company->picturename;
				$picturelink = $company->picturelink;
				echo $id;
			}
	
	
	?>
	<div class="well" id="wellColor">

      <!-- Three columns of text below the carousel -->
      <div class="row">
		<div  class="col-md-14">
			<div  class="col-md-4">
				<div id="poster">
					<img src="<?php echo $picturelink;?>" class="img-responsive" alt="<?php echo $picturename; ?>">
				</div>
			</div>
			<br>
			<div  class="col-md-8">
			<div class="panel" id="pal">
				<div class="panel-heading" id="panelHead" style="color:#FDF8FF;"><h4><?php echo $name; ?><h4></div>
				  <div class="panel-body">
					<p><?php echo $description ;?></strong></p>
					<a href="<?php echo $website; ?>"><?php echo $website; ?></a></li>
					</div>
			</div>
			</div>
		</div>
	  </div>
		
		<div class="row">
		<div  class="col-xs-12" >
			<div class="panel">	
				<div class="panel-heading" id="panelHead" style="color:#FDF8FF;"><h4>Events</h4></div>
				  <div class="panel-body" >			
						<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
							<li class="active"><a href="#current" data-toggle="tab">Current Events</a></li>
							<li><a href="#past" data-toggle="tab">Past Events</a></li>
						</ul>
					 <div id="my-tab-content" class="tab-content">
						<div class="tab-pane active" id="current">
							<div class="list-group">
								
								<div class="list-group-item clearfix">
									<a href="#" class="thumbnail col-xs-1">
									  <img src="images/IT-poster2.png" alt="...">
									</a>
									<p class="event-title list-group-item-heading col-xs-6">IT-Servece</p>
									<p class="event-body list-group-item-text col-xs-6">
										<span class="glyphicon glyphicon-calendar"></span> August 04,2014 &nbsp
										<span class="glyphicon glyphicon-time"> 8am - 5pm
										<span class="glyphicon glyphicon-map-marker"></span> Edsa Shangrila </p>
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
								<div class="list-group-item clearfix">
									<a href="#" class="thumbnail col-xs-1">
									  <img src="images/IT-poster2.png" alt="...">
									</a>
									<p class="event-title list-group-item-heading col-xs-6">IT-Servece</p>
									<p class="event-body list-group-item-text col-xs-6">
										<span class="glyphicon glyphicon-calendar"></span> August 04,2014 &nbsp
										<span class="glyphicon glyphicon-time"> 8am - 5pm
										<span class="glyphicon glyphicon-map-marker"></span> Edsa Shangrila </p>
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
								<div class="list-group-item clearfix">
									<a href="#" class="thumbnail col-xs-1">
									  <img src="images/IT-poster2.png" alt="...">
									</a>
									<p class="event-title list-group-item-heading col-xs-6">IT-Servece</p>
									<p class="event-body list-group-item-text col-xs-6">
										<span class="glyphicon glyphicon-calendar"></span> August 04,2014 &nbsp
										<span class="glyphicon glyphicon-time"> 8am - 5pm
										<span class="glyphicon glyphicon-map-marker"></span> Edsa Shangrila </p>
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
								<div class="list-group-item clearfix">
									<a href="#" class="thumbnail col-xs-1">
									  <img src="images/IT-poster2.png" alt="...">
									</a>
									<p class="event-title list-group-item-heading col-xs-6">IT-Servece</p>
									<p class="event-body list-group-item-text col-xs-6">
										<span class="glyphicon glyphicon-calendar"></span> August 04,2014 &nbsp
										<span class="glyphicon glyphicon-time"> 8am - 5pm
										<span class="glyphicon glyphicon-map-marker"></span> Edsa Shangrila </p>
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
								<div class="list-group-item clearfix">
									<a href="#" class="thumbnail col-xs-1">
									  <img src="images/IT-poster2.png" alt="...">
									</a>
									<p class="event-title list-group-item-heading col-xs-6">IT-Servece</p>
									<p class="event-body list-group-item-text col-xs-6">
										<span class="glyphicon glyphicon-calendar"></span> August 04,2014 &nbsp
										<span class="glyphicon glyphicon-time"> 8am - 5pm
										<span class="glyphicon glyphicon-map-marker"></span> Edsa Shangrila </p>
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
									<p class="event-title list-group-item-heading col-xs-6">Game</p>
									<p class="event-body list-group-item-text col-xs-6">
										<span class="glyphicon glyphicon-calendar"></span> August 04,2014 &nbsp
										<span class="glyphicon glyphicon-time"> 8am - 5pm
										<span class="glyphicon glyphicon-map-marker"></span> Edsa Shangrila </p>
									<p class="event-body list-group-item-text col-xs-6"><br>Using the Visual Thinking Strategies (VTS) facilitation method, this event 
									encourages educators to explore works from Public Intimacy at YBCA....</p>
									
								</div>
								<div class="list-group-item clearfix">
									<a href="#" class="thumbnail col-xs-1">
									  <img src="images/IT-poster.png" alt="...">
									</a>
									<p class="event-title list-group-item-heading col-xs-6">IT-Service</p>
									<p class="event-body list-group-item-text col-xs-6">
										<span class="glyphicon glyphicon-calendar"></span> August 04,2014 &nbsp
										<span class="glyphicon glyphicon-time"> 8am - 5pm
										<span class="glyphicon glyphicon-map-marker"></span> Edsa Shangrila </p>
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