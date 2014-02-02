<?php

	class CompanyObject{
	
		public $idcompany;
		public $companyname;
		public $address;
		public $contactnumber;
		public $email;
		
		public function __construct($idcompany, $companyname, $address, $contactnumber,$email){
			$this->idcompany = $idcompany;
			$this->companyname = $companyname;
			$this->address = $address;
			$this->contactnumber = $contactnumber;
			$this->email = $email;
		}
	
	}
	

?>