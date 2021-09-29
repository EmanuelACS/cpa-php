<?php
// http://localhost/LoopEx.php
$Revenues = 0;
$Rfile = fopen("Revenues.dat", "r+") or fail("Unable to open Revenues.dat file!");
echo "Revenues: <br>";
while(!feof($Rfile))
  {
    $Rvalue = fgets($Rfile);
    echo $Rvalue;
    echo "<br>";
    $Revenues += $Rvalue;
  }
  echo "Total Revenues: $" . $Revenues;
fclose($Rfile);

echo "<br><br>";

$Expenses = 0;
$Efile = fopen("Expenses.dat", "r+") or fail("Unable to open Expenses.dat file!");
echo "Expenses: <br>";
while(!feof($Efile))
  {
    $Evalue = fgets($Efile);
    echo $Evalue;
    echo "<br>";
    $Expenses += $Evalue;
  }
  echo "Total Expenses: $" . $Expenses;
fclose($Efile);



$Total = 0;
$Total = $Revenues - $Expenses;
echo "<br><br>";
if ($Total == 0)
{
  echo "You broke even.";
}
else if ($Total > 0)
{
  echo "Profit: $" . $Total;
}
else if ($Total < 0)
{
  echo "Loss: $" . $Total;
}
?>