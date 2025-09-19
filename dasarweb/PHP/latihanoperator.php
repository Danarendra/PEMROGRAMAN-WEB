<?php
$totalSeats = 45;
$occupied = 28;
$emptySeats = $totalSeats - $occupied;

$percentageEmpty = ($emptySeats / $totalSeats) * 100;

echo "Total seats in the restaurant: $totalSeats <br>";
echo "Seats occupied: $occupied <br>";
echo "Seats still empty: $emptySeats <br>";
echo "Percentage of seats still empty: $percentageEmpty %";
?>