
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
		</style>

    <title>EVENTORY - Search</title>
	</head>
	<body>
	
		
		<?php include('includes/nav.php'); 
		?>
		<div>
			<form class="navbar-form navbar-right" role="form" action='./search.php' method='get'>
            <div class="form-group">
              <input type="text" placeholder="Search.." class="form-control" name='search'>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
          </form>
		</div>
		
		<h3> <div class="label label-danger"> Search for Events </div></h3>
		<BR>
		
		<div class="container">
			<div id="filter" class="col-md-3">
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

							echo "<input type=\"checkbox\" value=\"". $id . "\"> " . $c ."</input><br>";
							}
						
							?>
						</div>
				</div>
				
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

							echo "<input type=\"checkbox\" value=\"". $id . "\"> " . $c ."</input><br>";
							}
						
							?>
						</div>
				</div>
				
				<div class="panel panel-default">
				<div class="panel-heading">Calendar</div>
						<div class="panel-body">
							<img src="images/calendar.png" width="225px"/>
						</div>
				</div>
			</div>
			
			<div id="results" class="col-md-9">
				<div class="btn-group">
					<button type="button" class="btn btn-default">Grid</button>
					<button type="button" class="btn btn-default">Thumbnail</button>
					<button type="button" class="btn btn-default">Calendar</button>
				</div><br><br>
				<div class="list-group">
					<div class="list-group-item clearfix">
						<img src="images/IT-poster2.png" class="col-xs-3"/>
						<p class="list-group-item-heading col-xs-6">IT SERVICES</p>
						<p class="list-group-item-text col-xs-6">
							DATE:		January 23,2014<br>
							TIME:		8am<br>
							LOCATION:	DLSU<br><br>
						<a class="btn btn-lg btn-primary" href="detail.php" role="button">View details</a></p>
					</div><div class="list-group-item clearfix">
						<img src="images/leap.jpg" class="col-xs-3"/>
						<p class="list-group-item-heading col-xs-6">LEAP</p>
						<p class="list-group-item-text col-xs-6">
							DATE:		January 23,2014<br>
							TIME:		8am<br>
							LOCATION:	DLSU<br><br>
						<a class="btn btn-lg btn-primary" href="#" role="button">View details</a></p>
					</div>
				</div>
			</div>
		</div>


		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	
		
</html>