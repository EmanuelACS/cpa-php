<?php
// http://localhost/CustomerAbstract/customersandemployees.php

abstract class clsPerson {
	private $mFirstName;
	private $mLastName;
	private $mSIN;

	abstract function bdayGreeting();

	public function getFirstName()
	{
		return $this->firstName;
	}
	public function setFirstName($pFirstName)
	{
		if ($pFirstName != NULL)
			$this->firstName = $pFirstName;
	}
	public function getLastName()
	{
		return $this->lastName;
	}
	public function setLastName($pLastName)
	{
		if ($pLastName != NULL)
			$this->lastName = $pLastName;
	}
	public function setSIN($pSIN)
	{
		if ($pSIN != NULL)
			$this->SIN = $pSIN;
	}
	public function getSIN()
	{
		return ($this->SIN);
	}	

}

class clsCustomer extends clsPerson {
	private $mCreditCardNumber;

	public function setCardNumber($pCardNumber)
	{
		if ($pCardNumber != NULL)
			$this->cardNumber = $pCardNumber;
	}
	public function getCardNumber()
	{
		return ($this->cardNumber);
	}	

	public function bdayGreeting() {
		return
		"Happy Birthday to our fav customer " .
			$this->getFirstName() . " " .
			$this->getLastName() . ". Come in for 10% off."; 
	}

}

class clsEmployee extends clsPerson {
	private $mYearsSeniority;

	public function setYearsSeniority($pYearsSeniority)
	{
		if ($pYearsSeniority != NULL)
			$this->yearsSeniority = $pYearsSeniority;
	}
	public function getYearsSeniority()
	{
		return ($this->yearsSeniority);
	}	

	public function bdayGreeting() {
		return
		"Happy Birthday to our fav employee " .
			$this->getFirstName() . " " .
			$this->getLastName() . ". Take the day off."; 
	}
}
?> 