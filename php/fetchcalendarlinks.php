<?php
	require_once('../includes/connection.php');
	$companies =  array();
	
	$query = "SELECT idcompany, calendarlink 
			 FROM company";
			 
	$query = mysql_query($query);
	$numrows = mysql_num_rows($query);
		if($numrows > 0 ){
			while($row = mysql_fetch_assoc($query)){
				if($row['calendarlink']!= null && $row['calendarlink']!="")
					echo $row['idcompany'] . " " . $row['calendarlink'] . "-";
			}
		}


?>