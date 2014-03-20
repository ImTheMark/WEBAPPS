<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="docs-assets/ico/favicon.png">

    <title>EVENTORY - Event Details</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/customstyles.css" rel="stylesheet">
    <link href="css/justified-nav.css" rel="stylesheet">

    <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet" type="text/css" />
    <script src="email/validation.js" type="text/javascript"></script>
	
	<style>
	
	  body{
        background-color: #7C578C;
        background: url('images/bg.png') repeat center center;
      }
	  
	   .sidebox {
			background-color:#EED2EE;
			margin-top:0px;
		}
		#form{
			background-color:#EED2EE; 
			padding:20px;
			border-top-left-radius: 5px;
			border-top-right-radius: 5px;
			border-bottom-right-radius: 5px;
			border-bottom-left-radius: 5px;
		}
		
		.label {
			display: inline;
			padding: .2em .5em;
			font-size: 67%;
			font-weight: bold;
			line-height: 1;
			color: #fff;
			text-align: center;
			white-space: nowrap;
			vertical-align: baseline;
			border-radius: .25em;
			text-shadow: none;
		}
		
		
		.divPanel {
			padding-left: 0px;
			
		}
		#divBoxed {
			margin-top: 0px;
			padding-left: 0px;
		}
		}
		h1{
			color:#C5A2C0;
		}
		#map{
				height:200px;  
				position: block; 
				overflow: hidden;
			}
			
			.sidebox-title {
				font-weight: normal;
				font-style: normal;
				font-size: 30px;
				letter-spacing: 0px;
				line-height: 20px;
				font-family: 'Source Sans Pro', sans-serif;
				color: rgb(129, 14, 158);
				}
				
				.sidebar {
				padding-top: 11px;
				}
				
	   </style>
</head>
<body id="pageBody">
<?php include('includes/nav.php'); ?>


		<h3> <div class="label label-default" > Search for Events </div></h3>
		<BR>
<div id="divBoxed" class="container">

    <div class="contentArea">
        <div class="divPanel notop page-content">
            <div class="row-fluid">
			
                <div class="span8" id="divMain" >
                    
					
					
                   	<h4 style="color:#D593A5;"><?php echo @$_GET['msg'];?></h4>
					
			<!--Start Contact form -->		                                                
<form name="enq" method="post" action="email/" onsubmit="return validation();" id="form">
  <fieldset>
    
	<input type="text" name="name" id="name" value=""  class="input-block-level" placeholder="Name" />
    <input type="text" name="email" id="email" value="" class="input-block-level" placeholder="Email" />
	 <select name="something">
	  <option value="Google">Comment/Suggestion</option>
	  <option value="Bing">Request for new category</option>
	 </select>
    <textarea rows="11" name="message" id="message" class="input-block-level" placeholder="Comments"></textarea><br><br>
    <div class="actions"> <br>
	<input type="submit" value="Send Your Message" name="submit" id="submitButton" class="btn btn-info pull-right" title="Click here to submit your message!" />
	</div>
	
	</fieldset>
</form>  				 
			<!--End Contact form -->											 
                </div>
				
			<!--Edit Sidebar Content here-->	
                <div class="span4 sidebar">
					
                    <div class="sidebox">
                        <h2 class="sidebox-title"><b>Contact Information</b></h2>
                    <p>
                        <address><strong>Eventory, Inc.</strong><br />
                        1234 taft, manila, philippines, 1006<br />
                        </address> 
						<address><b>Phone:</b></abbr> (02) 456-7890</address> 
						<address><b>Fax:</b></abbr> (02) 123-7890</address>						
                        <address><b>Email:</b></abbr> eventory@gmail.com</address>		 
                    </p>     
                     
					 <!-- Start Side Categories -->
        <h4 class="sidebox-title"></h4>
        <div id="map"></div>
				<p id="address" style="color:#EED2EE;">de lasalle university manila</p>
					<!-- End Side Categories -->
                    					
                    </div>
                </div>
            </div>			
        </div>
    </div>
</div>


<script src="scripts/jquery.min.js" type="text/javascript"></script> 
<script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> 
<script src="js/eventdetail.js"></script>
</body>
</html>