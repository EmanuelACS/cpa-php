<?php
// an abstract class is a class that can't be used to create an object
// clsPerson is a super class that other classes can inherit
abstract class clsPerson
{

	public function getFirstName() 	{ return $this->firstName; }
	public function setFirstName($pFirstName) { if ($pFirstName != NULL) $this->firstName = $pFirstName;}
	public function getLastName() {  return $this->lastName;  }
	public function setLastName($pLastName) {if ($pLastName != NULL) $this->lastName = $pLastName;}
	public function getDob() { return $this->dob; }
	public function setDob($pDob) { if ($pDob != NULL) $this->dob = $pDob;}
	public function getHomePhone() 	{ return $this->homePhone; }
	public function setHomePhone($pHomePhone) {if ($pHomePhone!= NULL) $this->homePhone= $pHomePhone;}
	  
	// An abstract method is a method that does not have any code to execute.
	// It forces the subclass to implement the method and leaves all the 
	// details of the implementation to the subclass.
	// A fatal error will occur if the child does not code the method.
	// Parameters would also be included below.
	abstract public function produceFileFolderLabel();
	abstract public function testGetsAndSets();
	
	// code this function to return a string:
	//   Born: <birthmonth day, year> at <hour:minute:am/pm>. 
	//   Today's Date: month day, year. 
	//   You are <x> years <y> months <z> days <w> hours <q> minutes old.
	public function calculateAge()
	{  
		
	}
}
?>