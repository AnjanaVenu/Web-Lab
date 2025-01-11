<?php

$students = array("Anjana", "Hima", "Ann", "Diya", "Mary");


echo "<h2>ARRAY IS:</h2>";
print_r($students);
echo "<br>";

asort($students);
echo "<h3>Ascending Order (asort):</h3>";
print_r($students);
echo "<br>";


arsort($students);
echo "<h3>Descending Order (arsort):</h3>";
print_r($students);
echo "<br>";
?>
