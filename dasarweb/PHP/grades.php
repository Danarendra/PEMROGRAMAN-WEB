<?php
$students = array(
    array("Alice", 85),
    array("Bob", 92),
    array("Charlie", 78),
    array("David", 64),
    array("Eva", 90)
);

$total = 0;
foreach ($students as $student) {
    $total += $student[1];
}

$average = $total / count($students);

echo "Class average: $average <br>";
echo "Students who scored above average: <br>";

foreach ($students as $student) {
    if ($student[1] > $average) {
        echo $student[0] . " : " . $student[1] . "<br>";
    }
}
?>