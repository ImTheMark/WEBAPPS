<?php

	class CompanyObject{
	
		public $idcompany;
		public $companyname;
		public $description;
		public $address;
		public $contactnumber;
		public $email;
		public $categories;
		
		public function __construct($idcompany, $companyname, $description, $address, $contactnumber,$email,$categories){
			$this->idcompany = $idcompany;
			$this->companyname = $companyname;
			$this->description = $description;
			$this->address = $address;
			$this->contactnumber = $contactnumber;
			$this->email = $email;
			$this->categories = $categories;
		}
		
	
	}
	

?>