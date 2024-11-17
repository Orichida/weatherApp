<?php
// Define the two dates
$date1 = "2024-04-25 14:05:45";
$date2 = "2024-04-25 14:06:00";

// Create DateTime objects for each date
$dateTime1 = new DateTime($date1);
$dateTime2 = new DateTime($date2);

// Calculate the difference between the two dates
$difference = $dateTime2->diff($dateTime1);

// Output the difference
echo "Difference: " . $difference->format('%I:%S'); // Output format: hours:minutes:seconds

?>