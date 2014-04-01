
<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/customstyles.css" rel="stylesheet">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	
	<style>
	.col-lg-3{
		position: relative;
		min-height: 1px;
		padding-right: 15px;
		padding-left: 0px;
	}
	
	
	
	.col-md-7,.col-lg-9{
		padding-right: 0px;
		padding-left: 0px;
	}
	#filter{
		float: left; 
	}

	#results{
		float: right; 
	}
	.details{
		margin: 15px;
	}
	.event-title{
		font-weight: bold;
		font-size: 25px;
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
		padding: 25px;
		}​
		.event-panel{
			color: #333333;
		}
		a.nohover { 
			color: #333333; 
		}
		a.nohover:hover { 
			text-decoration: none;
		}
		.event-panel:hover{
			background-color: #F0F0F0;
		}
		.grid-event-panel:hover{
			box-shadow: 0 0 3px #333333;
		}
		.grid-event-panel{
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
			.grid-event-panel{
				height: 100%;
			}
		}

		.panel-heading .accordion-toggle:after {
			/* symbol for "opening" panels */
			font-family: 'Glyphicons Halflings';  /* essential for enabling glyphicon */
			content: "\e114";    /* adjust as needed, taken from bootstrap.css */
			float: right;        /* adjust as needed */
			color: grey;         /* adjust as needed */
		}


		.panel-heading .accordion-toggle.collapsed:after {
			/* symbol for "collapsed" panels */
			content: "\e080";    /* adjust as needed, taken from bootstrap.css */
		}

		</style>

		<script type="text/javascript" src="js/jquery-1.11.0.js"></script> 

	<title>EVENTORY - Search</title>
</head>
<body>
	
	
	<?php include('includes/nav.php'); 
	?>
	
	
	
	<h3> <div class="label label-default"> Search for Events </div></h3>
	<BR>
		
		<div id="filter" class="col-lg-3">

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

			<div class="input-group">
				<input id='filter-searchbar' name='searchWord' type="text" class="searchbox form-control" placeholder="Search Events..." value= "<?php echo $searchWord;?>" ><br>
				<span class="input-group-btn">
					<button id = 'filter-button' type="submit" class="btn btn-primary">Search</button>
				</span>
			</div>
			
			<br>
			<!----------------------------- CATEGORIES -------------------------------------->

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							Categories
						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
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
				</div>
				
				

				<!----------------------------- COMPANIES -------------------------------------->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
								Companies
							</a>
						</h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse in">
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
					</div>



				</div>
				



				<!----------------------------- RESULTS -------------------------------------->	
				<div id="results" class="col-lg-9">

					<div class="search-options">
						<div class="col-md-7 btn-group" style="overflow: auto">
							<button id = "list" type="button" class="btn btn-default active"><span class="glyphicon glyphicon-list"></span> List</button>
							<button id = "grid" type="button" class="btn btn-default"><span class="glyphicon glyphicon-th-large"></span> Grid</button>
						</div>
						<br><br>
<!--
               	<div id="reportrange" class="col-md-5 pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                    <i class="fa fa-calendar fa-lg"></i>
				    <span class=""><?php echo date("F j, Y", strtotime('-0 day')); ?> - <?php echo date("F j, Y"); ?></span> <b class="caret"></b>
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
			-->
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
		



			</div>
			<script src="js/removesessioncompanies.js"></script>
			<script src="js/paginateevents.js"></script>
			<script src="js/jquery-1.10.2.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
		</body>
		
		
		</html>