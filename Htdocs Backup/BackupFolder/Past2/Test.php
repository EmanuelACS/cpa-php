<?php
// http://localhost/Test.php
require_once("EmanuelDobraInclude.php");
WriteHeaders("Display All Pets", "DisplayAllPets");
$mysqlObj = CreateConnectionObject();
$TableName = "pets";

// ex1
$query = "Select PetName, Weight, AnimalType from $TableName";
$stmt = $mysqlObj->prepare($query);
$stmt->bind_result("sds", "PetName", "Weight", "AnimalType");
$stmt->execute();
while ($stmt->fetch() == true) {
    echo $PetName . " " . $Weight . " " . $AnimalType;
}
echo "# of records: " . $stmt->num_rows();

// ex2 make the following changes
// $query + where weight > ?
// $stmt->bind_param("d", $POST["f_weight"], (?));
?>

