<?php   
// http://localhost/CreateCOMP220DBandTable.php
// The authentication values are stored in auth.txt. 
// Submitted coursework must use the original settings: localhost, root, mysql, COMP220db, 3306
// The default password (line 3 of auth.txt) may be mysql or an empty string.  
// If this code does not run, your system is likely configured differently than the default installation.  
// If this is the case, change auth.txt to match your configuration. Reset before submitting.

// The code below erases all data and design from table name listed below.
$fh = fopen('auth.txt','r');
$Host =  trim(fgets($fh));
$UserName = trim(fgets($fh));
$Password = trim(fgets($fh));
$Database = trim(fgets($fh));
$Port = trim(fgets($fh));
$TableName = "220TestTable";
fclose($fh);
echo "<h1>Create COMP220db database and Testing table</h1>";
echo "<p>The purpose of this page is to verify your installation. Understanding this code will come later in the course.</p>";
$mysqlObj = new mysqli($Host, $UserName, $Password, "", $Port);
// -> is like . in cpp
// Has to be valid mySql inside the brackets
// stmt = statement object
$stmt = $mysqlObj->prepare("create database if not exists $Database");
// exectue is when our db is created
$dbCreated = $stmt->execute(); 	
// If failure to create
if (!$dbCreated)
	echo $mysqlObj->connect_errno;
else
{
	// Otherwise we know that db exists, so we can create tables
	// now that database is created, specify we are using the new database $Database 
	$mysqlObj = new mysqli($Host, $UserName, $Password, $Database, $Port);
	echo "<p>Database $Database is ready.</p>" ; 	
	$stmt = $mysqlObj->prepare("Drop table If Exists $TableName");
	$stmt->execute(); // executes drop table
	// You can make the following a one liner, but it'll be harder to debug 
	$field1 = "testfield1 varchar(100)";
	// 4,1 means that there's 4 spots (_ _ _ . _) so a 3 digit # with one decimal
	$field2 = "testfield2 decimal (4,1)"; 
	$SQLStatement = "Create Table $TableName($field1, $field2)";
	// If you get an error msg, use echo $SQLStatement 
	$stmt = $mysqlObj->prepare($SQLStatement);
	if ($stmt == false) echo "Prepare failed on query $SQLStatement";
	$CreateResult = $stmt->execute();
	if ($CreateResult) 
		echo "$TableName table created.";
	else
		// Remove all error statements when giving to production
		// as they are security breaches
		echo "Cannot create table $TableName. Query $SQLStatement failed. " . $stmt->error;
}
// Have to close both files and objects
$stmt->close();
$mysqlObj->close();
?>