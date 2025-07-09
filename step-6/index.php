<?php

###########################
## Array
##########################

######### Indexed Array ###########

// $person = array(
// 	"Mazhar",
// 	28,
// 	"Cumilla",
// );

/*
$person = ["Mazhar", 28, "Cumilla" ];

var_dump($person);
print_r($person);

echo "Name: $person[0], Age: $person[1], District: $person[2] \n";

// echo count($person)."\n";

$n = count($person);

for($i = 0; $i < $n; $i++) {
    echo $person[$i] . "\n";
}

foreach($person as $each) {
	echo $each . "\n";
}
*/

$fruits = ["Apple", "Banana", "Jackfruit", "Guava"];

## Change Data
// print_r($fruits);
// $fruits[2] = "Mango";
// print_r($fruits);

## array_pop();
// $lastData = array_pop($fruits);
// print_r($fruits);
// echo $lastData;

## array_push()
// array_push($fruits, "Mango", "Orange", ["Date", "Lemon"]);
// print_r ($fruits);

## array_shift()
// $removedData = array_shift($fruits);
// echo $removedData;

## array_unshift()
// array_unshift($fruits, "Orange", "Mango", ["Date", "Watermelon"]);
// print_r($fruits);

#################
## Associative Array

$foods = [
    'vagetables' => 'brinjal, brocolli, carrot, capsicum',
    'fruits' => 'apple, orange, banana',
    'drinks' => 'water, milk'
];

// echo $foods['fruits'] . "\n";

// foreach ($foods as $key => $value) {
//     echo $key . ": " . $value . "\n";
// }

// $keys = array_keys($foods);
// $values = array_values($foods);
// $count = count($foods);

// for($i = 0; $i < $count; $i++) {
//     $key = $keys[$i];
//     $value = $values[$i];

//     echo $key . ": " . $value . "\n";
// }

// // $foods['drinks'] = $foods['drinks'] . ", juice";
// $foods['drinks'] .= ", juice";

// print_r($foods);

##################
## String to Array and Array to String

// $fruits = "Apple, Banana, Mango, Jackfruit, Guava, Dates";

// $fruits = "Apple, Banana, Mango,Jackfruit, Guava,Dates";


// // $fruitsArray = explode(', ', $fruits);

// $fruitsArray = preg_split('/, |,/', $fruits);

// print_r($fruitsArray);
// echo count($fruitsArray);


// $drinks = [
// 	'drinks',
// 	'milk',
// 	'juice'
// ];

// $drinksStr = join(', ', $drinks);
// echo $drinksStr;

#########################
## Multidimensional Array

// $foods = [
//     'vagetables' => [
//         'brinjal',
//         'brocolli',
//         'carrot',
//         'capsicum'
//     ],
//     'fruits' => [
//         'apple',
//         'orange',
//         'banana'
//     ],
//     'drinks' => [
//         'water',
//         'milk',
//         ['orange juice', 'pineapple juice']
//     ]
// ];

// print_r($foods);

// echo $foods['drinks'][2][1];


############################
## Associative Array to String

$person = [
    "fName" => "Safwan",
    "lName" => "Mubin",
    "age" => 11,
    "class" => 5,
    "section" => "A"
];

// $serializedData = serialize($person);
// echo $serializedData;
// print_r (unserialize($serializedData));

$jsonData = json_encode($person);
echo $jsonData;
print_r (json_decode($jsonData));