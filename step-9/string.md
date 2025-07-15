# PHP String and String Functions

## String

PHP তে string-কে সাধারণত দুইভাবে লেখা হয়।

- Single Quote এর মাধ্যমে `'something'`
- Double Quote এর মাধ্যমে `"something"`

### **Single Quote & Double Quote**

- Double Quote এ লিখলে কিছু বাড়তি সুবিধা থাকে। যেমন: string এর মধ্যে variable এর মান parse করা যায়, special character ব্যবহার করা যায়।

```php
$name = 'Mazhar';
echo "Name: $name. \n"; // Name: Mazhar
echo 'Name: $name. \n'; // Name: $name
```

- `\n` এটি একটি special character. এমন আরো কিছু Special Character বা Escape Sequence আছে (যেমন:`\n`, `\t` , `\\` ইত্যাদি) যেগুলো `''` এর মধ্যে কাজ করে না।
- variable এর মান ও `''` এর মধ্যে ইউজ করা যায় না।

### Heredoc & Nowdoc

PHP-তে string আরো দুইভাবে লেখা যায়। এই syntax এ multiple লাইনে string লেখা যায়। এমনকি `space`, `tab` সহ, যেভাবে input দেয়া হবে সেভাবেই return পাওয়া যাবে।

**Heredoc**

```php
$text = <<<EOD
Hello, World;

    $name is awesome! \n

\t PHP is immortal;
EOD;
echo $text;
```

- heredoc এ `variable`, `special character` support করে।

**Nowdoc**

```php
$text2 = <<<'EOD'
Hello, World;

    $name is awesome! \n

\t PHP is immortal;
EOD;
echo $text2;
```

- Syntax-এ পার্থক্য হচ্ছে `EOD` এর স্থানে `'EOD'` দিতে হবে।
- heredoc এবং nowdoc এর পার্থক্য অনেকটা `""` এবং `''` এর মতো। nowdoc syntax এ `variable`, `special character` এর মান parse হয় না।
- দুই ক্ষেত্রেই সতর্ক থাকা লাগবে, যাতে `EOD;` এর আগে কোনো space না থাকে।

## ASCII Code

ASCII বা American Standard Code for Information Interchange হলো একটি character encoding standard। এটি প্রতিটা character (সংখ্যা, অক্ষর, বিশেষ চিহ্ন) এর জন্য একটি unique সংখ্যা বা code নির্ধারণ করে।

ASCII-তে মোট 128টি character এর জন্য code রয়েছে।

ASCII কোড মূলত text processing, data validation, এবং character manipulation এর কাজে ব্যবহৃত হয়।

PHP-তে ASCII code থেকে character এবং character থেকে ASCII code এ রূপান্তরের জন্য দুইটা function রয়েছে।

### `ord()`

**Character থেকে ASCII code**

```php
$char = 'A';
$ascii = ord($char);
echo $ascii; // Output: 65
```

### `chr()`

**ASCII code থেকে Character**

```php
$ascii = 65;
$char = chr($ascii);
echo $char; // Output: A
```

## String Manipulation

### Accessing Characters within String

string এর character গুলোকে array-র element এর মতোই access করা যায়।

```php
$name = 'Mazhar';
echo $name[0]; // M

echo $name[-3]; //h
```

### `strlen()`

`strlen()` string-এর length নির্ণয় করার জন্য ব্যবহার হয়।

```php
$text = "Hello, PHP";
echo strlen($text); // 10
```

### `substr()`

string থেকে একটা নির্দিষ্ট অংশ বের করে আনার জন্য `substr()` ব্যবহৃত হয়।

`substr($string, start, length)` 

```php
$text = "Al-Insaf Foundation";

echo substr($text, 3); // Insaf Foundation
echo substr($text, 3, 5), "\n"; // Insaf
echo substr($text, -10, 5), "\n"; // Found
echo substr($text, -10, -3); // Foundat

## substr() use করে Phone number format করা

$phone = "01865000000";

$formattedPhone = substr($phone, 0, 3). '-'. substr($phone, 3, 4). '-'. substr($phone, 6);
echo $formattedPhone; // 018-6500-0000
```

`substr()` এবং `strpos()` ব্যবহার করে real life example:

```php
$email = "mazhartuhin78@gmail.com";

$sepPos = strpos($email, '@');
$userName = substr($email, 0, $sepPos);

echo $useName; // mazhartuhin78
```

## Reversing String

### `strrev()`

`strrev()` function ব্যবহার করে সহজেই string reverse করা যায়।

```php
$text = "Hello World";

echo strrev($text); // dlroW olleH
```

## Breaking String

### `explode()`

`explode()` একটা string কে কোনো চিহ্নের (Separator) মাধ্যমে ভেঙে টুকরো টুকরো করে আলাদা একটা array return করে। যেই array-র element গুলো হয় string এর অংশগুলো।

`explode('separator', string, limit)`

```php
$string = "Apple, Banana, Grape, Mango,Orange, Pineapple";
$strToArr = explode(', ', $string); 
print_r($strToArr);

// with limit
$strToArr = explode(', ', $string, 3); 
print_r($strToArr);

/*
Array
(
    [0] => Apple
    [1] => Banana
    [2] => Grape, Mango,Orange, Pineapple
)
*/
```

- যেহেতু `explode()` কেবল একটা separator এর উপর ভিত্তি করেই string কে আলাদা করে, তাই `Mango,Orange` এক অংশেই থাকবে। এটা সমস্যা।
- 3rd argument-এ limit এর মাধ্যমে কয়টা ভাগে আলাদা হবে সেটা বলে দেয়া যায়।

### `join()` or `implode()`

`join()` বা `implode()` একই কাজ করে। array-এর উপাদান গুলোকে জোড়া দিয়ে একটা string return করে। এটাও `explode()` এর মতো একটা `separator` এর উপর ভিত্তি করে জোড়া দেয়।

`join('separator', array)`

```php
$arrayToStr = join(', ', $strToArr);
echo $arrayToStr; // Apple, Banana, Grape, Mango,Orange, Pineapple
```

### `str_split()`

`str_split()` string-কে character বা substring-আকারে ভাগ করে array হিসাবে return করে। 

`str_split(string, length)` length না বলে দিলে 1 টা character করে ভাগ করবে। কয়টা character করে ভাগ হবে সেটা বলে দেয়া যায়।

```php
$string = "Banana, Grape, Mango,Orange, Pineapple";
print_r(str_split($string)); // array তৈরি হবে প্রতিটা character কে element করে

print_r(str_split($string, 4));
/*
Array
(
    [0] => Bana
    [1] => na, 
    [2] => Grap
    .................
    এভাবে চলবে
 */
```

### `strtok()`

`strtok()` নির্দিষ্ট delimiter অনুযায়ী string-কে টোকেন বা অংশে ভাগ করে। multiple delimiter অনুযায়ী ভাগ করা যায়।

`strtok($string, delimiter)` 

```php
$text = "Banana, Grape, Mango,Orange, Pineapple";

$text2 = strtok($text, " ,");
while ($text2 !== false) {
    echo $text2 . "\n";
    $text2 = strtok(" ,");
}
```

- কেবল প্রথমবার iteration এর সময় `$text` কে string এবং `" ,"` দুইটা চিহ্ন (`space` & `,`) delimiter হিসেবে নিয়েছে।
- `Banana` অংশ ভাগ হওয়ার পর 2nd Iteration এ কেবল `$text2 = strtok(" ,")` এর মাধ্যমে কেবল delimiter গুলো পাঠালে হবে। সেই অনুযায়ী আরেকটা token বা অংশ বের করে আনবে `Grape`।
- এভাবে প্রতিটা iteration বা loop ঘুরে একটা করে অংশ বা token বের করে নিয়ে আসবে।
- অর্থাৎ, প্রতিবার `strtok()` কল করার মাধ্যমে ১টা token বা অংশ বের করে আনে।

### `preg_split()`

`preg_split()` function দিয়ে Regular Expression ব্যবহার করে string-কে ভেঙে array-তে রূপান্তর করা যায়। Regular Expression ব্যবহার করে multiple delimiter দেয়া যায়, যেগুলোর ভিত্তি string ভাঙবে।

```php
$text = "Banana, Grape, Mango,Orange, Pineapple";

$textToArr = preg_split("/[\s,]+/", $text);
print_r($textToArr);

/*
Array
(
    [0] => Banana
    [1] => Grape
    [2] => Mango
    [3] => Orange
    [4] => Pineapple
)
*/
```

- `//` এর মধ্যে delimiter গুলো দিতে হবে। `\s` মানে space। একাধিক delimiter দিবো তাই `[]` এর মধ্যে লেখা হয়েছে। `+` ব্যবহার করা হয়েছে, `[]` এর মধ্যে delimiter গুলো এক বা একাধিক বার। `[\s,]+` এর মানে space এবং `,` এক বা একাধিক বার থাকলে সেটার ভিত্তিতে string কে ভাঙবে।

## Searching String

### `strpos()`

`strpos()` কোনো string এর মধ্যে অন্য কোনো text (character বা word) কোন position-এ আছে, তা খুঁজে বের করে। বিস্তারিত নিচে আছে:

`strpos(string, 'কি খুজবে তা’, কোন offset থেকে খুঁজবে)`

```php
$text = "Hello World, How are you? Hello, hello";

echo strpos($text, 'Hello'); // 0
echo strpos($text, 'hello'); // 33
echo strpos($text, 'a'); // 17
echo strpos($text, 'Hello', 6); // 26
```

- `echo` 1, 2, 3 number খেয়ার করলে দেখা যাবে, `strpos()` function শুরু থেকে খোঁজা আরম্ভ করে, এবং প্রথমে  text টা খুঁজে পাবে কেবল সেটার offset return করবে।
- case sensitive ভাবে খুঁজে। `H` এবং `h` একই নয়।
- 3rd argument এ কোন offset থেকে খোঁজা আরম্ভ করবে তা বলে দেয়া যায়।

**খেয়াল করার বিষয়:** 

```php
$text = "Hello World, How are you? Hello, hello";

$findOffset = strpos($text, "Hello");
if($findOffset) {
    echo "Word was found\n";
} else {
    echo "Word was not found\n";
}
// Word was not found
```

- এখানে `Hello` word টা আছে, কিন্তু output এ `false` return করছে। এর কারণ হচ্ছে, `Hello` এর offset পাওয়া গেছে `0` । PHP তে `0` কে `false` এর equivalent হিসেবে দেখা হয়। দুইটাতেই `false` return করবে। এই সমস্যার সমাধানে type সহ check করতে হবে।

```php
if($findOffset !== false) {
    echo "Word was found\n";
} else {
    echo "Word was not found\n";
}
// Word was found
```

### `strrpos()`

`strpos()` এর reverse function। `strrpos()` শেষে থেকে খোঁজা আরম্ভ করবে, শেষ থেকে যে text টা পাবে সেটার offset return করবে।

### `stripos()`

উপরে দেখেছি, `strpos()` case-sensitive search করে। case insensitive search করতে চাইলে `stripos()` function রয়েছে।

### `strripos()`

`stripos()` function এর মতো case insensitive ভাবে search করবে। তবে, reverse অর্থাৎ শেষ থেকে।

### `str_replace()`

string এর মধ্যে কোনো text কে খুঁজে বের করে অন্য কোনো text দিয়ে replace করার জন্য এই function-টা ব্যবহার করা হয়।

`str_replace('যা খুঁজতে হবে’, ‘যা দিয়ে replace হবে', যে string এ search-replace হবে, count)` এখানে 4th argument (`count` ) optional. কতবার replace হয়েছে সেটা count করার জন্য এই argument pass করতে হয়।

```php
$text = "JS is great. JS is powerful. JS is popular. JS is Immortal!";

$result = str_replace("JS", "PHP", $text, $count);
echo $result . "\n"; // PHP is great. PHP is powerful. PHP is popular. PHP is Immortal!
echo "Replaced $count times\n"; // Replaced 4 times

// URL parameter replacement
$url = "https://example.com/page?id=123&type=old";
$newUrl = str_replace("type=old", "type=new", $url);
echo $newUrl; // https://example.com/page?id=123&type=new
```

- মনে রাখতে হবে, `str_replace()``case sensitive search করে।
- `str_replace` মূল string কে modify করে না। তবে, মূল string কে modify করতে চাইলে return করা মান same variable এ store করতে পারি।

**Multiple search and replace: `str_replace()`** মাধ্যমে array আকারে multiple text search করে replace করা যায়।

```php
## search multiple, replace by one
$text = "Ruby is great. Python is powerful. JS is popular. PHP is Immortal!";

$result = str_replace(['Ruby', 'Python', 'JS'], "PHP", $text);
echo $result . "\n"; // PHP is great. PHP is powerful. PHP is popular. PHP is Immortal!

## multiple search and replace
$search = ["quick", "brown", "lazy"];
$replace = ["slow", "red", "active"];

$result = str_replace($search, $replace, $text);
echo $result; // The slow red fox jumps over the active dog
```

### `str_ireplace()`

case insensitive search and replace এর জন্য।

## আরো কিছু ফাংশন

### `trim()`

`trim()` string এর শুরু এবং শেষ থেকে whitespace, tab, new tab বা নির্দিষ্ট character গুলো remove করে দেয়।

`trim(string, characters)` 2nd parameter টা optional। 2nd parameter এ কোনো argument pass না করলে শুরু এবং শেষ থেকে অবাঞ্চিত সবকিছুই remove করবে। আর নির্দিষ্ট করে character গুলো বলে দেয়া হলে, সেই অনুযায়ী remove করবে।

```php
$text = " \t   ............   Hello World ......   \n";

echo trim($text); // ............   Hello World ......
echo trim($text, ". \n"); // 	 ............   Hello World
echo trim($text, ". \n\t"); // Hello World
```

- `trim()` দুইপাশ থেকেই remove করে। 1st Output এ দুইপাশ থেকেই space, tab, new line কে remove করেছে।
- 2nd Output এ দেখা যাচ্ছে, arguments হিসেবে `. \n` অর্থাৎ `.`, `whitespace`, `new line \n` দেয়া হয়েছে। তাই শুরু থেকে check করে `space` পেয়েছে সেটা remove করেছে, এরপর `\t` বা tab পেয়েছে, যেহেতু এটা remove করতে বলা হয় নি তাই এটা remove করে নি। এমনকি আর ভিতরেও ঢুকে নি। তাই বাকি `space` এবং `.` remove হয় নি।
- অন্যদিকে শেষ থেকে `\n`, `space`, `.` সবগুলোই remove করে দিয়েছে।
- শেষ বার `trim()` কল করার সময় `. \n\t` দেয়ায় দুই পাশের সবগুলোই remove হয়েছে।

### `ltrim()`

কেবল শুরু বা বাম পাশ থেকে remove করবে।

### `rtrim()`

কেবল শেষ থেকে বা ডান পাশ থেকে remove করবে।

### `wordwrap()`

`wordwrap()` বড় text কে নির্দিষ্ট দৈর্ঘ্য পরপর নতুন লাইনে ভেঙে ফেলে।

```php
$text = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam soluta iure ullam quas, autem accusamus consequuntur hic quasi perspiciatis omnis!";

echo wordwrap($text);
```

- default: 75 character পরপর ভাঙবে।

```php
$text = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam soluta iure ullam quas, autem accusamus consequuntur hic quasi perspiciatis omnis!";

echo wordwrap($text, 24, "<br>", true);
```

- 2nd Parameter এ `24` দেয়ায়, 24 character পরপর নতুন লাইন তৈরি হবে।
- 3rd Parameter এ নতুন line break হিসেবে কি ইউজ হবে সেটা বলে দেয়া যাবে। default থাকে `\n` বা new line character। এর পরিবর্তে আমরা html এর `<br>` tag ব্যবহার করেছি।
- default ভাবে যদি আমাদের বলে দেয়া character length যদি কোনো word এর মাঝখানে পড়ে যায়, তাহলে word টা না ভেঙে, এর আগে ভাঙবে। তবে, 4th parameter এ `true` pass করলে word থাকলেও সেটার মাঝেই ভেঙে নতুন লাইন তৈরি করা হবে।

### `nl2br()`

`nl2br()` function নতুন লাইন (newline `\n`) কে HTML `<br>` tag এ convert করে।

```php
$text = "Lorem, ipsum dolor sit amet \n consectetur adipisicing elit. \n Aperiam soluta iure ullam quas, \n autem accusamus consequuntur hic\n quasi perspiciatis omnis!";

echo $text;
```

- উপরের output-টা যদি browser এ দেখি, তাহলে দেখবো text টা ভাঙে নি। এর কারণ হচ্ছে, `\n` কে browser line break হিসেবে treat করে না। যার কারণে এটা special character হিসেবে থেকে যায় কিন্তু নতুন লাইন তৈরি হয় না।
- browser এ নতুন লাইন তৈরি করার জন্য HTML tag `<br>` এর প্রয়োজন।

তাই, `\n` কে `<br>` এ convert করার জন্য `nl2br()` প্রয়োজন। বিশেষ করে, `textarea` থেকে যে input আসবে যেগুলো line break গুলো `\n` দিয়েই আসবে। সেগুলো output এ দেখানোর জন্য এই function-টা প্রয়োজন।

```php

$text = "Lorem, ipsum dolor sit amet \n consectetur adipisicing elit. \n Aperiam soluta iure ullam quas, \n autem accusamus consequuntur hic\n quasi perspiciatis omnis!";

echo nl2br($text);
```