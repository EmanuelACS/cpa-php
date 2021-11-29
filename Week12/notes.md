## Week 12 notes
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

#### Displaying dates examples: 
![image](https://user-images.githubusercontent.com/29869696/143900271-8ecc8874-4d62-410f-889e-8c40f1202462.png)
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

### Excercises
#### Exercise 1
Code: 
```
$someDay = new DateTime ('tomorrow 10:15am');
echo "<p>someDay: " . $someDay->format('F d, y g:i:sAT') . "</p>" ;
```
Output: 
```
// tomorrow 10:15am = 2021-11-30 : 10:15am
 
```

#### Exercise 2
Code:
```
// Last day of refers to the last day of the current month
$LastDayOf = new DateTime ('last day of');
echo "<p>LastDayOf: " . $LastDayOf->format('F d, y g:i:saT') ."</p>";
```
Output: 
```
```

