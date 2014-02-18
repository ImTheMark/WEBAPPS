<?php
	include_once('../includes/connection.php');
	$selectedCategories = "";
	$selectedCompanies = "";
	$searchWord = "";
	$class = $_POST['class'];
	$page_number = $_POST['page'];
	if(isset($_POST['companies'])){
		$selectedCompanies = $_POST['companies'];		
	}
	if(isset($_POST['categories'])){
		$selectedCategories = $_POST['categories'];	
	}
	if(isset($_POST['searchWord'])){
		$searchWord = $_POST['searchWord'];		
	}	
	
	$item_per_page = 4;
	$page_number -=1;
	$position = ($page_number * $item_per_page);
	
	$query = "SELECT distinct event.idevent, eventname, location, startdatetime, picturelink, picturename
			  FROM company INNER JOIN company_event on company.idcompany = company_event.idcompany
			 INNER JOIN event on company_event.idevent = event.idevent
			 INNER JOIN company_category on company.idcompany = company_category.idcompany
			 INNER JOIN category on company_category.idcategory = category.idcategory
			 INNER JOIN eventpicture on event.idpicture = eventpicture.ideventpicture";
	
	$cond = "";
	if($searchWord!=null && $searchWord!=""){
		//$cond .= " WHERE (companyname LIKE '%" . $searchWord . "%' OR eventname LIKE '%" . $searchWord . "%')";
		$cond .= " WHERE (eventname LIKE '%" . $searchWord . "%')";
		}
	
	if(!empty($selectedCompanies)){
		if($cond!=""){
			$cond.= " AND ";
		}
		else{
			$cond .= " WHERE ";
		}
		for($i = 0 ; $i<count($selectedCompanies);$i++){
			if($i == 0){
				$cond .= " (";
			}
			$companyid = $selectedCompanies[$i];
			
			$cond .= "company.idcompany = $companyid";
			
			if($i == count($selectedCompanies)-1){
				$cond .= " ) ";
			}
			else{
				$cond .= " OR ";
			}
		}
		
	}
	
	if(!empty($selectedCategories)){
		if($cond!=""){
			$cond.= " AND ";
		}
		else{
			$cond .= " WHERE ";
		}
		for($i = 0 ; $i<count($selectedCategories);$i++){
			if($i == 0){
				$cond .= " (";
			}
			$catid = $selectedCategories[$i];
			
			$cond .= "category.idcategory = $catid";
			
			if($i == count($selectedCategories)-1){
				$cond .= " ) ";
			}
			else{
				$cond .= " OR ";
			}
		}
		
	}
	
	$query .= $cond;
	$query .= " LIMIT $position, $item_per_page";
	
	$query = mysql_query($query);
	$numrows = mysql_num_rows($query);
	$count = 0;
	if($numrows > 0 ){
		while($row = mysql_fetch_assoc($query)){
			$idevent = $row['idevent'];
			$eventname = $row['eventname'];
			$location = $row['location'];
			$startdatetime = date_create($row['startdatetime']);
			$picturelink = $row['picturelink'];
			$picturename = $row['picturename'];
			
			$cquery = "SELECT *
					  FROM company
					  INNER JOIN company_event ON company.idcompany = company_event.idcompany
					  INNER JOIN event ON company_event.idevent = event.idevent
					  WHERE event.idevent=$idevent;";
			$cquery = mysql_query($cquery);
			$cnumrows = mysql_num_rows($cquery);
			if($cnumrows > 0 ){
				$crow = mysql_fetch_assoc($cquery);
				$companyname = $crow['companyname'];
			}
			
			
			if($class =='list'){
			?>
				<div class="list-group-item clearfix">
					<a href="EventDetail.php?id=<?php echo $idevent ?>" class="thumbnail col-xs-3">
					  <img src=" <?php echo $picturelink ?>" alt="<?php echo $picturename ?>">
					</a>
					<p class="event-title list-group-item-heading col-xs-6"><?php echo $eventname ?></p>
					<p class="event-body list-group-item-text col-xs-6">
						
						DATE:		<?php echo date_format($startdatetime, 'l jS F Y'); ?><br>
						TIME:		<?php echo date_format($startdatetime, 'G:ia'); ?><br>
						LOCATION:	<?php echo $location ?><br><br>
					<a class="btn btn-lg btn-primary" href="EventDetail.php?id=<?php echo $idevent ?>" role="button">View details</a></p>
				</div>
			<?php } 
			else if($class =='grid'){ 
				if($count % 3 == 0){ ?>
					<div class="row">
				<?php } ?>
				<div class="col-lg-4">
				  <img class="thumbnail img-responsive" src=" <?php echo $picturelink ?>" alt="<?php echo $picturename ?>">
				  <div class="details">
					  <h2><?php echo $eventname ?></h2>
					  <p>
						<span class="glyphicon glyphicon-calendar"></span> <?php echo date_format($startdatetime, 'l jS F Y'); ?><br>
						<span class="glyphicon glyphicon-time"></span> <?php echo date_format($startdatetime, 'G:ia'); ?><br>
						<span class="glyphicon glyphicon-map-marker"></span> <?php echo $location ?><br>
						<span class="glyphicon glyphicon-briefcase"></span> <?php echo $companyname ?><br>
					  </p>
					</div>
				  <p><a class="btn btn-default" href="EventDetail.php?id=<?php echo $idevent ?>" role="button">View details &raquo;</a></p>
				</div>				
				<?php 
				if($count % 3 == 2){ ?>
					</div>
				<?php } ?>			
			<?php }?>
	
				
			
			<?php 
			$count++;
			}  ?>
			
		<?php }  ?>