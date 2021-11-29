<?php
// http://localhost/InsertIntoPetsTable.php
require_once("EmanuelDobraInclude.php");
WriteHeaders("Insert into pets table", "Insert");
$mysqlObj = CreateConnectionObject();
// Important: Always assume data came from the user
// Normally would be post, not regular assignment statements,
// but this is a dummy test data
$TableName = "Pets";
$UserName = "Raze";
$UserWeight = 17.5;
$UserAnimalType = "cat";
$query = "Insert Into $TableName (PetName, Weight,
            AnimalType) values (?, ?, ?)";
$stmt = $mysqlObj->prepare($query);
// for developpment, not production, echo query:
if ($stmt == false) {
    echo "prepare failed on query $query " . $mysqlObj->error;
    exit;
}
// Pretending these are the values user entered using dummy data
$BindSuccess = $stmt->bind_param("sds", $userName, 
                $UserWeight, $UserAnimalType);
if ($BindSuccess) {
    $success = $stmt->execute();
} else {
    echo "Bind failed " . $stmt->error;
}

if ($success) {
    echo $mysqlObj->affected_rows . " record added.";
} else {
    echo $mysqlObj->error;
}

$stmt->close();
$mysqlObj->close();
WriteFooters();
?>