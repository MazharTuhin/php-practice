# 6. PHP Array

অনেকগুলো ডাটা যখন একটা collection এ রাখা যায়, সেটা হচ্ছে array. array তে বিভিন্ন type এর ডাটা রাখা যায়।

3 ধরনের array দেখা যায়:

1. Indexed array
2. Associative array
3. Multidimensional array

## Indexed array

Indexed array তে প্রতিটি element এর value কে number দিয়ে access করা যায়। array তে এই numbering বা index শুরু হয় `0` থেকে।

```php
$person = array(
	"Mazhar",
	28,
	"Cumilla",
);

// অথবা
$person = ["Mazhar", 28, "Cumilla"];
```

- array লিখার 2টা syntax রয়েছে।
- সরাসরি array কে `echo` করা যায় না। `var_dump($person)` বা `print_r($person)` দিয়ে দেখা যাবে।
- array’র প্রতিটা element এর access পেতে হলে `$person[0]` এভাবে index ধরে call করতে হবে।

```php
$person = ["Mazhar", 28, "Cumilla" ];

echo "Name: $person[0], Age: $person[1], District: $person[2]";
// Name: Mazhar, Age: 28, District: Cumilla
```

- array তে কয়টা element আছে, সেটা দেখার জন্য `count()` function ব্যবহার করা হয়।

```php
// loop চালিয়ে সবগুলো element print করা
$n = count($person);

for($i = 0; $i < $n; $i++) {
    echo $person[$i] . "\n";
}

// foreach loop ্এর মাধ্যমে
foreach($person as $each) {
	echo $each . "\n";
}
```

### Manipulation (Indexed array)

**Change Data**

array এর নির্দিষ্ট কোনো data change করতে চাইলে `$array[indexNumber]`

```php
$fruits = ["Apple", "Banana", "Jackfruit", "Guava"];

print_r($fruits); // Apple Banana Jackfruit Guava
$fruits[2] = "Mango";
print_r($fruits); // Apple Mango Jackfruit Guava
```

**array_pop()**

array হতে শেষ element টা remove করে `return` করে।

```php
$fruits = ["Apple", "Banana", "Jackfruit", "Guava"];

$removedData = array_pop($fruits);
print_r($fruits); // শেষের element (Guava) remove হয়ে return হবে
echo $removedData; // Guava | যেহেতু return হয় তা্ই $removeData তে store হয়েছে
```

**array_push()**

array এর শেষে element যুক্ত করে।

```php
$fruits = ["Apple", "Banana", "Jackfruit", "Guava"];

array_push($fruits, "Mango"); 
// Multiple ্এমনকি array ্াআকারেও add করা যায়
array_push($fruits, "Mango", "Orange", ["Date", "Lemon"]);
print_r ($fruits); 
```

**array_shift()**

array’র শুরু থেকে ১টা element remove করে `return` করে।

```php
$fruits = ["Apple", "Banana", "Jackfruit", "Guava"];

$removedData = array_shift($fruits);
print_r($fruits); // প্রথম element (Apple) remove হয়ে return হবে
echo $removedData; // Apple | যেহেতু return তা্ই $removeData তে store হয়েছে
```

**array_unshift()**

array’র শুরুতে element যুক্ত করে।

```php
$fruits = ["Apple", "Banana", "Jackfruit", "Guava"];

array_push($fruits, "Mango"); 
// Multiple ্এমনকি array ্াআকারেও add করা যায়
array_push($fruits, "Mango", "Orange", ["Date", "Lemon"]);
print_r ($fruits); 
```

## Associative Array

associative array তে প্রতিটি value এর জন্য একটি key define করা থাকে।

```php
$person = [
	"name" => "Mazhar",
	"age" => 28,
	"district" => "Cumilla"
];
```

- কোনো value এর access পেতে হলে `$person['name']` এভাবে পেতে পারি।

```php
$foods = [
    'vagetables' => 'brinjal, brocolli, carrot, capsicum',
    'fruits' => 'apple, orange, banana',
    'drinks' => 'water, milk'
];

echo $foods['fruits'] . "\n";

foreach ($foods as $key => $value) {
    echo $key . ": " . $value . "\n";
}
```

- `foreach()` লুপের মাধ্যমে সহজেই associative array তে loop চালানো যায়।

এই কাজটা অন্যান্য লুপ দিয়েও করা যায়। তবে দুইটা array function সম্পর্কে জানতে হবে। 

`array_keys()` array এর key গুলো array আকারে return করে।

`array_values()` array এর value গুলো array আকারে return করে।

```php
$foods = [
    'vagetables' => 'brinjal, brocolli, carrot, capsicum',
    'fruits' => 'apple, orange, banana',
    'drinks' => 'water, milk'
];

$keys = array_keys($foods);
$values = array_values($foods);
$count = count($foods);

for($i = 0; $i < $count; $i++) {
    $key = $keys[$i];
    $value = $values[$i];

    echo $key . ": " . $value . "\n";
}
```

- associative array তে `foreach()` লুপ চালানো বেটার।
- যদিও value গুলো string এ আছে। নতুন ডাটা যদি যুক্ত করতে চাই:

```php
// $foods['drinks'] = $foods['drinks'] . ", juice";
$foods['drinks'] .= ", juice";

print_r($foods);
```

### **String to Array and Array to String Operation**

**String to Array**

```php
$fruits = "Apple, Banana, Mango, Jackfruit, Guava, Dates";
```

`$fruits` মধ্যে যে ডাটা গুলো আছে সেগুলো string আকারে আছে। যদি বলা হয় কয়টা fruits আছে সেটা string আকারে বের করা যাবে না। 

এই string data গুলোকে array তে convert করার জন্য `explode()` function ব্যবহার করা হয়।

```php
$fruitsArray = explode(', ', $fruits);

print_r($fruitsArray);
echo count($fruitsArray)
```

- `explode()` function এর 1st argument এ কিসের ভিত্তিতে string গুলো আলাদা হবে সেই separator দিতে হবে।

সমস্যা হচ্ছে, যদি string এর সব জায়গায় separator একই না থাকে। যেমন:

```php
$fruits = "Apple, Banana, Mango,Jackfruit, Guava,Dates";
```

তাহলে `preg_split()` function ব্যবহার করা লাগবে। যেখানে multiple separator, argument আকারে পাঠানো যায়।;

```php
$fruitsArray = preg_split('/, |,/', $fruits);
```

**Array to String**

array কে string এ convert করার জন্য `join()` function ব্যবহার করা যাবে।

```php
$drinks = [
	'drinks',
	'milk',
	'juice'
];

$drinksStr = join(', ', $drinks);
echo $drinksStr;
```

## Multidimensional Array or Nested Array

একটা array’র মধ্যে এক বা একাধিক array থাকে।

```php
$foods = [
    'vagetables' => [
        'brinjal',
        'brocolli',
        'carrot',
        'capsicum'
    ],
    'fruits' => [
        'apple',
        'orange',
        'banana'
    ],
    'drinks' => [
        'water',
        'milk',
        ['orange juice', 'pineapple juice']
    ]
];
```

- এই array থেকে যদি `pineapple juice` data টা access করতে চাই: `echo $foods['drinks'][2][1];`

### Associative array to String conversion

associative array কে সরাসরি database বা অন্য কোথাও store করে রাখা যায় না। store করতে হলে আগে string এ convert করতে হবে।

string এ 2 ভাগে convert করা যায়।

1. serialize 
2. JSON

**#### Serialize**

এটা PHP এর নিজস্ব format। অন্য কোনো language এই format এর data বুঝবে না।

```php
$person = [
    "fName" => "Safwan",
    "lName" => "Mubin",
    "age" => 11,
    "class" => 5,
    "section" => "A"
];

$serializedData = serialize($person);
echo $serializedData;

## print_r (unserialize($serializedData));
```

- serialized data কে যদি আবার array তে convert করা লাগে তাহলে, `unserialize()` function ব্যবহার করতে হবে।

#### **JSON**

JavaScript Object Notation (JSON) format এ convert করা বেশি সুবিধাজনক। কারণ, JS সরাসরি এই format read করতে পারে।

```php
$person = [
    "fName" => "Safwan",
    "lName" => "Mubin",
    "age" => 11,
    "class" => 5,
    "section" => "A"
];

$jsonData = json_encode($person);
echo $jsonData;

## print_r (json_decode($jsonData));
```

- JSON data কে যদি আবার array তে convert করা লাগে তাহলে, `unserialize()` function ব্যবহার করতে হবে।