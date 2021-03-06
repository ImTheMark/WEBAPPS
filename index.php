<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

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
  .panel{
    height: 485px;
    word-wrap:break-word;
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

  @media(max-width:1200px){
    .poster {
      height: 100%;
      width: 100%;
      display: initial;
    }

    .poster img {
      min-width: initial;    /* Scale up to fill container width */
      min-height: initial;   /* Scale up to fill container height */
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
    .panel{
      height: 100%;
    }
  }

  

  </style>
  
  <?php
  include_once('model/eventmodel.php');
  include_once('model/companymodel.php');
  $eventModel = new EventModel;
  $events = $eventModel->getLatestEventsForHomepage();
  $companyModel = new CompanyModel;
  ?>
</head>
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
              <form action='search.php' role="search" method="GET">
                <div class="input-group">
                  <input name ='s' type="text" class="searchbox form-control">
                  <span class="input-group-btn">
                   <button class="btn btn-success" type="submit">Go!</button>
                 </span>
               </div><!-- /input-group -->
             </form>
           </div><!-- /.col-lg-6 -->
         </p>
       </div>
     </div>




    <div class="well">

      <?php
      for($i = 0; $i < count($events) ; $i++){
       $event = $events[$i];
       $idevent = $event->idevent;
       $eventname = $event->eventname;
       $location = $event->location;
       $startdatetime = date_create($event->startdatetime);
       $picturelink = $event->picturelink;
       $picturename = $event->picturename;
       
       $company = $companyModel->getCompanyGivenEventId($idevent);
       $companyname = $company->companyname;
       
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
                <span class="glyphicon glyphicon-calendar"></span> <?php echo date_format($startdatetime, 'l jS F Y'); ?><br>
                <span class="glyphicon glyphicon-time"></span> <?php echo date_format($startdatetime, 'g:i a'); ?><br>
                <span class="glyphicon glyphicon-map-marker"></span> <?php echo $location ?><br>
                <span class="glyphicon glyphicon-briefcase"></span> <?php echo $companyname ?><br>
              </p>
            </div>
          </a>
        </div>
      </div>
      <?php if($i % 4 == 3){ ?>
    </div>
    <?php } ?>	
    <?php } ?>


    


    <br>
    <a href="search.php" class="nohover"><button type="button" class="btn btn-default btn-lg btn-block">Browse More Events</button></a>

  </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
    <script src="js/removesessioncompanies.js"></script>
    <script src="js/removesessionevents.js"></script>
  </body>
  </html>
