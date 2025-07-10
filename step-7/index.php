<?php

########################
## unset()
// $person = [
//     'name' => 'Safwan', 
//     'age' => 11,
//     'class' => 'Five',
// ];

// unset($person['class']);
// print_r($person);


// $fruits = ['Apple', 'Orange', 'Guava'];
// unset($fruits[0]);
// print_r($fruits);

#########################
## isset()
/*
$name = 0;

if(isset($name)) {
    echo "Name is set";
} else {
    echo "Name is not set";
}

echo "\n";

## empty()

if(empty($name)) {
    echo "Name is empty";
} else {
    echo "Name is not empty";
}

## is_numeric() and all 

if(isset($name) && (is_numeric($name) || $name != '')) {
    echo "Name is set and it's not empty";
} else {
    echo "Name is either not set or empty";
}
*/

#################
## ‍array_slice()

// $fruits = ['Apple', 'Banana', 'Guava', 'Orange', 'Pineapple', 'Jackfruit', 'Dates'];

// // $someFruits = array_slice($fruits, -4, -1);
// $someFruits = array_slice($fruits, 2, 2, true);

// print_r($someFruits);

// print_r($fruits);

// $sectionsStudent = [
//     "A" => 30,
//     "B" => 25,
//     "C" => 34,
//     "D" => 21,
//     12 => 25,
//     "E" => 20
// ];

// $someStudents = array_slice($sectionsStudent, 3, -1, true);

// print_r($someStudents);

#####################
## ‍array_splice()

/*
$fruits = ['Apple', 'Banana', 'Guava', 'Orange', 'Pineapple'];

$someFruits = array_splice($fruits, -4, 2, ['Jackfruit', 'Dates']);
print_r($someFruits);
print_r($fruits);
*/

#####################
## array_merge()
/*
$fruits1 = ['Apple', 'Banana', 'Guava'];
$fruits2 = ['Orange', 'Pineapple'];

$allFruits = array_merge($fruits1, $fruits2);
print_r($allFruits);


$sectionsStudent1 = ["A" => 30, "B" => 25, "C" => 34, "D" => 21, 12 => 25, "E" => 20];
$sectionsStudent2 = ["D" => 12, "L" => 20, 8 => 24, "Shapla"];

$totalStudents = array_merge($sectionsStudent1, $sectionsStudent2);
print_r($totalStudents);


$defaultProfile = ['name' => 'User', 'email' => 'user@example.com', 'phone' => '', 'language' => 'English'];
$userInput = ['name' => 'Mazhar', 'email' => 'mazhartuhin78@gmail.com'];

$userProfile = array_merge($defaultProfile, $userInput);

print_r($userProfile);


$sectionsStudent1 = ["A" => 30, "D" => 21, 12 => 25];
$sectionsStudent2 = ["D" => 25, "L" => 20, 8 => 24, "Shapla"];

$totalStudents = $sectionsStudent1 + $sectionsStudent2;
print_r($totalStudents);
*/

####################
## Sorting

/*
## sort() & rsort()
$fruits = ['Apple', 'olive', 'dragon', 'Guava', 'C' => 'Banana', 'Orange', 'Pineapple', 'Dates', 'Jackfruit'];
$numbers = [3, 22, 2, 11, 4, 66, 4, 1, 2, 9];

// sort($fruits);
// sort($numbers);
// asort($numbers);
sort($numbers, SORT_STRING);
sort($fruits, SORT_STRING | SORT_FLAG_CASE);

print_r($fruits);
print_r($numbers);

## asort() & arsort()

$person = [
    'name' => 'Safwan', 
    'age' => 11,
    'class' => 'Five',
    'section' => 'A',
    5 => true,
    10
];

asort($person);
print_r($person);

## ksort() & krsort()
$person = [
    'name' => 'Safwan', 
    'age' => 11,
    'class' => 'Five',
    'section' => 'A',
    5 => true,
    10
];

ksort($person);
print_r($person);
*/

############################
## Searching in Array

## in_array(), array_search(), key_exists()
/*
$fruits = ['Apple', 'olive', 'dragon', 'Guava', 'b' => 'banana', 'C' => 'Banana', 'Orange', 'Pineapple', 'Dates', 'Jackfruit'];
$numbers = [3, 22, 2, 11, '56', 4, 66, 4, 1, 2, 9];

// $search = in_array(56, $numbers);
// $search = in_array(11, $numbers, true);
// $searchOffset = array_search(11, $numbers);

$searchOffset = array_search("olive", $fruits);

echo $searchOffset . "\n";

// if($search && $searchOffset) {
//     echo "found! Offset is: $searchOffset";
// } else {
//     echo "not found!";
// }


$keySearch = key_exists('c', $fruits);

if($keySearch) {
    echo "key exists";
} else {
    echo "key not exists!";
}
*/

###############################
## Difference and Intersection

## array_intersect()
/*
$numbers1 = [1, 4, 5, 66, 1, 3, 23, 2, 54];
$numbers2 = [88, 3, 21, 44, 3, 28, 1, 2, 7];

$fruits1 = ['a' => 'apple', 'b' => 'banana', 'c' => 'lemon'];
$fruits2 = ['d' => 'dragon', 'b' => 'malta', 'e' => 'grapes', 'c' => 'lemon'];

$intersect = array_intersect($numbers2, $numbers1);
$intersectF = array_intersect($fruits1, $fruits2);

print_r($intersect);
print_r($intersectF);


print_r (array_intersect_assoc($numbers1, $numbers2));
print_r (array_intersect_assoc($fruits1, $fruits2));

print_r (array_diff($numbers1, $numbers2));
print_r (array_diff($fruits1, $fruits2));
*/

###############################
## array walk()
/*
// display Square of all elements
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
function square($num) {
    printf("Square of %d is %d \n", $num, $num * $num);
}

array_walk($numbers, 'square');
print_r($numbers);

// Make Uppercase
$fruits = ['apple', 'banana', 'mango'];
function toUppercase(&$value, $key) {
    $value = strtoupper($value);
}

array_walk($fruits, 'toUppercase');
print_r($fruits);

## array_map()
// return Cube
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
function cube($num) {
    return $num * $num * $num;
}

$cubicNumbers = array_map('cube', $numbers);
print_r($cubicNumbers);
print_r($numbers);

// Uppercase First

$fruits = ['apple', 'banana', 'mango'];

$capitalized = array_map('ucfirst', $fruits);
print_r($capitalized);

## array_filter()

// filter even and odd numbers

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];

function even($num) {
    return $num % 2 == 0;
}

function odd($num) {
    return $num % 2 == 1;
}

$evenNumbers = array_filter($numbers, 'even');
$oddNumbers = array_filter($numbers, 'odd');

print_r($evenNumbers);
print_r($oddNumbers);

--
$array = [0, 1, '', 'hello', null, false, true, 'world'];

$filtered = array_filter($array);
print_r($filtered);
*/

####################################################
################ A real life example of these three functions ####################
####################################################
/*
$products = [
    ['name' => 'Laptop', 'price' => 50000, 'category' => 'electronics'],
    ['name' => 'T-shirt', 'price' => 500, 'category' => 'clothing'],
    ['name' => 'Phone', 'price' => 25000, 'category' => 'electronics'],
    ['name' => 'Jeans', 'price' => 1500, 'category' => 'clothing']
];

// 1. Add discount using array_walk
array_walk($products, function(&$product) {
    $product['discounted_price'] = $product['price'] * 0.9; // 10% discount
});

// 2. Get only product names using array_map
$productNames = array_map(function($product) {
    return $product['name'];
}, $products);

// 3. Filter electronics products using array_filter
$electronics = array_filter($products, function($product) {
    return $product['category'] === 'electronics';
});

print_r($products);
print_r($productNames);
print_r($electronics);
*/

################################
## array_reduce()

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// function sum($oldValue, $newValue) {
//     return $oldValue + $newValue;
// }

// $sum = array_reduce($numbers, 'sum', 0);
// echo $sum;

function sumEven($oldValue, $newValue) {
    if($newValue % 2 == 0) {
        return $oldValue + $newValue;
    }
    return $oldValue;
}

$sum = array_reduce($numbers, 'sumEven');
echo $sum;