<?php

	class CompanyObject{
	
		public $idcompany;
		public $companyname;
		public $description;
		public $address;
		public $contactnumber;
		public $email;
		public $website;
		public $categories;
		public $picturename;
		public $picturelink;
		public $calendarlink;
		
		public function __construct($idcompany, $companyname, $description, $address, $contactnumber,$email,$website,$categories,$picturename,$picturelink,$calendarlink){
			$this->idcompany = $idcompany;
			$this->companyname = $companyname;
			$this->description = $description;
			$this->address = $address;
			$this->contactnumber = $contactnumber;
			$this->email = $email;
			$this->website = $website;
			$this->categories = $categories;
			$this->picturename = $picturename;
			$this->picturelink = $picturelink;
			$this->calendarlink = $calendarlink;
		}
		
	
	}
	

?>