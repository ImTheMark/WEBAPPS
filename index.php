<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="docs-assets/ico/favicon.png">

    <title>EVENTORY - Homepage</title>

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
      .jumbotron{
        background-color: #DFBFFF;
      }
      .searchbox{
        height: 60px !important;
        font-size: 35px;
      }
      .col-centered{
        padding-top: 10px;
        margin: 0 auto;
        float: none;
      }
      .details{
        margin: 15px;
      }
      a.nohover { 
        color: #333333; 
      }
      a.nohover:hover { 
        text-decoration: none;
      }
      .panel:hover{
        box-shadow: 0 0 3px #333333;
      }
      .poster {
          display: block;
          overflow: hidden;
          height: 250px;
          width: 100%;
      }

      .poster img {
          display: block; /* Otherwise it keeps some space around baseline */
          min-width: 100%;    /* Scale up to fill container width */
          min-height: 100%;   /* Scale up to fill container height */
          -ms-interpolation-mode: bicubic; /* Scaled images look a bit better in IE now */
      }

      

    </style>
	
	<?php
		include_once('model/eventmodel.php');
		$model = new EventModel;
		$events = $model->getLatestEventsForHomepage();
	?>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
	<?php include('includes/nav.php'); ?>
<!--

      .poster img{
        position: relative;
        top: 0;
        left: 0;
        min-width: 100%;
        height: 333px;
        max-width: 100%;
      }
      .panel{
        height: 450px;
      }
-->

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>SEARCH FOR EVENTS</h1>
        <p>EVENTORY provides a wide range of events for the students to browse through. Events can be listed 
        by date, company or categories. Students will have an easy time looking for events that will be suitable 
        for their interests.</p>
        <p>
          <div class="col-lg-6 col-centered">
            <div class="input-group">
              <input type="text" class="searchbox form-control">
              <span class="input-group-btn">
                <button class="btn btn-success" type="button">Go!</button>
              </span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
        </p>
      </div>
    </div>




    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="well">

      <!-- Three columns of text below the carousel -->
	   <?php
		  for($i = 0; $i < count($events) ; $i++){
			$event = $events[$i];
			$idevent = $event->idevent;
			$eventname = $event->eventname;
			$location = $event->location;
			$startdatetime = $event->startdatetime;
			$enddatetime = $event->enddatetime;
			$description = $event->description;
			$picturelink = $event->picturelink;
			$picturename = $event->picturename;
			$active = $event->active;
			
			if($i % 4 == 0){ ?>
				<div class="row">
			<?php } ?>
			<div class="col-lg-3">
			  <div class="panel panel-default">
				<a href="EventDetail.php?id=<?php echo $idevent ?>" class="nohover">
					<div class="poster">
					  <img class="featurette-image img-responsive" img src=" <?php echo $picturelink ?>" alt="<?php echo $picturename ?>">
					</div>  
					<div class="details">
					  <h2><?php echo $eventname ?></h2>
					  <p>
						<span class="glyphicon glyphicon-calendar"></span> <?php echo $startdatetime ?><br>
						<span class="glyphicon glyphicon-time"></span> <?php echo $startdatetime ?><br>
						<span class="glyphicon glyphicon-map-marker"></span> <?php echo $location ?><br>
					  </p>
					</div>
				</a>
			  </div>
			</div>
			<?php if($i % 4 == 3){ ?>
				</div>
			<?php } ?>	
		<?php } ?>


	   

      <div class="col-lg-3">
        <div class="panel panel-default">
        <a href="EventDetail.php?id=1" class="nohover">
          <div class="poster">
            <img class="featurette-image img-responsive" img src="images/leap.png" alt="ok">
          </div>  
          <div class="details">
            <h2>a b c d e f g h i j k l m n o p q r s t </h2>
            <p>
            <span class="glyphicon glyphicon-calendar"></span> A<br>
            <span class="glyphicon glyphicon-time"></span> A<br>
            <span class="glyphicon glyphicon-map-marker"></span> a b c d e f g h i j k l m n o p q r s t u v w x y z 1 2 3 4 5 6 7 8 9 0 a b <br>
            <span class="glyphicon glyphicon-briefcase"></span> Google Philippines<br>
            </p>
          </div>
        </a>
        </div>
      </div>
        </div>


      <br>
      <a href="search.php" class="nohover"><button type="button" class="btn btn-default btn-lg btn-block">Browse More Events</button></a>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
  </body>
</html>
