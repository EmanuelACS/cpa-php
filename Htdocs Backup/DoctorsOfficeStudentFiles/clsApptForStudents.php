<?php  
class clsAppt
{
	public function getApptDate() { return $this->apptDate; }
	public function setApptDate($pApptDate) { if ($pApptDate != NULL) $this->apptDate = $pApptDate;}
	public function getBookedApptTime() { return $this->bookedApptTime; }
	public function setBookedApptTime($pBookedApptTime) { if ($pBookedApptTime != NULL) $this->bookedApptTime = $pBookedApptTime;}
	public function getActualApptTime() { return $this->actualApptTime; }
	public function setActualApptTime($pActualApptTime) { if ($pActualApptTime != NULL) $this->actualApptTime = $pActualApptTime;}
	
	public function testGetsAndSets()
	{
		echo "<p>Testing Appt gets and sets: " . 
		($this->apptDate!=null ? $this->getApptDate()->format('M d, Y') : "") . " " .
		($this->bookedApptTime!=null ? $this->getBookedApptTime()->format('h:i') : "") . " " .
		($this->actualApptTime!=null ? $this->getActualApptTime()->format('h:i') : "") . "</p>";
	}
	// code method calcNextApptDate to receive two integer parameters: 
	// # of months & # of days. The function returns a string:
	//   Original appt: <apptdate>
	//   Your next appt is in <x> months and <y> days. 
	//   That date is <nextapptdate>
	
	
	// code method determineEarlyOrLate  
	// to calculate the number of minutes between the booked appt time
	// and the actual appt time and return the number of minutes.

}
?>
