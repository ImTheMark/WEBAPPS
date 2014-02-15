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
					$eventname = $row['eventname'];
					$startdatetime = $row['startdatetime'];
					$enddatetime = $row['enddatetime'];
					$description = $row['description'];
					$picture = $row['picturelink'];
					$picturename = $row['picturename'];
					$active = $row['active'];
					
					$eventobj = new EventObject($idevent,$eventname,$startdatetime,$enddatetime,$description,$picture,$picturename,$active);
					array_push($events, $eventobj);
					
				}
			}
			return $events;
		}
		
		public function getLatestEventsForHomepage(){
			
			$events = array(); // change query
			$query = "SELECT *
					  FROM webapps.event INNER JOIN webapps.eventpicture
					  ON webapps.event.idpicture = webapps.eventpicture.ideventpicture
					  ORDER BY startdatetime ASC
					  LIMIT 60;";
			$query = mysql_query($query);
			$numrows = mysql_num_rows($query);
			
			if($numrows > 0 ){
				while($row = mysql_fetch_assoc($query)){
					$idevent = $row['idevent'];
					$eventname = $row['eventname'];
					$startdatetime = $row['startdatetime'];
					$enddatetime = $row['enddatetime'];
					$description = $row['description'];
					$picture = $row['picturelink'];
					$picturename = $row['picturename'];
					$active = $row['active'];
					
					$eventobj = new EventObject($idevent,$eventname,$startdatetime,$enddatetime,$description,$picture,$picturename,$active);
					array_push($events, $eventobj);
					
				}
			}
			return $events;
		}
		
		function getEventById($id){
			$query = "SELECT * 
					  FROM webapps.event 
					  INNER JOIN webapps.eventpicture ON webapps.event.idpicture = webapps.eventpicture.ideventpicture
					  WHERE idevent=$id;";
			$query = mysql_query($query);
			$numrows = mysql_num_rows($query);
			
			if($numrows > 0 ){
				$row = mysql_fetch_assoc($query))
					$idevent = $row['idevent'];
					$eventname = $row['eventname'];
					$startdatetime = $row['startdatetime'];
					$enddatetime = $row['enddatetime'];
					$description = $row['description'];
					$picture = $row['picturelink'];
					$picturename = $row['picturename'];
					$active = $row['active'];
					$eventobj = new EventObject($idevent,$eventname,$startdatetime,$enddatetime,$description,$picture,$picturename,$active);
					return $eventobj;		
			}
			else{
				return null;
			}
		}
	}
	
?>