<?php
  // http://localhost/vehiclewithinheritance/usingallvehicles.php
  require_once ("clsVehicle.php");
  require_once ("clsTransport.php");
  require_once ("clsSchoolBus.php");
  function AddSpace()
  {
	echo  "</p><p>";
    for ($ctr=0; $ctr<125; $ctr++)
	   echo "-";
    echo "</p>";
  }
  
  $HCBus =  new clsSchoolBus ();
  $HCBus->setnumStudents(15);
  $HCBus->setModel('Yellow Submarine');
  echo "Capacity for HC Bus " . $HCBus->getModel() . " is " . $HCBus->getNumStudents();  
  AddSpace();
  
  $KCBus = new clsSchoolBus (20, "YEL", 800000);
  echo "<p>School Bus Model and Price: " . $KCBus->ShowMeModelAndPrice() . ". ";
  echo $KCBus->securityCheck();
  AddSpace();
    
  $BigRig = new clsTransport (55, "XXL", 550000);
  echo "<p>Big Rig Model and Price: " . $BigRig->ShowMeModelAndPrice()  . ". ";
  echo "<p>Big Rig Rules: " . $BigRig->Rules() . ". ";
  echo $BigRig->securityCheck();
  AddSpace();
  
  $SemiRig = new clsTransport (30, "XXL", 350000);
  echo "<p>Semi Rig Model and Price: " . $SemiRig->ShowMeModelAndPrice()  . ". ";
  echo "<p>Semi Rig Rules: " . $SemiRig->Rules();
  AddSpace();
  	  
  $BigRig->CalculateTotals ($Markup, $Subtotal, $TaxAmount, $Total);
  echo "<p>Big Rig</p>";
  echo "<p>Markup: " . number_format($Markup) . " Subtotal: " . number_format($Subtotal) . 
       " Tax Amount: " . number_format($TaxAmount) . " Total: " . number_format($Total) . "</p>";
  echo "<p>Semi Rig</p>";
  $SemiRig->CalculateTotals ($Markup, $Subtotal, $TaxAmount, $Total);
  echo "<p>Markup: " . number_format($Markup) . " Subtotal: " . number_format($Subtotal) . 
       " Tax Amount: " . number_format($TaxAmount) . " Total: " . number_format($Total) . "</p>";
	   
  
     
?>

