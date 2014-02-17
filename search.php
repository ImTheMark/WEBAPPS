
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
			.btn-toolbar{
				display:inline-block;
 				text-align: center;
			}​
		</style>


	    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" media="all" href="css/daterangepicker-bs3.css" />
	    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	    <script type="text/javascript" src="js/moment.js"></script>
	    <script type="text/javascript" src="js/daterangepicker.js"></script>
		
    <title>EVENTORY - Search</title>
	</head>
	<body>
	
		
		<?php include('includes/nav.php'); 
		?>
		
		
		
		<h3> <div class="label label-default"> Search for Events </div></h3>
		<BR>
		
			<div id="filter" class="col-md-3">

			<?php 
			$searchWord="";
			if(isset($_GET['s'])){
				$searchWord = $_GET['s'];
			}
			
			$catname = "";
			
			if(isset($_GET['company'])){
				$catname = $_GET['company'];
			}
			
		    ?>
			<input id='filter-searchbar' name='searchWord' type="text" class="form-control" placeholder="Search Events..." value= "<?php echo $searchWord;?>" ><br>
			
			
			<button id = 'filter-button' type="submit" class="btn btn-primary">Search</button>
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
							<input class = 'categories' type="checkbox" value=" <?php echo $id; ?>" > <?php echo $c; ?></input><br>
							
							
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
							<input class = 'companies' type="checkbox" value="<?php echo $id; ?>" <?php if($catname==$c){echo "checked";} ?>> <?php echo $c ;?></input><br>
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

			<div class="search-options">
				<div class="btn-group" style="overflow: auto">
					<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> List</button>
					<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-th-large"></span> Grid</button>
				</div>

               	<div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                    <i class="fa fa-calendar fa-lg"></i>
				    <span><?php echo date("F j, Y", strtotime('-0 day')); ?> - <?php echo date("F j, Y"); ?></span> <b class="caret"></b>
				</div>
				 
				<script type="text/javascript">
				$('#reportrange').daterangepicker(
				    {
				      ranges: {
				         'Today': [moment(), moment()],
				         'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
				         'Last 7 Days': [moment().subtract('days', 6), moment()],
				         'Last 30 Days': [moment().subtract('days', 29), moment()],
				         'This Month': [moment().startOf('month'), moment().endOf('month')],
				         'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
				      },
				      startDate: moment().subtract('days', 0),
				      endDate: moment()
				    },
				    function(start, end) {
				        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				    }
				);
				</script>

			</div>
			<br>
				<div id = "event-results" class = "list-group">
				</div>
				
				<br>
				<center>
				<div class="btn-toolbar" role="toolbar">
				  <div  id = "pages" class="btn-group">	
				  </div>
				</div>
				</center>
			


				<!--
					<ul class="pager">
					  <li class="previous"><a href="#">&larr; Newer</a></li>
					  <li class="next"><a href="#">Older &rarr;</a></li>
					</ul>
			
				-->


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

		<script src="js/paginateevents.js"></script>
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	
		
</html>