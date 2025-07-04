<?php

// PHP String Operator

// Concatenation (.) যুক্ত করা

$firstName = "Mazhar";
$lastName = "Tuhin";

$fullName = $firstName . " " . $lastName;

// echo $fullName;


$name = "Mazhar";

// echo "My name is {$name}";

// Null Coalescing

// $value = "Mazhar";
$nullCls = $value ?? 'anonymous';
// echo $nullCls;


// IF_ELSEIF
/*
$age = 16;

if ($age >= 18) {
	echo "You are an adult!";
} else {
	echo "Your are not an adult";
}
*/

/*
$score = 75;

if ($score > 100 && $score < 0) {
	echo "Unvalid Score!";
} elseif ($score >= 80) {
	echo "Grade: A+";
} elseif ($score >= 70) {
	echo "Grade: A";
} elseif ($score >= 60) {
	echo "Grade: A-";
} elseif ($score >= 50) {
	echo "Grade: B";
} elseif ($score >= 40) {
	echo "Grade: C";
} else {
	echo "Failed!";
}
*/

//NESTED IF

/*
$age = 25;
$hasID = true;

if ($age >= 18) {
	if ($hasID == true) {
		echo "Access granted!";
	} else {
		echo "ID required!";
	}
} else {
	echo "Acces denied!";
}
*/


// SWITCH

/*
$day = "Friday";

switch ($day) {
	case "Friday":
	case "Saturday":
		echo "Weekend";
		break;
	case "Sunday":
		echo "First working day of the week!";
		break;
	case "Thursday":
		echo "Last working day of the week!";
		break;
	default:
		echo "A Regular day";
}
*/

// Ternary Operator

$age = 16;
$checkAge = ($age >= 18) ? "You are an adult!" : "You are not an adult";

echo $checkAge;




