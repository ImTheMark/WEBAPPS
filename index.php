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

    </style>
    <link href="css/carousel.css" rel="stylesheet">
	
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
			<img class="featurette-image img-responsive" img src=" <?php echo $picturelink ?>" alt="<?php echo $picturename ?>"/>
			<h2><?php echo $eventname ?></h2>
			<p><?php echo $description ?>	</p>
			<p><a class="btn btn-default" href="detail.php?id= <?php echo $idevent ?>" role="button">View details &raquo;</a></p>
			</div>	
			<?php if($i % 4 == 3){ ?>
				</div>
			<?php } ?>	
		<?php } ?>

      <div class="row">
        <div class="col-lg-3">
          <img class="featurette-image img-responsive" img src="images/IT-poster2.png" alt="Generic placeholder image">
          <h2>IT SERVICES</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="detail.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
	 


    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
  </body>
</html>
