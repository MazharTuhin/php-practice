# 4. PHP Loop (for, while, do…while, foreach), break, continue

কোনো condition এর উপর ভিত্তি করে নির্দিষ্ট কোড ব্লককে বার বার execute করার জন্য `loop` ব্যবহার করা হয়।

PHP তে চার ধরনের `loop` রয়েছে।

1. for loop
2. while loop
3. do…while loop
4. foreach loop

## `for loop`

কোনো condition এর উপর ভিত্তি করে নির্দিষ্ট সংখ্যক বার code block execute করার জন্য for loop ব্যবহার করা হয়।

***Structure***

```php
for (initializaiton; condition; increment/decrement) {
	// code block
}
```

***Example:***

```php
$number = 2;

for($i = 1; $i <= 20; $i++) {
  $result = $number * $i;
	echo $number . " * " . $i . " = " . $result . "<br>";
}

// 2 ্এর নামতা print হবে
```

- ১ম iteration বা ঘূর্ণনে, `$i` এর initial value 1 ধরা হয়েছে, এটা কেবল প্রথম বারই ব্যবহার হবে। এরপর `$i <= 20` condition check করবে, `true` হলে code block execute হবে। এরপর `$i++` check করবে এবং `$i` এর মান এক বাড়িয়ে দিবে অর্থাৎ, `$i = 2`
- ২য় iteration এ,  `$i = 2`। এরপর `$i <= 20` condition check করবে, `true` হলে code block execute হবে। এভাবেই iteration চলতে থাকবে, যতক্ষণ না `$i <= 20` condition টা false না হবে।
- condition `false` হলেই কেবল loop terminate হবে, না হয় infinity loop এ পরিণত হবে অর্থাৎ চলতেই থাকবে!!

***A Real Life Example:*** একজন শিক্ষক ৫০ টি খাতা চেক করবেন। অর্থাৎ, উনি খাতা ৫০ বার দেখা লাগবে। খাতা দেখার বিষয়টা যদি for loop দিয়ে করি:

```php
$total_paper = 50;

for($current_paper = 1; $total_paper <= 50; $current_paper++) {
	echo "Exam paper has been checked:" . $current_paper . "<br>";
}
echo "All paper has been checked";
```

**1-10 পর্যন্ত সংখ্যাগুলোর যোগফল**

```php
$sum = 0;
for ($i = 1; $i <=10; $i++) {
	$sum += $i;
}
echo $sum;
```

**তারার প্যাটার্ন তৈরি: (nested for loop)**

```php
$rows = 8;
for ($i = 1; $i <= $rows; $i++) {
	for ($j = 1; $j <= $i; $j++) {
		echo "*";
	}
	echo "<br>";
}

//
*
**
***
****
*****
******
*******
********
```

***for loop আমরা তখন ইউজ করবো, যখন আমাদের জানা থাকবে কতবার loop টা ঘুরবে!***

## `while loop`

condition যতক্ষণ true থাকবে ততক্ষণ while loop চলতে থাকবে।

***Structure:***

```php
while(condition) {
	// code block
}
```

***Example:***

```php
$i = 1;

while ($i <= 10) {
	echo $i . "<br>";
	$i++;
}

// 1-10 পর্যন্ত print হবে
```

- `$i` এর মান `1` । `$i <= 10` condition চেক করবে। `true` হলে ভিতরের code block execute হবে।
- code block এর মধ্যে `$i++` এর মাধ্যমে `$i` এর মান `2` হবে। এরপর আবার condition check করবে `true` হলে code block execute হবে।
- `$i++` ছাড়া এটি `infinity loop` এ রূপান্তরিত হবে!!

***Real-Life Example:***

```php
$password = "12345";

$userInput = "";

while ($userInput !== $password) {
	$result = readline("Enter your correct password");
}
```

- যতক্ষণ user, সঠিক password না দিবে ততক্ষণ এই loop চলবে।

***while loop আমরা তখন ব্যবহার করবো, যখন আমরা জানি না কতবার loop ঘুরবে।***

---

## `do...while`

`do...while` লুপ `while` loop এর মতো। কিন্তু `do...while` loop এ condition যাই দেয়া থাকুক আগে code block execute হয়ে যাবে। একবার code execute হওয়ার পর এর পর condition চেক করা হবে। তারপর `while` লুপের মতো condition `true` থাকা পর্যন্ত iteration চলতে থাকবে।

***Structure:***

```php
do {
    // Code to be executed
} while (condition);
```

***Example:***

```php
$i = 1;

do {
    echo $i . "<br>";
    $i++;
} while ($i <= 10);

// 1-10 পর্যন্ত print হবে।
```

- `while` এবং `do...while` লুপের মধ্যে মূল পার্থক্য হচ্ছে condition যদি `false` হয়, তবে `while` লুপের মধ্যে থাকা code execute হবে না। কিন্তু condition `false` হলেও `do...while` loop এর code block অন্তত একবার execute হবে।

***Real-life example:***

ইউজার সর্বোচ্চ 3 বার login attempt করতে পারবে। এজন্য নিচের লুপ লেখা।

```php
$attempt = 1;
	
do {
	echo "Login Attempt {$attempt} of 3\n";
	$attempt++;
} while ($attempt <= 3);
```

---

## `foreach`

foreach লুপ বিশেষভাবে ডিজাইন করা হয়েছে array এবং object এর element গুলোর মধ্যে iterate করার জন্য। এটি array এর প্রতিটি element এ একবার করে loop চালায়।

***Structure:***

```php
foreach ($array as $value) {
    // Access each element using $value
}

//key and value তে access পাওয়ার জন্য
foreach ($array as $key => $value) {
    // Access the element's key using $key and its value using $value
}
```

***Example:***

```php
$fruits = ["Apple", "Mango", "Banana", "Orange", "Guava"];

foreach($fruits as $fruit) {
	echo $fruit . "<br>";
}

// foreach loop on associative array
$person = [
	"name" => "Mazhar",
	"age" => "28",
	"ID" => true
];

foreach ($person as $key => $value) {
	echo $key . ": " . $value . "<br>";
}
```

## Loop Control Statements

loop এর flow করার করার জন্য দুইটা structure বেশি ব্যবহার করা হয়।

1. `break`
2. `continue`

### break

break statement এর মাধ্যমে current loop বন্ধ হয়ে যায়। 

```php
for ($i = 1; $i <= 10; $i++) {
	if ($i == 6) {
		break;
	}
	echo $i;
}
```

- এখানে loop এর মধ্যে `if` এর মাধ্যমে একটা condition দেয়া আছে, যদি `$i` এর মান `6` হয় তাহলে `break` করো, অর্থাৎ loop বন্ধ করে দাও। তাই, iteration চলাকালীন যখন দেখা যাবে `$i` এর value `6` হয়েছে সাথে সাথে লুপ বন্ধ করে দেয়া হবে। `6` print হবে না।

### continue

`continue` statement এর মাধ্যমে condition true হলে চলমান iteration skip করে next iteration এ চলে যাবে।

```php
for ($i = 1; $i <= 10; $i++) {
	if ($i == 6) {
		continue;
	}
	echo $i;
}
```

- যখন `$i` এর value `6` হবে সেই iteration skip করা হবে। এখানে সেই loop বা iteration এ `echo $i` এর মাধ্যমে `6` print হওয়ার কথা কিন্তু `continue` থাকার কারণে `6` print  করবে না। বরং `6` কে skip করে পরবর্তী `7 8 9 10` print হবে।
- অর্থাৎ যেই ঘূর্ণনে `continue` থাকবে সেই ঘুর্ণনে code block execute  হবে না।