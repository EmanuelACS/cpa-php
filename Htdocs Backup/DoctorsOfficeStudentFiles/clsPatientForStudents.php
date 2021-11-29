<?php
//  clsPatient inherits clsPerson. 
// clsPatient is a subclass or concrete class
class clsPatient extends clsPerson
{
	private $HCN, $cellPhone, $patientEmail;

	public function getHCN() 	{ return $this->HCN; }
	public function setHCN($pHCN) {if ($pHCN!= NULL) $this->HCN= $pHCN;}	
	public function getCellPhone() 	{ return $this->cellPhone; }
	public function setCellPhone($pCellPhone) {if ($pCellPhone!= NULL) $this->cellPhone= $pCellPhone;}
	public function getPatientEmail() 	{ return $this->patientEmail; }
	public function setPatientEmail($pPatientEmail) {if ($pPatientEmail!= NULL) $this->patientEmail= $pPatientEmail;}

	public function testGetsAndSets()
	{  
		return "Employee: " .  $this->getHCN() . " " . 
		     parent::getFirstName() . " " . 
			 parent::getLastName() . " " . 
			 parent::getDob()->format('M j, Y') . " " . 
			 parent::getHomePhone() . " " . 
			 $this->getCellPhone() . " " . 
	         $this->getPatientEmail() . " " ;
	}

	// concrete implementation of the abstract method
	// code the function to return a string with
	// Patient: <HCN> <firstname> <lastname> <dateofbirth>
	public function produceFileFolderLabel()
	{
	 
	}
	
}	
?>