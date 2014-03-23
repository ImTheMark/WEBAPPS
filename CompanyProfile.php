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
		
		
		@media screen and (max-width: 1000px) {
			#pal{
				position:block;
				float:left;
			}
			
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
		
		.event-title {
			font-weight: bold;
			font-size: 25px;
		}
		.event-panel{
				color: #333333;
			}
			
		.col-xs-6 {
			width: 90%;
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
				$cEvents= $eventModel->getCurrentEventsGivenCompanyId($id);
				$pEvents= $eventModel->getPastEventsGivenCompanyId($id);
				$id = $company->idcompany;
				$name = $company->companyname;
				$description = $company->description;
				$email = $company -> email;
				$address = $company ->address;
				$contact = $company -> contactnumber;
				$website = $company->website;
				$picturename = $company->picturename;
				$picturelink = $company->picturelink;
				
				
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
								<?php foreach($cEvents as $cEvent){
									$id = $cEvent->idevent;
									$name = $cEvent->eventname;
									$date = date_create($cEvent->startdatetime);
									$location = $cEvent->location;
									$description = $cEvent->description;
									$picturelink = $cEvent->picturelink;
									$picturename = $cEvent->picturename;
								?>
								<div class="list-group-item clearfix event-panel" id="pal">
									<div class="thumbnail col-xs-1">
										<a href="EventDetail.php?id=<?php echo $id; ?>">
										  <img src="<?php echo $picturelink;?>" alt="<?php echo $picturename; ?>">
										</a>
									</div>
									<div class="col-xs-6" >
											<p class="event-title list-group-item-heading"><?php echo $name;?></p>
											<p class="event-body list-group-item-text">
												<span class="glyphicon glyphicon-calendar"></span> <?php echo date_format($date, 'l jS F Y'); ?>&nbsp
												<span class="glyphicon glyphicon-time"> <?php echo date_format($date, 'g:ia'); ?>
												<span class="glyphicon glyphicon-map-marker"></span> <?php echo $location; ?> </p>
											<p class="event-body list-group-item-text"><br><?php echo $description; ?></p>
									</div>
								</div>
								<?php } ?>
								
							</div>
						</div>
						<div class="tab-pane" id="past">
							<div class="list-group">
								<?php foreach($pEvents as $pEvent){
									$id = $pEvent->idevent;
									$name = $pEvent->eventname;
									$date = date_create($pEvent->startdatetime);
									$location = $pEvent->location;
									$description = $pEvent->description;
									$picturelink = $pEvent->picturelink;
									$picturename = $pEvent->picturename;
								?>
								<div class="list-group-item clearfix event-panel">
									<a href="EventDetail.php?id=<?php echo $id; ?>" class="thumbnail col-xs-1">
									  <img src="<?php echo $picturelink; ?>" alt="<?php echo $picturename; ?>">
									</a>
									<p class="event-title list-group-item-heading col-xs-6"><?php echo $name; ?></p>
									<p class="event-body list-group-item-text col-xs-6">
										<span class="glyphicon glyphicon-calendar"></span> <?php echo date_format($date, 'l jS F Y'); ?> &nbsp
										<span class="glyphicon glyphicon-time"> <?php echo date_format($date, 'g:ia'); ?>
										<span class="glyphicon glyphicon-map-marker"></span> <?php echo $location; ?> </p>
									<p class="event-body list-group-item-text col-xs-6"><br><?php echo $description; ?></p>
									
								</div>
								<?php } ?>
								
								
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
	<script src="js/removesessioncompanies.js"></script>
	<script src="js/removesessionevents.js"></script>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
  </body>
</html>