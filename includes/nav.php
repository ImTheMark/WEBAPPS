<?php 
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == "" || $_SESSION['login'] == null) {
?>
<div class="container">
        <a href="index.php"><img src="images/logo.png" class="img-responsive"/></a>
		<div class="navbar navbar-default navbar-inverse" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
				<li><a href="search.php">Browse Events</a></li>
				<li><a href="company.php">Companies</a></li>
				<li><a href="#">Contact Us</a></li>
				
          </ul>
		  </ul>
      
		<div class = "navbar-form navbar-right">
			<li><a href="login.php">Login</a></li>
		</div>
		<!--
		<form action='search.php' class="navbar-form navbar-right" role="search" method="GET">
	        <div class="form-group">
	          <input name='s' type="text" class="form-control" placeholder="Search Events...">
	        </div>
	        <button type="submit" class="btn btn-primary">Search</button>
	    </form>-->
        </div><!--/.nav-collapse -->
 </div>
 
 <?php } 
 else{ ?>
 
 <div class="container">
        <a href="index.php"><img src="images/logo.png" class="img-responsive"/></a>
		<div class="navbar navbar-default navbar-inverse" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
				<li><a href="search.php">Browse Events</a></li>
				<li><a href="company.php">Companies</a></li>
				<li><a href="#">Contact Us</a></li>
				
          </ul>
		  </ul>
      
		<div class = "navbar-form navbar-right">
			<li><a href="logout.php"><?php echo $_SESSION['login']; ?> Logout</a></li>
		</div>
		<!--
		<form action='search.php' class="navbar-form navbar-right" role="search" method="GET">
	        <div class="form-group">
	          <input name='s' type="text" class="form-control" placeholder="Search Events...">
	        </div>
	        <button type="submit" class="btn btn-primary">Search</button>
	    </form>-->
        </div><!--/.nav-collapse -->
 </div>
 
 
 <?php } ?>

 
