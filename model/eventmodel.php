<?php
	include_once('includes/connection.php');
	include_once('objects/eventobject.php');
	
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
					$idevent = $row['idevent'];
					$name = $row['eventname'];
					$startdatetime = $row['startdatetime'];
					$enddatetime = $row['enddatetime'];
					$description = $row['description'];
					$picture = $row['picture'];
					$active = $row['active'];
					
					$eventobj = new EventObject($idevent,$name,$startdatetime,$enddatetime,$description,$picture,$active);
					array_push($events, $eventobj);
					
				}
			}
			return $events;
		}
	}
	
?>