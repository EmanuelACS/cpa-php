<?php
require_once('clsPerson.php');
require_once('clsPhysician.php');
require_once('clsEmployee.php');
require_once('clsPatient.php');
require_once('clsAppt.php');

date_default_timezone_set('America/Toronto');


// Exercise 1 (Physician): dob is a string. 
// THE WRONG WAY but we  have to start somewhere.
$dob = '1956-04-20';
// Create object theDoc as an object of clsPhysician. Use $dob and dummy values.

echo "<h2>Exercise 1: dob is a string, the WRONG way</h2>";
// Call method testGetsAndSets. Running it will allow you to ensure 
// your data was saved properly.
// echo "<p>Testing gets and sets: " . call the method here . "</p>";	

// Once you are sure the data is properly saved:
//   Code method produceFileFolderLabel inside clsPhysician
//   See notes inside the class.
echo "<p>File folder label: " . call the method here . "</p>";



// Exercise 2 (Employee): dob and start date are hard coded date objects
echo "<h2>Exercise 2: dob and start date are hard coded date objects</h2>";
// Create a DateTime object called dob. Assign a date and time of your choice.

// Create a DateTime object called startDate. Assign a date and time of your choice.

// Create object employee as an object of clsEmployee. 
// Use the two date objects and dummy values.

// test your gets and sets
// echo "<p>Testing gets and sets: " . call the method here . "</p>";	

// Once you are sure the data is properly saved:
//    Code method produceFileFolderLabel inside clsEmployee
//    See notes inside the class.



// Exercise 3 (Patient): dob is 20 years before today's date  
echo "<h2>Exercise 3: dob is 20 years before today's date</h2>";
// create date time object $dob with a value that is 20 years before the system date

// create object patient using  $dob and dummy values.

// call testGetsAndSets
// echo "<p>Testing gets and sets: " . call method here . "</p>";	

// Once you are sure the data is properly saved:
//    Code method produceFileFolderLabel inside clsPatient
//    See notes inside the class.



echo "<h2>Exercise 4: employee data from user</h2>";
$SIN = '123456789'; $workPhone = '613-222-2222'; $workEmail = 'cat@cat.com'; 
$startYear = 2016; $startMonth=8; $startDay=2;
$month = 5; $day = 25; $year = 1999; $hour = 13; $minute = 55; 
$first="meow"; $last="claws";$homePhone = '555-555-5555';

// Create object $dob with no default values.

// USE THE setDate and setTime METHODS to assign values to $dob. Remember
// to use the above variables in the assignment.

// Create object $startDate with no default values.
// USE THE setDate and setTime METHODS to assign values to $startDate. Remember
// to use the above variables in the assignment.

// Create object employee using the date object and the above variables
 
// Code method produceFileFolderLabel. It should display:  
//    Employee: 123456789 meow claws Aug 2, 2016



echo "<h2>Exercise 5: Age calculation</h2>";
$dob = new DateTime('1982-02-18 9:12am');
// Create a patient object using $dob

// Call method calculateAge. See notes inside the class.



echo "<h2>Exercise 6: Next appointment date</h2>";
$numMonths=2;
$numDays = 3;
$myApptDate = new datetime('2015-8-9');
$myBookedApptTime = new datetime('11:04am');
$myActualApptTime = new datetime('11:55am');  
$myAppt = new clsAppt($myApptDate,$myBookedApptTime,$myActualApptTime);
// Call method calcNextApptDate. See notes inside the class.
// echo "<p>" . call calcNextApptDate "</p>";



echo "<h2>Exercise 7: Early or late</h2>";
// Using the myAppt object from exercise 6, call method determineEarlyOrLate.
// See notes inside the class.

// Here in DrOffice.php, echo a string:
//    Your appt was booked for <BookedApptTime>. 
//    You saw the doctor at <ActualApptTime>.
//    Your wait time was <x> minutes.
?>

 
 