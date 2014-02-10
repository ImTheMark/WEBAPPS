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
		include_once('model/eventmodel.php');
		$model = new EventModel;
		$events = $model->getAllEvents();
		foreach($events as $event){
			$idevent = $event->idevent;
			$name = $event->name;
			$startdatetime = $event->startdatetime;
			$enddatetime = $event->enddatetime;
			$description = $event->description;
			$picture = $event->picture;
			$active = $event->active;
		}
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
      <div class="row">
        <div class="col-lg-3">
          <img class="featurette-image img-responsive" img src="images/IT-poster2.png" alt="Generic placeholder image">
          <h2>IT SERVICES</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="detail.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-3">
          <img class="featurette-image img-responsive" img src="images/leap.jpg"  alt="Generic placeholder image">
          <h2>LEAP ORIENTATION</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-3">
          <img class="featurette-image img-responsive" img src="images/gamedev-poster.png" alt="Generic placeholder image">
          <h2>GAME DEVELOPEMENT SEMINAR</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
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
