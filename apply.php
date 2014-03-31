
<!DOCTYPE html>
<html>
		<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="docs-assets/ico/favicon.png">

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/customstyles.css" rel="stylesheet">

		<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
		
		<style>

		    body{
		      	background-color: #7C578C;
		      	background: url('images/bg.png') repeat center center;
		    }
			
			 #wellColor {
			background-color:#EED2EE;
		}
			
			textarea{ 
			  height:150px; 
			  min-height:150px;  
			  max-height:150px;
			}
			
			.error{
				color: #ffffff;
				background-color: rgba(236, 94, 90,0.6);
				border-color: rgba(238, 77, 99,1);
				padding: 4px;
				width: 100%;
				margin-bottom: 20px;
				border: 1px solid transparent;
				border-radius: 2px;
			}

			
	    </style>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$("form").validate({
					rules: {
						name:{
							minlength: 3,
							maxlength: 50,
							required: true
						},
						description:{
							minlength: 3,
							required: true
						},
						logo:{
							minlength: 3,
							required: true
						},
						calendar:{
							minlength: 3,
							required: true
						},
						category:{
							required: true
						},
						location:{
							minlength: 3,
							required: true
						},
						contact:{
							minlength: 3,
							required: true
						},
						website:{
							minlength: 3,
							required: true
						},
						email:{
							minlength: 3,
							maxlength: 50,
							email: true,
							required: true
						}
					},
					highlight: function (element) {
						$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
					},
					unhighlight: function (element) {
						$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
					}
				});
			}); 

		
		</script>

    <title>EVENTORY - Company Calendar Request</title>
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
		
		
		<h3> <div class="label label-default"> Company Calendar Request Form </div></h3>
		<BR>
		
		<div class="well" id="wellColor">
			<form id="form" class="form form-horizontal" action="php/insertcompany.php" method="post">
			<fieldset>


			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="name">Company Name*</label>  
			  <div class="col-md-5">
			  <input id="companyname" name="name" placeholder="" class="form-control input-md" type="text">
				
			  </div>
			</div>

			<!-- Textarea -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="description">Company Description*</label>
			  <div class="col-md-5">                     
				<textarea class="form-control" id="description" name="description" ></textarea>
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="logo">Company Logo*</label>  
			  <div class="col-md-5">
			  <input id="logo" name="picturelink" placeholder="http://www.yoursite.com/logo.png" class="form-control input-md" type="text">
			  <span class="help-block">Provide image link.</span>  
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="calendar">Google Calendar Link*</label>  
			  <div class="col-md-5">
			  <input id="calendar" name="calendarlink" placeholder="" class="form-control input-md" type="text">
				
			  </div>
			</div>

			<!-- Select Multiple -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="category">Category*</label>
			  <div class="col-md-5">
				<select id="category" name="categories" class="form-control" multiple="multiple" >
				  <option value="1">Software Development</option>
				  <option value="2">Networking</option>
				  <option value="3">Business Management</option>
				  <option value="4">Computer</option>
				  <option value="5">Seminar</option>
				  <option value="6">On-Campus Interview</option>
				  <option value="7">Workshop</option>
				  <option value="8">Mobile</option>
				</select>
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="location">Location*</label>  
			  <div class="col-md-5">
			  <input id="location" name="address" placeholder="Philippines" class="form-control input-md" type="text">
				
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="email">Email Address*</label>  
			  <div class="col-md-5">
			  <input id="email" name="email" placeholder="youremail@company.com" class="form-control input-md" type="text">
				
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="contact">Contact Number*</label>  
			  <div class="col-md-5">
			  <input id="contact" name="contactnumber" placeholder="" class="form-control input-md" type="text">
				
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="website">Website*</label>  
			  <div class="col-md-5">
			  <input id="website" name="website" placeholder="http://www.site.com/" class="form-control input-md" type="text">
				
			  </div>
			</div>

			<!-- Button (Double) -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="submit"></label>
			  <div class="col-md-8">
				<button id="submit" name="submit" type="submit" class="btn btn-primary">Submit</button>
				<button id="reset" name="reset" type="reset" class="btn btn-default">Cancel</button>
			  </div>
			</div>

			</fieldset>
			</form>

		</div>

		<script src="js/bootstrap.min.js"></script>
	</body>
	
		
</html>