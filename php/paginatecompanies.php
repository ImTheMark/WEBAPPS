<?php
	include_once('../includes/connection.php');
	$pastPage = 1;
	
	if(isset($_POST['pastPage'])){
		$pastPage = $_POST['pastPage'];		
	}
	
	$query = "SELECT COUNT(distinct companyname)
			  FROM company";
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
		



?>