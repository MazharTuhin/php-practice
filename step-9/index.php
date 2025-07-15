<?php

########################################
## String
/*
$name = "Laravel";

// echo "Name: $name.\n";
// echo 'Name: $name.\n';

$text = <<<EOD
Hello, World;

    $name is awesome! \n

\t PHP is immortal;
EOD;
// echo $text;

$text2 = <<<'EOD'
Hello, World;

    $name is awesome! \n

\t PHP is immortal;
EOD;
echo $text2;
*/
####################
## ASCII
/*
// Character to ASCII
// echo ord('A'),"\n";

// ASCII to Character
// echo chr(65);
*/

#####################
## Accessing Charater within String
/*
$name = 'Mazhar';
echo $name[0];

echo $name[-3];
*/

####################
## strlen()

// $text = "Hello, PHP";
// echo strlen($text);

###################
## strpos()

$text = "Hello World, How are you? Hello, hello";

// echo strpos($text, 'Hello');
// echo strpos($text, 'hello');
// echo strpos($text, 'a');
// echo strpos($text, 'Hello', 6);

// $findOffset = strpos($text, "Hello");
// // if($findOffset) {
// if($findOffset !== false) {
//     echo "Word was found\n";
// } else {
//     echo "Word was not found\n";
// }

################
## substr()

// $text = "Al-Insaf Foundation";
// echo substr($text, 3), "\n";
// echo substr($text, 3, 5), "\n";
// echo substr($text, -5), "\n";
// echo substr($text, -10, 5), "\n";
// echo substr($text, -10, -3);

## Find Username from email
// $email = "mazhartuhin78@gmail.com";

// $sepPos = strpos($email, '@');
// $userName = substr($email, 0, $sepPos);

// echo $userName;

## Format Phone Number
// $phone = "01865000000";

// $formattedPhone = substr($phone, 0, 3). '-'. substr($phone, 3, 4). '-'. substr($phone, 6);
// echo $formattedPhone;

#####################
## Reversing String

// $text = "Hello World";

// $length = strlen($text);

// for ($i = $length-1; $i >= 0 ; $i--) {
//     echo $text[$i];
// }
// echo PHP_EOL;

// echo strrev($text);

##############################
## Breaking String

// $string = "Apple, Banana, Grape, Mango,Orange, Pineapple";
// $strToArr = explode(', ', $string); 
// $strToArr = explode(', ', $string, 3); 
// print_r($strToArr);
// $arrayToStr = join(', ', $strToArr);
// echo $arrayToStr;

## str_split()

// $text = "Banana, Grape, Mango,Orange, Pineapple";

// print_r(str_split($string, 4));

## strtok()

// $text2 = strtok($text, " ,");

// while ($text2 !== false) {
//     echo $text2 . "\n";

//     $text2 = strtok(" ,");
// }

### preg_split()

// $text = "Banana, Grape, Mango,Orange, Pineapple";

// $textToArr = preg_split("/[\s,]+/", $text);
// print_r($textToArr);

#################################
## ‍ str_replace()

// $text = "JS is great. JS is powerful. JS is popular. JS is Immortal!";

// $result = str_replace("JS", "PHP", $text, $count);
// echo $result . "\n";
// echo "Replaced $count times\n";

// // URL parameter replacement
// $url = "https://example.com/page?id=123&type=old";
// $newUrl = str_replace("type=old", "type=new", $url);
// echo $newUrl;

// $text = "The quick brown fox jumps over the lazy dog";

// // Multiple search terms
// $search = ["quick", "brown", "lazy"];
// $replace = ["slow", "red", "active"];

// $result = str_replace($search, $replace, $text);
// echo $result;

// $text = "Ruby is great. Python is powerful. JS is popular. PHP is Immortal!";

// $result = str_replace(['Ruby', 'Python', 'JS'], "PHP", $text);
// echo $result;

###########################
### trim()

// $text = "   Hello World   ";
// $text = "    \t ............   Hello World ......   \n";

// echo trim($text, ". \n");
// echo trim($text, ". \n\t"); //

#####################
### wordwrap()

$text = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam soluta iure ullam quas, autem accusamus consequuntur hic quasi perspiciatis omnis!";

// echo wordwrap($text);
// echo wordwrap($text, 24);
// echo wordwrap($text, 24, "<br/>");


$text = "Lorem, ipsum dolor sit amet \n consectetur adipisicing elit. \n Aperiam soluta iure ullam quas, \n autem accusamus consequuntur hic\n quasi perspiciatis omnis!";

echo nl2br($text);