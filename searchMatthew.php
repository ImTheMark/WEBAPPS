
<!DOCTYPE html>
<html>
	<head>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/customstyles.css" rel="stylesheet">
		<style>
			#filter{
				float: left; 
			}

			#results{
				float: right; 
			}
			.event-title{
				padding: 25px 0px 0px 10px;
				font-weight: bold;
				font-size: 50px;
			}
			.event-body{
				padding: 0px 0px 25px 25px;
			}
			body{
				background-color: #7C578C;
        		background: url('images/bg.png') repeat center center;
			}
		</style>

    <title>EVENTORY - Search</title>
	
	</head>
	<body>
		<?php include('includes/nav.php'); 
		?>
		
		<h3> <div class="label label-default"> Search for Events </div></h3>
		<BR>
		
			<div id="filter" class="col-md-3">

		<!----------------------------- CATEGORIES -------------------------------------->
				<div class="panel panel-default">
					<div class="panel-heading">Categories</div>
						<div class="panel-body">
							<?php
							include('model/categorymodel.php');
							
							$model = new CategoryModel();
							$categories = $model->getAllCategories();
							foreach($categories as $category){
								$id = $category->idcategory;
								$c = $category->category;
							?>
							<input type="checkbox" class = "categories" value="<?php echo $id ?>" > <?php echo $c ?> </input><br>
							<?php } ?>
						
							
						</div>
				</div>
				
		

		<!----------------------------- COMPANIES -------------------------------------->
				<div class="panel panel-default">
				<div class="panel-heading">Companies</div>
						<div class="panel-body">
							<?php
							include('model/companymodel.php');
							
							$modelX = new CompanyModel();
							$companies = $modelX->getAllCompanies();
							foreach($companies as $company){
								$id = $company->idcompany;
								$c = $company->companyname;
							?>
							<input type="checkbox" class = "companies" value="<?php echo $id ?>" > <?php echo $c ?> </input><br>
							<?php } ?>
						</div>
				</div>
				
		<!----------------------------- CALENDAR -------------------------------------->
				<div class="panel panel-default">
				<div class="panel-heading">Calendar</div>
						<div class="panel-body">
							<img src="images/calendar.png" width="225px"/>
						</div>
				</div>



			</div>
		



		<!----------------------------- RESULTS -------------------------------------->	
			<div id="results" class="col-md-9">
				<div class="btn-group">
					<button type="button" class="btn btn-default">Grid</button>
					<button type="button" class="btn btn-default">Thumbnail</button>
					<button type="button" class="btn btn-default">Calendar</button>
				</div><br><br>






				<div class="list-group">
					<div class="list-group-item clearfix">
					    <a href="#" class="thumbnail col-xs-3">
					      <img src="images/IT-poster2.png" alt="...">
					    </a>
						<p class="event-title list-group-item-heading col-xs-6">IT SERVICES</p>
						<p class="event-body list-group-item-text col-xs-6">
							DATE:		January 23,2014<br>
							TIME:		8am<br>
							LOCATION:	DLSU<br><br>
						<a class="btn btn-lg btn-primary" href="detail.php" role="button">View details</a></p>
					</div>
					<div class="list-group-item clearfix">
					    <a href="#" class="thumbnail col-xs-3">
					      <img src="images/leap.jpg" alt="...">
					    </a>
						<p class="event-title list-group-item-heading col-xs-6">LEAP</p>
						<p class="event-body list-group-item-text col-xs-6">
							DATE:		January 23,2014<br>
							TIME:		8am<br>
							LOCATION:	DLSU<br><br>
						<a class="btn btn-lg btn-primary" href="#" role="button">View details</a></p>
					</div>




				</div>
			


					<ul class="pager">
					  <li class="previous"><a href="#">&larr; Newer</a></li>
					  <li class="next"><a href="#">Older &rarr;</a></li>
					</ul>
			



    <div class=" well">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="thumbnail img-responsive" img src="images/leap.jpg"  alt="Generic placeholder image">
          <h2>LEAP ORIENTATION</h2>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="thumbnail img-responsive" img src="images/gamedev-poster.png" alt="Generic placeholder image">
          <h2>GAME DEVELOPEMENT SEMINAR</h2>
		  <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="thumbnail img-responsive" img src="images/IT-poster2.png" alt="Generic placeholder image">
          <h2>IT SERVICES</h2>
          <p><a class="btn btn-default" href="detail.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


    </div><!-- /.container -->




			</div>

		<script src="js/jquery-1.11.0.js"></script>
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	
		
</html>