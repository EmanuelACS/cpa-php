# Week 12 notes
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

## DateTime Excercises
### Exercise 1
Code: 
```
$someDay = new DateTime ('tomorrow 10:15am');
echo "<p>someDay: " . $someDay->format('F d, y g:i:sAT') . "</p>" ;
```
Output: 
```
// tomorrow 10:15am = 2021-11-30 : 10:15am
someDay: November 30, 21 10:15:00AMEST
```

### Exercise 2
Code:
```
// Last day of refers to the last day of the current month
$LastDayOf = new DateTime ('last day of');
echo "<p>LastDayOf: " . $LastDayOf->format('F d, y g:i:saT') ."</p>";
```
Output: 
```
LastDayOf: November 30, 21 11:03:18amEST
```

### Excercise 3
Exercise 3
Notice how the word at is coded. If used between single quotes, you must escape the letter a and the letter t. If you do not escape the a, php thinks you want am/pm from the displaying dates table shown earlier. If used between double quotes, escape only the letter t.

```
$januaryMeeting = new DateTime();
$januaryMeeting->setDate(2050, 01, 05);
$januaryMeeting->setTime(20, 45, 22);
$februaryMeeting = clone $januaryMeeting;
$februaryMeeting->modify('+1 month');
$outputString = "January meeting: " .
               $januaryMeeting ->format ('M. j, Y \a\t g:i a') .
               ". February meeting: " . 
               $februaryMeeting ->format ('M. j, Y \a\t g:i a');
echo $outputString ;
```

## DateInterval Class
> Represents a time period, not a date

- $interval = new DateInterval('P30D');
> a 30 day interval

- You start with a dateTime obj, and then to add time to it you add dateInterval.

- Examples:
    - 'P1Y' // 1 year
    - 'P4D', 'P1Y6M4D' 
    - 'Pt10M'
    - 'PT30S', 'P1Y1MT1M10S'
> You cannot specify days and weeks in the same interval string

- Formatting output
> %R %y/Y %m/M %d/D %a %h/H %i/I %s/S %f/F
```
$timePeriod = new DateInterval ('P1Y4D');
echo $timePeriod->format('%y year and %d days');
	displays 1 year and 4 days
```

## DateInterval Excercises
### Exercise 1
What interval is assigned in the following examples:
```
$interval1 = new DateInterval ('P1Y2M10D');		
$interval2 = new DateInterval ('PT1H2M3S');		
```
```
interval1: 1yr, 2mon, 10d
interval2: 1hr, 2min, 3sec
``` 

### Exercise 2
Code an interval to represent 4 years, 11 months, 4 days, 5 hours, 55 minutes and 18 seconds.
```
$myInterval = new DateInterval ('P4Y11M4DT5H55M18S');
```
 	
### Exercise 3
What is the output from the following code? Include every space and punctuation mark in your answer.
```
$someInterval = new DateInterval ('P3Y05M06DT17H02M08S');
echo $someInterval->format ('%m months, %d days');
echo $someInterval->format ('%R %M months');
echo $someInterval->format ('%R %y %m %d %H %I %S');
```
```
//Output
echo1: 5 months, 6 days
echo2: + 05 months
echo3: + 3 5 6 17 02 08 
```
 
### Exercise 4
Given:
```
$someInterval = new DateInterval ('P3Y05M06DT17H02M08S')	
    Display   +3y 5m 6d 17:02:08
```
Code: 
```
echo $someInterval->format ('%R%yy %mm %dd %H:%M:%S');
```

## Date and Time Arithmetic
Example:
```
// Assign a due date 3 weeks from now
$checkoutLength = new DateInterval('P3W');
$dueDate = new DateTime();
$dueDate->add($checkoutLength);

// To determine the difference between two dates, use the diff method. 
// It returns a date interval object that represents the amount of time between two dates.
$interval = $datetime1->diff($datetime2);
```

## Excercises
### Exercise 1
Write code that uses today’s date to determine who can vote. Echo to the screen:
> You can vote if you were born on or before <insert date here>

The date should be formatted as mm/dd/yyyy with no leading zeroes. For the purpose of learning, use the sub method.
```
// Answer
```

### Exercise 2
Given:
```
$due = new DateTime('2018-07-04 9:30:00');
$submitted = new DateTime('2018-08-10 10:33:22');
```

Write code to display either:

Assignment was on time.
or
Assignment was late by <number of days> days.

You cannot assume the dates will be the values shown above. Hint: when formatting the number of days late, use %a not %d.

```
// Answer
```