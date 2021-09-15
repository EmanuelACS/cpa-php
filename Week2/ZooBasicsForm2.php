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
<h1>Heading One</h1>\n";
// '\n' is used for debugging, as it separates html elements with a new line
$animalName = $_POST["f_AnimalName"];
$animalType = $_POST["f_AnimalType"];
$pounds = $_POST["f_Pounds"];
$notes = $_POST["f_Notes"];
// First way to do it
echo "<p>Animal name: ";
echo $animalName;
echo "</p>\n";
// Concat strings
echo "<p>Type: " . $animalType . "</p>";
echo "<p>Food intake: " . $pounds . " pounds per day.</p>";
// Shortcuts (works for simple taks)
echo "<p>Details: $notes</p>";

echo "</body>
</html>
";
?>