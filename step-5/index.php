<?php

// FUNCTION


/*
* Determines if the argument is even or odd
*/

// function isEvenorOdd($num) {
//     if ($num % 2 == 0) {
//         return "$num is an even number.";
//     }
//     return "$num is an odd number.";
// }

// echo isEvenorOdd(5);



// function sum($num1, $num2) {
// 	$sum = $num1 + $num2;
// 	return "Sum of $num1 and $num2 is: $sum. \n";
// }

// echo sum(2, 5);


// default value of parameter
/*
function serve($foodType, $numberOfItems) {
	echo "{$numberOfItems} of {$foodType} has been served";
}

serve("Coffee", "2 cups");
*/

/*
function checkLogin($username, $isAdmin = false) {
    if ($isAdmin) {
        echo "$username (Admin) logged in";
    } else {
        echo "$username logged in";
    }
}

checkLogin("user123"); 
checkLogin("admin1", true); 
*/

// TYPE

/*
function sum(int $num1, int $num2) {
	return $num1 + $num2;
}

echo sum(2, 3); // 5
echo sum("a", 3); //error
*/

/*
function getValue(): int|string {
    return rand(0,1) ? "hello" : 42;
}

echo getValue();

*/

// UNLIMITED ARGUMENTS

// function sum(int ...$numbers): int {
// 	$result = 0;
// 	foreach($numbers as $number) {
// 		$result += $number;
// 	}
// 	return $result;
// }

// echo sum(1,2,3,4,5,6,7,8,9,10);

// function sum(int $x, int $y, int ...$numbers): int {
// 	$result = 0;
// 	foreach($numbers as $number) {
// 		$result += $number;
// 	}
// 	return $result;
// }

// echo sum(1,2,3,4,5,6,7,8,9,10);


## RECURSIVE FUNCTION

// function printNumber($counter, $end, $stepping=1) {
// 	if ($counter > $end) {
// 		return;
// 	}
// 	echo $counter . "\n";
// 	$counter++;
// 	printNumber($counter, $end, $stepping);
// }

// printNumber(12, 48, 3);


## SCOPE

// $name = "Mazhar"; // Global Scope

// function person() { // Local Scope
// 	// global $name, $age;
//     $age = 28;
//     echo $GLOBALS['name'];
// 	// echo "Name: {$name}. Age: {$age}";
// }

// person();
// echo $GLOBALS['age'];




