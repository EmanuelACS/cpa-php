<?php
// Everything that has to be displayed on  a page has to be in an echo container
echo "
<!doctype html> 
<html lang = \"en\">
<head>
    <meta charset = \"UTF-8\">
    <title>Zoo Land</title>
</head>
<body>     
<h1>Heading One</h1>";
$animalName = $_POST["f_AnimalName"];
$animalType = $_POST["f_AnimalType"];
$pounds = $_POST["f_Pounds"];
$notes = $_POST["f_Notes"];
echo "<p>Animal name: ";
echo $animalName;
echo "</p>\n";
echo "</body>
</html>
";
?>