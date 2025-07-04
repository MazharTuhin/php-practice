<?php
// FOR LOOP
/*
$number = 2;

for($i = 1; $i <= 20; $i++) {
    $result = $number * $i;
	echo $number . " * " . $i . " = " . $result . "<br>";
}
*/
/*
$total_paper = 50;

for($current_paper = 1; $current_paper <= 50; $current_paper++) {
	echo "Exam paper has been checked:" . $current_paper . "<br>";
}
echo "All paper has been checked";
*/

// ‍Sum of the numbers between 1 to 10
/*
$sum = 0;
for ($i = 1; $i <=10; $i++) {
	$sum += $i;
}
echo $sum;
*/
/*
$rows = 8;

for ($i = 1; $i <= $rows; $i++) {
	for ($j = 1; $j <= $i; $j++) {
		echo "*";
	}
	// echo "<br>";
	echo PHP_EOL; // PHP_END_OF_LINE
}
*/

// WHILE LOOP
/*
$i = 1;

while ($i <= 10) {
	echo $i . "<br>";
	$i++;
}
*/

// DO...WHILE LOOP
/*
$i = 1;

do {
	echo $i . "<br>";
	$i++;
} while ($i <= 10);
*/

// FOREACH LOOP
/*
$fruits = ["Apple", "Mango", "Banana", "Orange", "Guava"];

foreach($fruits as $fruit) {
	echo $fruit . "<br>";
}
*/

// $person = [
// 	"name" => "Mazhar",
// 	"age" => "28",
// 	"ID" => true
// ];

// foreach ($person as $key => $value) {
// 	echo $key . ": " . $value . "<br>";
// }



// for ($i = 1; $i <= 10; $i++) {
// 	if ($i == 6) {
// 		break;
// 	}
// 	echo $i;
// }



// for ($i = 1; $i <= 10; $i++) {
// 	if ($i == 6) {
// 		continue;
// 	}
// 	echo $i;
// }

// $password = "12345";

// $userInput = "12345";

// while ($userInput !== $password) {
// 	$result = readline("Enter your correct password: ");
// }



$attempt = 1;
	
do {
	echo "Login Attempt {$attempt} of 3\n";
	$attempt++;
} while ($attempt <= 3);

