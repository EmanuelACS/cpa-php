<?php
// http://localhost/zoobasicsform1.php
echo "
<!doctype html> 
<html lang = \"en\">
<head>
    <meta charset = \"UTF-8\">
    <title>Zoo Land</title>
</head>
<body>     
	<h1>It's A Zoo Around Here</h1>
	<form action = \"ZooBasicsForm2.php?\" method=post>
		<p>Name <Input type = text name = \"f_AnimalName\" Size = 20 value = \"Claws\"></p>
		<p>Type of Animal <Input type = text name = \"f_AnimalType\" Size = 10 value = \"Tiger\"></p>
		<p>Pounds of Food Per Day <Input type = text name = \"f_Pounds\" value = 25></p>
		<p>Notes <TEXTAREA name = \"f_Notes\" rows = 5 columns = 40></TEXTAREA></p>
		<button type=Submit>Submit</button>
	</form>
</body>
</html>
";
?>