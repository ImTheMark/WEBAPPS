<?php

	class EventObject{ 
		
		public $idevent;
		public $name = "";
		public $startdatetime = "";		
		public $enddatetime = "";
		public $description = ""; 
		public $picture = "";
		public $active = "";
		
		public function __construct($idevent,$name,$startdatetime,$enddatetime,$description,$picture,$active){
			$this->idevent = $idevent;
			$this->name = $name;
			$this->startdatetime = $startdatetime;
			$this->enddatetime = $enddatetime;
			$this->description = $description;
			$this->picture = $picture;
			$this->active = $active;
		}
		
	}


?>