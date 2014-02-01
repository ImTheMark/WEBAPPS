<?php
	include('includes/connection.php');
	include('objects/eventobject.php');
	
	class EventModel{
		public function getAllEvents(){
			$events = array();
			
			
			$query = "SELECT * 
					  FROM webapps.event INNER JOIN webapps.eventpicture
					  ON webapps.event.idpicture = webapps.eventpicture.ideventpicture;";
			
			$query = mysql_query($query);
			$numrows = mysql_num_rows($query);
			
			if($numrows > 0 ){
				while($row = mysql_fetch_assoc($query)){
					$name = $row['eventname'];
					$startdatetime = $row['startdatetime'];
					$enddatetime = $row['enddatetime'];
					$description = $row['description'];
					$picture = $row['picture'];
					$active = $row['active'];
					
					$eventobj = new EventObject($name,$startdatetime,$enddatetime,$description,$picture,$active);
					array_push($events, $eventobj);
					
				}
			}
			return $events;
		}
	}
	$model = new EventModel;
	$events = $model->getAllEvents();
	foreach($events as $event){
		foreach($event as $x=>$x_value){
			if($x == 'picture'){
			
				echo $x . " ";
				echo $x_value;
				echo "<img src= \"" . $x_value . "\">";
			}
			else{
			echo $x . " " . $x_value . " <br>";
			}
		}
	}
?>