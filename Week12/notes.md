### Week 12 notes
- Make sure to clone date object, otherwise it becomes a copy that has the same address location (reference pointer)
> Use: $dueDate = clone $invoiceDate; 

- setTime($h, $m, $s) 
> $classOver->setTime(15, 20, 05) // 3:20:05pm

- setDate($y, $m, $d)
> $asstDue->setDate(2050, 07, 31) // July 31, 2050

- DateTime
> $now = new DateTime; // Get server date

- date_default_timezone_set($timeZone) 
> Sets timezone

- Displaying dates examples:
```
Example 1
$birthDate = new DateTime ('2080-01-01 04:03:12');

$outputString = 'Year: ' . $birthDate->format ('y');

$outputString becomes
	Year: 80

Example 2
$birthDate = new DateTime ('2080-01-01 04:03:12');

$outputString = "Born: " . $birthDate->format ('F Y') . 
                " in the " .
  			 $birthDate->format ('A') . ".";

$outputString becomes
	Born: January 2080 in the AM.
```