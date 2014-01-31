<div class="container">
		<div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img class="logo" src="images/e-logo.jpg"></img>&nbsp;Events</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
				<li class="dropdown active">
				  <a href="" class="dropdown-toggle" data-toggle="dropdown">Search<b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="EnrollClasses.html">Search by Categories</a></li>
					<li><a href="ViewClasses.html">Search by Company</a></li>
					<li><a href="SwapClasses.html">Search by Date</a></li>
				  </ul>
				</li>
				<li><a href="EnrollClasses.html">Companies</a></li>
				<li><a href="EnrollClasses.html">Contact Us</a></li>
				
          </ul>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
            <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form" action='./search.php' method='get'>
            <div class="form-group">
              <input type="text" placeholder="Search.." class="form-control" name='search'>
            </div>
            <button type="submit" class="btn btn-success">Search</button>
          </form>
			 </div><!--/.navbar-collapse -->
          </ul>
        </div><!--/.nav-collapse -->
 </div>