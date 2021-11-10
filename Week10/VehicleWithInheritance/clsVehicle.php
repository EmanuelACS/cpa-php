<?php
// http://localhost/vehiclewithinheritance/usingallvehicles.php
// This is an abstract parent class. It is abstract because
// we don't want a programmer to be able to create an 
// object of this class. We want them to create an object
// of one of the child classes.
abstract class clsVehicle 
{
	private $Model;
	private $Price;
	private $MarkupPercent;
	private $TaxRate;
	
	protected function __construct ($pModel="Unknown",$pPrice=0)
	{
	   $this->setModel($pModel);
	   $this->setPrice($pPrice);
	   $this->setMarkupPercent();
	   $this->setTaxRate();
	}
	
	
	// the gets and sets are public so that the user of the class can
	// call them. If we wanted only the child classes to be able to
	// call the gets and sets, we would make them protected.
	public function getModel()  {  return $this->Model; }

	public function setModel($pModel) 
	{
        $pModel = trim ($pModel);
		if ($pModel != "")
			$this->Model = $pModel;
		
	}
	
	public function getPrice() 
	{  return $this->Price; }
	public function setPrice($pPrice) 
	{
		if ($pPrice >= 0)
			$this->Price = $pPrice;
	}
	
	public function getMarkupPercent() 	{  return $this->MarkupPercent; }
	private function setMarkupPercent($pMarkupPercent =0.45)
	{
		// real world: get value from lookup in database  
		$this->MarkupPercent = $pMarkupPercent;
	}
	
	public function getTaxRate () 	{  return $this->TaxRate; }
	private function setTaxRate($pTaxRate=0.13)
	{
		// real world: get value from lookup in database    
		$this->TaxRate = $pTaxRate;
	}
		
	// Functions CalculateMarkup, CalculateTax and CalculateTotals  are coded
	// in this base class because this software features applies to both 
	// child classes. Also, the code for the calculations is the same for the 
	// school buses and the transports.
	
	// This function is private. It is only being called from this class.
	private function CalculateMarkup ()
	{	 
		return($this->Price * $this->MarkupPercent);
	 
	}
	// This function is private. It is only being called from this class.
	private function CalculateTax($pSubtotal)
	{
		return ($pSubtotal * $this->TaxRate);
	}
	// This function is public because it needs to be called from anywhere. 
	public function ShowMeModelAndPrice()
	{
       return ("The $this->Model is priced at $this->Price");
    }
	
	// This function is public because it needs to be called from anywhere.
	public function CalculateTotals (&$pMarkup, &$pSubtotal, &$pTaxAmount, &$pTotal)
	{
		$pMarkup = $this->CalculateMarkup();
		$pSubtotal = $this->Price + $pMarkup;
		$pTaxAmount = $this->CalculateTax($pSubtotal);
		$pTotal = $pSubtotal + $pTaxAmount;
	}
	
	abstract public function securityCheck();
	
	public function __destruct ()
	{
	}
}
?> 
