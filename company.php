
<!DOCTYPE html>
<html>
	<head>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/customstyles.css" rel="stylesheet">
		<style>
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


				<div class="panel panel-default">
					<div class="panel-heading">Categories</div>
						<div class="panel-body">
					

							<input class = 'categories' type="checkbox" value="Computer" > Computer</input><br>
							
						
						</div>
				</div>
		</div>
			
		  
		<div id="results" class="col-lg-9">
			<div id="company-results" class="list-group">
				<div class="list-group-item clearfix col-lg-12">
					<div class="col-lg-3 company-logo">
						<img src="images/accenture.jpg" class="img-responsive"/>
					</div>
					<p class="list-group-item-heading col-lg-6">ACCENTURE</p>
					<p class="list-group-item-text col-lg-6">
						<span class="glyphicon glyphicon-map-marker"></span> Makati<br>
						<span class="glyphicon glyphicon-earphone"></span> 89333566<br>
						<span class="glyphicon glyphicon-envelope"></span> accenture@accenture.com<br><br>
						<a class="btn btn-sm btn-primary" href="search.php" role="button">View Company Events</a>&nbsp;&nbsp;
						<a class="btn btn-sm btn-primary" href="http://accenture.com" role="button">View Website</a>
					</p>
				</div>
			</div>
		</div>


<!-- 
		<br>
		<center>
		<div class="btn-toolbar" role="toolbar">
		  <div  id = "pages" class="btn-group">		
		  		<a href="#"  class="" id = '1-page'> <button type="button" class="btn btn-default">1</button>
		  		<a href="#"  class="" id = '2-page'> <button type="button" class="btn btn-default">2</button>
		  </div>
		</div>
		</center> -->

		<script src="js/paginatecompanies.js"></script>
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	
		
</html>