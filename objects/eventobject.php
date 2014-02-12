<?php

	class EventObject{ 
		
		public $idevent;
		public $eventname = "";
		public $startdatetime = "";		
		public $enddatetime = "";
		public $description = ""; 
		public $picturelink = "";
		public $picturename = "";
		public $active = "";
		
		public function __construct($idevent,$eventname,$startdatetime,$enddatetime,$description,$picturelink,$picturename, $active){
			$this->idevent = $idevent;
			$this->eventname = $eventname;
			$this->startdatetime = $startdatetime;
			$this->enddatetime = $enddatetime;
			$this->description = $description;
			$this->picturelink = $picturelink;
			$this->picturename = $picturename;
			$this->active = $active;
		}
		
	}


?>