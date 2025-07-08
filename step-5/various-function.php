<?php

## Copy by Value (Deep Copy)

/*
$name = "Mazhar";
function printName($pName) {
	$pName = "Tuhin";
	echo "Hello {$pName}\n";
}

printName($name);
echo $name;
*/

## Copy by Reference (Shallow Copy)
/*
$name = "Mazhar";
function printName(&$pName) {
	$pName = "Tuhin";
	echo "Hello {$pName}\n";
}

printName($name);
echo $name;
*/



/* 
VARIOUS FUNCTIONS 
/*
#######################
## Recursive Function

function printNumber($counter, $end, $stepping=1) {
	if ($counter > $end) {
		return;
	}
	echo $counter . "\n";
	$counter++;
	printNumber($counter, $end, $stepping);
}

printNumber(12, 48, 3);


##############################
## Anonymous Function

// $greeting = function() {
// 	echo "Hello World!";
// };

// $greeting();

/*
$name = "Mazhar";
$greeting = function() use ($name) {
	echo "Hello {$name}";
};

$greeting(); 
*/

###################################
## Arrow Function

// $sum = fn($a, $b) => $a + $b;

// echo $sum(5, 4);

##################################
## Callback function

function  sayHello($name) {
    echo "Hello, {$name}";
}

function greeting(callable $callbackFunc, string $personName) {
    return $callbackFunc($personName);
}

$result = greeting("sayHello", "Mazhar");



