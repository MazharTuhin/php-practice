# PHP Function Basic

## Function

Function হচ্ছে code reuse করার একটা system. function এর মধ্যে রাখা কোডগুলো আমরা বারবার ইউজ করতে পারবো, কেবল function কে call করেই। 

*Function আরো একটা কাজ করে, সেটা হচ্ছে `encapsulation` । encapsulation হচ্ছে কঠিন কোনো logic বা কাজ কে কোনো কিছুর মধ্যে hide বা লুকিয়ে রাখা।* 

*যেমন, function এর মধ্যে একজন programmer কিছু কোড লিখে রাখে, যার কারণে call করলে কাজ করে। কিন্তু যারা function টা ব্যবহার করবে, সবসময় function এর মধ্যে কি আছে সেটা জানার প্রয়োজন হয় না। এই যে code গুলো একটা function এর মধ্যে রাখা হলো, এবং call করার সময় code দেখার প্রয়োজন পরছে না বা দেখা যাচ্ছে না, এটাই encapsulation.*

**PHP তে দুই ধরনের function রয়েছে।**

1. Built-in Functions (যে ফাংশনগুলো PHP তে Pre-define করা আছে, যেগুলো কেবল কল করেই ইউজ করা যাবে সেগুলোই built-in function. যেমন: `array()`, `date()` , `file()` , `strlen()`, `var_dump()`
2. User-define Function (User যে সকল function create করে সেগুলো)

### User define Function নিয়ে আলোচনা

কোনো number জোড় বা বিজোড় সেটা নির্ণয় করার জন্য একটা ফাংশন লিখি

```
function isEvenOrOdd($num) {
    if ($num % 2 == 0) {
        return "$num is an even number.";
    }
    return "$num is an odd number.";
}

echo isEvenOrOdd(5);
```

- `function` keyword দিয়ে function লিখতে হয়।
- function এর নাম number দিয়ে শুরু করা যাবে না। `camelCase` এ লেখা standard।
- `isEvenOrOdd($num)` এর মধ্যে `$num` একটি `parameter`। parameter অনেকটা variable এর মতো কাজ করে। যার value, function টিকে যখন call করা হবে, তবে `argument` আকারে দিতে হবে।
- সুতরাং function তৈরি করার সময় `isEvenOrOdd($num)` এর `$num` একটি parameter। এবং function call করার সময় `isEvenOrOdd(5)` এর `5` হচ্ছে `argument`।
- একটা function এ যত ইচ্ছা `parameter` নেওয়া যায়। তবে, মনে রাখতে হবে, `parameter` অনুযায়ী function call করার সময় সেই `parameter` গুলোর `argument` ও দিতে হবে। নাহয় `error` আসবে।

**দুইটা সংখ্যা যোগ করার জন্য একটা ফাংশন তৈরি করি যেখানে একাধিক parameter নিয়ে কাজ করা হবে।**

```php
function sum($num1, $num2) {
	$sum = $num1 + $num2;
	return "Sum of $num1 and $num2 is: $sum. \n";
}

echo sum(5, 2);
```

### return statement

- কোনো function থেকে মান বাইরে পাঠানোর জন্য return ব্যবহার করা হয়।
- return করলে function এর পরবর্তী অংশ আর কাজ করবে না।

### **Default value of Parameter**

বাস্তব একটা উদাহরণ দেখি

```php
function checkLogin($username, $isAdmin = false) {
    if ($isAdmin) {
        echo "$username (Admin) logged in";
    } else {
        echo "$username logged in";
    }
}

checkLogin("user123");          // user123 logged in
checkLogin("admin1", true);     // admin1 (Admin) logged in
```

- এই কোডে ২য় parameter এ default value সেট করে দেয়া হয়েছে। যার কারণে `checkLogin("user123")` এ মাত্র একটা argument pass করালেও কোড কাজ করছে।
- `user123` ১ম parameter এর argument হিসাবে পাস হবে এবং default value হিসেবে `$isAdmin` এর parameter, `false` pass হবে।
- তবে function কল করার সময় argument হিসেবে যে value দেয়া হবে, সেটাই নতুন value হিসেবে কাজ করবে। উপরের কোডে ২য় বার call করার সময় যেটা করা হয়েছে।

**গুরুত্বপূর্ণ আলাপ:** প্রথম parameter এ default value সেট করলে পরের গুলোতেও default value সেট করা লাগবে। পরের parameter গুলোতে default value সেট না করে শুধু first parameter এ set করা যাবে না, error আসবে। 

### Function return type

function এর argument এ কোন type এর value দেয়া যাবে, সেটা নির্ধারণ করে দেয়া যায়।

```php
function sum(int $num1, int $num2) {
	return $num1 + $num2;
}

echo sum(2, 3); // 5
echo sum("a", 3); // Fetal error
```

- `int` ছাড়াও আরো আছে `float`, `bool`, `string`, `array`

তাছাড়া, কোনো function কোন type এর value return করবে, সেটাও declare করে দেয়া যায়।

```php
function add(int $a, int $b): int {
    return $a + $b;
}

function getName(): string {
    return "John Doe";
}
```

একাধিক type ও declare করে দেয়া যায়।

```php
function getValue(): int|string {
    return rand(0,1) ? "hello" : 42;
}

echo getValue();
```

### Accepting Unlimited Arguments

```php
function sum(int ...$numbers): int {
	$result = 0;
	foreach($numbers as $number) {
		$result += $number;
	}
	return $result;
}

echo sum(1,2,3,4,5,6,7,8,9,10); // 55
```

- `...$numbers` মূলত একটা `array`। `...` এর যেকোনো নাম দেয়া যাবে।
- function call করার সময় যত ইচ্ছা argument দেয়া যাবে। argument হিসেবে আসা সবগুলো value  `$numbers` array এর element হিসেবে যুক্ত হবে।
- চাইলে `...$numbers` এর আগে অন্যান্য `parameter` দেয়া যাবে।

```php
function sum(int $x, int $y, int ...$numbers): int {
	$result = 0;
	foreach($numbers as $number) {
		$result += $number;
	}
	return $result;
}

echo sum(1,2,3,4,5,6,7,8,9,10); // 52
```

- output `55` এসেছে। কারণ, প্রথম দুইটা argument `$x`, `$y` parameter এ pass হবে। আর এর পরের গুলো `$numbers` array তে যাবে। আর যেহেতু function এ কেবল array এর element গুলোর sum করা হয়েছে, তাই `52` return করেছে।
- মনে রাখতে হবে, `...` এর আগে অন্যান্য parameter রাখা যাবে, কিন্তু পরে রাখা যাবে না। `...` থেকে পরে যত argument থাকবে সবগুলো array তে যুক্ত হবে।


### Variable Scope

একটা variable এর মান কোথায় কোথায় valid বা কাজ করবে, সেটাই হচ্ছে variable scope.

PHP তে কয়েক ধরণের scope আছে। যেমন: `local`, `global`, `super global`, `static`

```php
$name = "Mazhar"; // Global Scope

function person() { // Local Scope
	$age = 28;
	echo "Name: {$name}. Age: {$age}";
}

person(); // error: Undefined variable $name
echo $age; // error: Undefined variable $age
```

- এই কোডের মধ্যে দুইটা scope এ আলাদা দুইটা variable নিয়ে function এর ভিতরে এবং বাইরে use করা হয়েছে।
- `$name` Global scope এ থাকায়, এটা function এর মধ্যে বা local scope এ কাজ করছে না, তাই error আসবে।
- `$age` local scope এ declare করায় সেটা function এর বাইরে `echo $age` করলে undefined variable error show করবে।

সমাধান কি?

```php
$name = "Mazhar"; // Global Scope

function person() { // Local Scope
	global $name, $age;
	$age = 28;
	echo "Name: {$name}. Age: {$age}";
}

person(); // Name: Mazhar. Age: 28
echo $age; // 28
```

- `global` keyword ইউজ করার কারণে variable গুলো ভিন্ন ভিন্ন scope এ accessible হয়েছে।
- `$GLOBALS['variableName']` এভাবে super global এ পরিণত করা যায়। যা সবসময় available থাকবে।
- PHP-তে Super Global Variable গুলি বিশেষ pre-defined ভেরিয়েবল যা স্ক্রিপ্টের যেকোনো স্থান থেকে অ্যাক্সেস করা যায়। যেমন: `$_SERVER['SERVER_NAME']` , `$_POST['username']`

**Static Scope**

local variable কে static হিসেবে declare করলে এর মান function এর execution থেকে গেলেও এর মান অপরিবর্তিত থাকে।

```php
function counter() {
    static $count = 0; // শুধুমাত্র প্রথমবার ইনিশিয়ালাইজ হয়
    $count++;
    echo $count;
}

counter(); // 1
counter(); // 2
counter(); // 3
```

- `$count` কে static করায়, এর মান `0` কেবল প্রথম বারের মতো ছিলো। `$count++` এর জন্য মান হয়েছে `1`। যার কারণে, প্রথম বার function কল করায় output `1` দেখাচ্ছে।
- ২য় বার কল করলে output দেখাচ্ছে `2`। কারণ, ১ম execution এ `$count` এর মান হয়েছে `1`। যেটা `static` করার কারণে অপরিবর্তিত রয়ে গেছে। তাই, পরের বার কল করার সময় `$count` এর initial value হবে আগের execution এর শেষে যে মান ছিলো সেটা, অর্থাৎ `1`
- variable টিকে এই function এর বাইরে থেকে access করা যাবে না।


***REMARK: একটা function কে কেবল একটা কাজের জন্যই লেখা উচিৎ। এটা good coding practice***

