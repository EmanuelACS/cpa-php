<?php
// http://localhost/VehicleNoInheritance/usingvehicle.php

class clsVehicle {
    private $mModel; 
    private $mPrice;
    private $mMarkupPercent;
    private $mTaxRate;

    // Convetions
    // p -> parameter
    // m -> atributes (member variables)
    // n -> new variables
    public function __construct($pModel="unknown", $pPrice=0) {
        // $this accesses local variable
        // refer to an attribute or a method in the class
        $this->setModel($pModel);
        $this->setPrice($pPrice);
        $this->setMarkupPercent();
        $this->setTaxRate();
        // DO NOT 
        // $mModel = $pPrice;
        // ^ will create new variable mModel on the fly

    }

    public function __destruct() {
        // example -> close db connection
    }

    public function getModel() {
        return $this->mModel;
    }

    public function getPrice() {
        return $this->mPrice;
    }

    public function setModel($pModel) {
        // only assign valid data
        $pModel = trim($pModel);
        if ($pModel != "")
            $this->mModel = $pModel;
        else {
            // could optionally return true when assigned
            // and return false when invalid
        }
    }

    public function setPrice($pPrice) {
        $pPrice = trim($pPrice);
        if ($pPrice > 0)
            $this->mPrice = $pPrice;
    }

    public function ShowMeData() {
        $nModel = $this->getModel();
        $nPrice = $this->getPrice();

        return "Model: $nModel, Price: $nPrice"; 
    }

    public function getMarkupPercent() {
        return $this->mMarkupPercent;
    }

    public function getTaxRate() {
        return $this->mTaxRate;
    }

    private function setMarkupPercent($pMarkupPercent=0.45) {
        // reald world: get value from a mysql table
        $pMarkupPercent = trim($pMarkupPercent);
        if ($pMarkupPercent != NULL)
            $this->mMarkupPercent = $pMarkupPercent;
    }

    private function setTaxRate($pTaxRate=0.13) {
        $pTaxRate = trim($pTaxRate);
        if ($pTaxRate > 0 && $pTaxRate < 1)
            $this->mTaxRate = $pTaxRate;
    } 

    private function CalculateMarkup() {
        return $this->getPrice() * $this->getMarkupPercent();
    }

    private function CalculateTax($pSubTotal) {
        return $pSubTotal * $this->getTaxRate();
    }

    public function CalculateTotal() {
        $nMarkupAmnt = $this->CalculateMarkup();
        $nSubTotal = $this->getPrice() + $nMarkupAmnt;
        $nTaxAmnt = $this->CalculateTax();
        $nTotal = $nSubTotal + $nTaxAmnt;
        return $nTotal;
    }    
}
?>