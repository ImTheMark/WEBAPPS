<?php
include_once('../includes/connection.php');
	$selectedCategories = "";
	$searchWord = "";
	$cond = "";
	$page_number = $_POST['page'];
	if(isset($_POST['categories'])){
		$selectedCategories = $_POST['categories'];	
	}
	if(isset($_POST['searchWord'])){
		$searchWord = $_POST['searchWord'];		
	}	
	if(isset($_POST['pastPage'])){
		$pastPage = $_POST['pastPage'];		
	}
	
	$query = "SELECT distinct company.idcompany,companyname, address,website, contactnumber, email,picturename,picturelink
			  FROM company INNER JOIN company_category on company.idcompany = company_category.idcompany
			  INNER JOIN category on company_category.idcategory = category.idcategory INNER JOIN 
			  companypicture on company.idpicture = companypicture.idcompanypicture";
	if($searchWord!=null && $searchWord!=""){
		  $cond .= " WHERE(companyname LIKE '%" . $searchWord . "%')";
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
	$item_per_page = 4;
	$page_number -=1;
	$position = ($page_number * $item_per_page);
	$query .= $cond . " LIMIT $position, $item_per_page";
	$results = mysql_query($query);
	$numrows = mysql_num_rows($results);
	$count = 0;
	if($numrows > 0){
		while($row = mysql_fetch_assoc($results)){
			$id = $row['idcompany'];
			$companyname = $row['companyname'];
			$address = $row['address'];
			$website = $row['website'];
			$contact = $row['contactnumber'];
			$email = $row['email'];
			$picturename = $row['picturename'];
			$picturelink = $row['picturelink'];
			?>
			<div class="list-group-item clearfix col-lg-12">
					<div class="col-lg-3 company-logo">
						<img src="<?php echo $picturelink;?>" class="img-responsive" alt="<?php echo $picturename;?>"/>
					</div>
					<p class="list-group-item-heading col-lg-6"> <?php echo $companyname; ?></p>
					<p class="list-group-item-text col-lg-6">
						<span class="glyphicon glyphicon-map-marker"></span> <?php echo $address;?><br>
						<span class="glyphicon glyphicon-earphone"></span> <?php echo $contact;?><br>
						<span class="glyphicon glyphicon-envelope"></span> <?php echo $email;?><br><br>
						<a class="btn btn-sm btn-primary" href="CompanyProfile?id=<?php echo $id;?>" role="button">View Company Details</a>&nbsp;&nbsp;
						<a class="btn btn-sm btn-primary" href="<?php echo $website;?>" role="button">View Website</a>
					</p>
				</div>
			
	<?php	}
	}


?>