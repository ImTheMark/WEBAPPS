<?php
	include_once('../includes/connection.php');
	$selectedCategories = "";
	$selectedCompanies = "";
	$searchWord = "";
	
	if(isset($_POST['companies'])){
		$selectedCompanies = $_POST['companies'];		
	}
	if(isset($_POST['categories'])){
		$selectedCategories = $_POST['categories'];	
	}
	if(isset($_POST['searchWord'])){
		$searchWord = $_POST['searchWord'];		
	}	
	if(isset($_POST['pastPage'])){
		$pastPage = $_POST['pastPage'];		
	}
	$query = "SELECT COUNT(distinct event.idevent, eventname, location, startdatetime, picturelink, picturename) as nRows
			  FROM company INNER JOIN company_event on company.idcompany = company_event.idcompany
			 INNER JOIN event on company_event.idevent = event.idevent
			 INNER JOIN company_category on company.idcompany = company_category.idcompany
			 INNER JOIN category on company_category.idcategory = category.idcategory
			 INNER JOIN eventpicture on event.idpicture = eventpicture.ideventpicture";
	
	$cond = " WHERE (event.startdatetime >= NOW())";
	if($searchWord!=null && $searchWord!=""){
		//$cond .= " WHERE (companyname LIKE '%" . $searchWord . "%' OR eventname LIKE '%" . $searchWord . "%')";
		  $cond .= " AND (eventname LIKE '%" . $searchWord . "%')";
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
	
	$results = mysql_query($query);
	if(mysql_num_rows($results) > 0){
		$result = mysql_fetch_assoc($results);
		$nRows = $result['nRows'];
		$item_per_page = 6;
		$nPages = ceil($nRows/$item_per_page);
		$pagination = "";
		if($nPages == 1){
			echo "one-pager";
		}
		else if($nPages > 1){
			for($i = 1 ; $i <= $nPages ; $i++){ ?>
					<a href="#"  class="paginate_click<?php if($i == $pastPage){ echo " active"; } ?>" id = '<?php echo $i ?>-page'> <button type="button" class="btn btn-default<?php if($i == $pastPage){ echo " active"; } ?> "><?php  echo $i ?></button>
				<?php }
			echo $pagination;
		}
	}
	else{
	}
	
?>