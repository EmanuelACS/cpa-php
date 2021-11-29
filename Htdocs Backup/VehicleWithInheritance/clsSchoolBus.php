<?php
// This is a concrete child class.
class clsSchoolBus extends clsVehicle
{
	private $numStudents;
	// defaults for parent attributes are in parent
	public function __construct ($pNumStudents=0, $pModel="Unknown", $pPrice=0)
	{
		// call vehicle constructor to finish the initialization
		parent::__construct($pModel, $pPrice);
		$this->setnumStudents($pNumStudents);
	}
	
	public function getnumStudents() 
	{ 
		return $this->numStudents; 
	}
	
	public function setnumStudents($pNumStudents) 
	{ 
		if ($pNumStudents >= 0) 
			$this->numStudents=$pNumStudents; 
	}

    // This is the concrete implementation of the abstract method.
	public function securityCheck()
	{ 
		// interesting code here about checks on people buying a school bus.
		return ("Purchaser is cleared to drive kids");
	}
	
}
 
		
