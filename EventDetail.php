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
	  
	  h3{
	  
		line-height: 0.9;
	  }
	  
	  h1{
		font-weight: bold;
	  }
	  
      #poster {
				float: left; 
				width: 70%;
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
			background-color:#A74CAB;
		}
		
		h1,h2,h3,h4{
			color:black;
		}
		
		span{
			color:gray;
		}
		
		#map{
			height:300px;  
			position: relative; 
			overflow: hidden;
		}
		@media screen and (max-width: 450px) {
			#location {
				float: none; 
				width: 100%;
				height: auto;
				padding: 10px; 
			}
			#detail {
				float: none; 
				width: 100%;
				height: auto;
				padding: 10px; 
			}
			#wellColor{
				float: none; 
				width: 100%;
				height: auto;
				padding: 10px; 
			}
			#info{
				
				float: none; 
				width: 70%;
				height: auto;
				padding: 10px; 
			}
			#map{
				height:100px;  
				position: block; 
				overflow: hidden;
			}
			
			 h3{
	  
				line-height: 0.9;
				font-size:20px;
			  }
			  
			  h1{
				font-weight: bold;
				font-size:25px;
			  }
		}
		

		/* AddThisEvent (add to your existing CSS) */
		.addthisevent-drop 						{display:inline-block;position:relative;z-index:999998;font-family:'Roboto',sans-serif;color:#fff!important;text-decoration:none;font-size:15px;text-decoration:none;}
		.addthisevent-drop:hover 				{color:#fff;font-size:15px;text-decoration:none;}
		.addthisevent_dropdown 					{position:relative;text-align:left;display:block!important;}
		.addthisevent_dropdown span 			{display:inline-block;position:relative;line-height:110%;background:#ebebeb url(../gfx/button-bg.png) repeat-x;text-decoration:none;font-size:14px;font-weight:300;color:#333;cursor:pointer;padding:7px 14px 8px 12px;border:1px solid #e1e1e1;margin:0px 6px 0px 0px;-moz-border-radius:4px;-webkit-border-radius:4px;}
		.addthisevent_dropdown span:hover 		{background:#f4f4f4;color:#000;text-decoration:none;font-size:14px;}
		.addthisevent_dropdown span:active 		{top:1px;}
		.addthisevent_dropdown .ateoutlook 		{border-top:3px solid #fa9d00;}
		.addthisevent_dropdown .ategoogle 		{border-top:3px solid #d53900;}
		.addthisevent_dropdown .atehotmail 		{border-top:3px solid #1473c5;}
		.addthisevent_dropdown .ateyahoo 		{border-top:3px solid #65106e;}
		.addthisevent_dropdown .ateical 		{border-top:3px solid #ab373a;}
		.addthisevent span 						{display:none!important;}
		.addthisevent-drop ._url,.addthisevent-drop ._start,.addthisevent-drop ._end,.addthisevent-drop ._summary,.addthisevent-drop ._description,.addthisevent-drop ._location,.addthisevent-drop ._organizer,.addthisevent-drop ._organizer_email,.addthisevent-drop ._facebook_event,.addthisevent-drop ._all_day_event {display:none!important;}
		.addthisevent_dropdown .copyx 			{display:none;}
		.addthisevent_dropdown .brx 			{display:none;}
		.addthisevent_dropdown .frs 			{position:absolute;top:8px;cursor:pointer;right:13px;padding-left:10px;font-style:normal;font-weight:normal;text-align:right;z-index:101;line-height:110%;background:#fff;text-decoration:none;font-size:10px;color:#cacaca;}
		.addthisevent_dropdown .frs:hover 		{color:#6d84b4;}
		.addthisevent 							{visibility:hidden;}

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
					header('Location: company.php');
					exit();
				}
			}
			else{
				header('Location: company.php');
				exit();
			}
			$idevent = $event->idevent;
			$eventname = $event->eventname;
			$location = $event->location;
			$startdatetime = date_create($event->startdatetime);
			$enddatetime = date_create($event->enddatetime);
			$eventdescription = $event->description;
			$picturelink = $event->picturelink;
			$picturename = $event->picturename;
			$active = $event->active;
			$companyid = $company->idcompany;
			$companyname = $company->companyname;
			$companydescription = $company->description;
			$companyemail = $company->email;
		
		?>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
	<?php include('includes/nav.php'); ?>
	<div class="well" id="wellColor" >

      <!-- Three columns of text below the carousel -->
      <div class="row"  >
		<div  class="col-md-14">
			<div  class="col-md-4">
				<div id="poster">
					<img src="<?php echo $picturelink ?>" class="img-responsive" alt="<?php echo $picturename?>">
				</div>
			</div>
			<div  class="col-md-8" id="info">
					<h1><?php echo $eventname?></h1>
					<h3><span>Organizer</span>  &nbsp&nbsp<?php echo $companyname ?> </h3>
					<h3><span>When</span>      &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp<?php echo date_format($startdatetime, 'l jS F Y') ?> </h3>
					<h3>          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<?php echo date_format($startdatetime, 'g:i a'); ?> to <?php echo date_format($enddatetime, 'g:i a'); ?></h3>
					<h3><span>Where</span>     &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp<?php echo $location ?> </h3>
				
					<div class="addthisevent">
						<h3><span>Add to Calendar</span></h3>
					    <span class="_start"><?php echo date_format($startdatetime, "d/m/Y H:i:s"); ?></span>
					    <span class="_end"><?php echo date_format($enddatetime, "d/m/Y H:i:s"); ?></span>
					    <span class="_summary"><?php echo $eventname?></span>
					    <span class="_zonecode"></span>
					    <span class="_description"><?php echo $eventdescription ?></span>
					    <span class="_location"><?php echo $location ?></span>
					    <span class="_organizer"><?php echo $companyname ?></span>
					    <span class="_organizer_email"><?php echo $companyemail; ?></span>
					    <span class="_facebook_event"></span>
					    <span class="_all_day_event">false</span>
					    <span class="_date_format">DD/MM/YYYY</span>
					</div>
					
			</div>
		</div>
		</div>
		<br>
		<div class="row">
		<div  class="col-md-8" id="detail">
		<div class="panel">
			<div class="panel-heading" id="panelHead" style="color:#FDF8FF;"><h4>Event Details</h4></div>
			  <div class="panel-body">
				<p>
					<?php echo $eventdescription ?>
				</p>
				
			  </div>
			</div>
			
		</div>
		
		
		<div  class="col-md-4" id="location">
		<div class="panel">
			<div class="panel-heading" id="panelHead" style="color:#FDF8FF;"><h4>When & Where</h4></div>
				
			  <div class="panel-body" >
				<div id="map"></div>
				<br>
				<p id="address"><?php echo $location ?></p>
				<p><?php echo date_format($startdatetime, 'l jS F Y') ?></p>
				<p><?php echo date_format($startdatetime, ' g:i a'); ?> </p>
			  </div>
			</div>
		
		</div>
		
		<div class="col-md-offset-8" id="location">
		<div class="panel">
			<div class="panel-heading" id="panelHead" style="color:#FDF8FF;"><h4>Organizer</h4></div>
			  <div class="panel-body">
				<h4><?php echo $companyname ?></h4>
				<p class="text-justify"><?php echo $companydescription ?></p>
				<p><span class="glyphicon glyphicon-info-sign"></span><a href="CompanyProfile.php?id=<?php echo $companyid; ?>">&nbsp Show Company Profile</a></p>
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
	<script src="js/removesessioncompanies.js"></script>
	<script src="js/removesessionevents.js"></script>
	
	  <!-- AddThisEvent -->
	<script type="text/javascript" src="http://js.addthisevent.com/atemay.js"></script>

	<!-- AddThisEvent Settings -->
	<script type="text/javascript">
	addthisevent.settings({
		mouse		: false,
		css			: false,
		outlook		: {show:true, text:"Outlook"},
		google		: {show:true, text:"Google"},
		yahoo		: {show:true, text:"Yahoo"},
		ical		: {show:true, text:"iCal"},
		hotmail		: {show:true, text:"Hotmail"}
	});
	</script>
  </body>
</html>