<?php
// teste 1
$add = fn($a, $b) => $a + $b;

echo $add(2, 3); // Outputs: 5
// teste 2
$factor = 10;
$multiply = fn($x) => $x * $factor;

echo $multiply(5); // Outputs: 50

// teste 3 Anonymous Function:
$factor = 10;
$multiply = function($x) use ($factor) {
    return $x * $factor;
};

echo $multiply(5); // Outputs: 50
 
// teste 4 Arrow Function:

$factor = 10;
$multiply = fn($x) => $x * $factor;

echo $multiply(5); // Outputs: 50
