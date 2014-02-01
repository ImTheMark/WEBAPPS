<?php

	class EventObject{
		
		public $name = "";
		public $startdatetime = "";		
		public $enddatetime = "";
		public $description = ""; 
		public $picture = "";
		public $active = "";
		
		public function __construct($name,$startdatetime,$enddatetime,$description,$picture,$active){
			$this->name = $name;
			$this->startdatetime = $startdatetime;
			$this->enddatetime = $enddatetime;
			$this->description = $description;
			$this->picture = $picture;
			$this->active = $active;
		}
		
	}


?>