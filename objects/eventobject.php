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
		public $companyname = "";
		
		public function __construct($idevent,$eventname,$startdatetime,$enddatetime,$description,$picturelink,$picturename, $active,$companyname){
			$this->idevent = $idevent;
			$this->eventname = $eventname;
			$this->startdatetime = $startdatetime;
			$this->enddatetime = $enddatetime;
			$this->description = $description;
			$this->picturelink = $picturelink;
			$this->picturename = $picturename;
			$this->active = $active;
			$this->companyname = "";
		}
		
	}


?>