
<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/customstyles.css" rel="stylesheet">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">

	<script type="text/javascript" src="js/jquery-1.11.0.js"></script> 

	<style>
	.col-lg-3{
		position: relative;
		min-height: 1px;
		padding-right: 15px;
		padding-left: 0px;
	}
	
	.img-responsive {
		display: block;
		max-height: 100px;
		max-width: 100%;
	}
	
	.col-lg-12,.col-lg-9{
		padding-right: 0px;
	}
	
	#filter{
		float: left; 
	}

	#results{
		float: right; 
	}
	body{
		background-color: #7C578C;
		background: url('images/bg.png') repeat center center;
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
	.btn-toolbar{
		display:inline-block;
		text-align: center;
		padding: 25px;
			}​/*

		    @media(max-width:1200px){
		        .company-logo{
				    display: block;
		            margin-left: auto;
		            margin-right: auto;
		        }
		        }*/
		        </style>

		        <title>EVENTORY - Company List</title>
		    </head>
		    <body>
		    	
		    	
		    	<?php include('includes/nav.php');
		    	include('model/companymodel.php');
		    	
		    	$companyModel = new CompanyModel();
		    	$companies = $companyModel->getAllCompanies();
		    	for($i = 0; $i < count($companies) ; $i++){
		    		$company = $companies[$i];
		    		$id = $company->idcompany;
		    	}
		    	?>
		    	
		    	
		    	<h3> <div class="label label-default"> Search for Companies </div></h3>
		    	<BR>


		    		<div id="filter" class="col-lg-3">

		    			<div class="input-group">
		    				<input id='filter-searchbar' name='searchWord' type="text" class="searchbox form-control" placeholder="Search Companies..." value= "" ><br>
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
		    						include_once('model/categorymodel.php');
		    						
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
		    			</div>
		    			
		    			
		    			<div id="results" class="col-lg-9">
		    				<div id="company-results" class="list-group">
		    					
		    				</div>


		    				<br>
		    				<center>
		    					<div class="btn-toolbar" role="toolbar">
		    						<div  id = "pages" class="btn-group">
		    						</div>
		    					</div>
		    				</center>

		    				
		    			</div>
		    			<script src="js/removesessionevents.js"></script>
		    			<script src="js/jquery-1.10.2.min.js"></script>
		    			<script src="js/paginatecompanies.js"></script>
		    			<script src="js/bootstrap.min.js"></script>
		    		</body>
		    		
		    		
		    		</html>