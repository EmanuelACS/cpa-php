<?php
// This is a concrete child class.
class clsTransport extends clsVehicle
{
	private $BoxLength;
	
	public function __construct ($pBoxLength=0, $pModel="Unknown", $pPrice=0)
	{
		// call the vehicle constructor to finish the initialization
		// you can use the same approach to call any method in
		// the parent class.
		parent::__construct($pModel, $pPrice);
		$this->setBoxLength($pBoxLength);
	}
	
	public function getBoxLength() 
	{ 
		return $this->BoxLength; 
	}
	
	public function setBoxLength($pBoxLength) 
	{ 
		if ($pBoxLength >= 0) 
			$this->BoxLength=$pBoxLength; 
	}

	// This function is in this class because it only applies to transports
	public function Rules ()
	{ 
		if ($this->BoxLength < 50)
			return ("Some rules for less than 50'");
		else
			return ("Some rules for 50' or longer");
		
	}
	// This is the concrete implementation of the abstract method.
	public function securityCheck()
	{ 
		// interesting code here about checks on people buying a transport.
		return ("Purchaser is cleared to drive a semi");
	}
	
	
}
 
		
