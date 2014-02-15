<?php

	class EventObject{ 
		
		public $idevent;
		public $eventname = "";
		public $location = "";
		public $startdatetime = "";		
		public $enddatetime = "";
		public $description = ""; 
		public $picturelink = "";
		public $picturename = "";
		public $active = "";
		
		public function __construct($idevent,$eventname,$location,$startdatetime,$enddatetime,$description,$picturelink,$picturename, $active){
			$this->idevent = $idevent;
			$this->eventname = $eventname;
			$this->location = $location;
			$this->startdatetime = $startdatetime;
			$this->enddatetime = $enddatetime;
			$this->description = $description;
			$this->picturelink = $picturelink;
			$this->picturename = $picturename;
			$this->active = $active;
		}
		
	}


?>