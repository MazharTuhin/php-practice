# PHP Array Funcitons

### `unset()`

Associative Array থেকে কোনো data remove করতে ব্যবহার হয়। এই function দিয়ে Indexed Array থেকেও data remove করা যায়।

```php
$person = [
    'name' => 'Safwan', 
    'age' => 11,
    'class' => 'Five',
];
unset($person['class']); // 'class' => 'Five' removed

##################

$fruits = ['Apple', 'Orange', 'Guava'];
unset($fruits[0]); // 'Apple' removed
```

### `isset()`, `empty()`, `is_numeric()`

যদিও এগুলো কেবল array’এর সাথে সম্পর্কিত না। 

কোনো variable এ data আছে কিনা সেটা চেক করার জন্য `isset()` function ব্যবহার করা হয়। 

```php
$name = "Mazhar";

if(isset($name)) {
    echo "Name is set";
} else {
    echo "Name is not set";
}
// Name is set

## $name = ""; // true
## $name = false; // true
## $name; // false
## $name = null; //false
```

- `isset()` দিয়ে চেক করলে `null` এবং assign না করা ছাড়া বাকি সবক্ষেত্রে `true` return করবে।

এমন প্রয়োজন হতে পারে যে, set আছে তবে খালি কিনা সেটা যাচাই করা লাগবে। তখন `empty()` function ব্যবহার করা হয়।

```php
$name = 0;
if(empty($name)) {
    echo "Name is empty";
} else {
    echo "Name is not empty";
}

// Name is not empty

## $name = 0; // empty
```

- `empty()` দিয়ে চেক করলে দেখা যায় value `0` হলেও `true` return করছে। কিন্তু আসলে `0` তো empty না। একটা value আছে।

তো, একই সাথে set করা আছে এবং empty না, এটা চেক করার বেস্ট ওয়ে হচ্ছে:

```php
$name = 0;

if(isset($name) && (is_numeric($name) || $name != '')) {
    echo "Name is set and it's not empty";
} else {
    echo "Name is either not set or empty";
}

// Name is set and it's not empty
```

### `array_slice()`

`array_slice()` function ব্যবহার করে একটি array’র **নির্দিষ্ট অংশ** index অনুযায়ী বের করা যায়, এবং সেটা **নতুন array** হিসেবে return করে। মূল array এর element গুলো আগের মতোই থাকে।

`array_slice(array, offset, length)`

```php
$fruits = ['Apple', 'Banana', 'Guava', 'Orange', 'Pineapple'];

$someFruits = array_slice($fruits, 2) // ['Guava', 'Orange', 'Pineapple']
## $someFruits = array_slice($fruits, 2, 2); // ['Guava', 'Orange']
```

- 2nd argument এ কোন offset থেকে বের করে আনা হবে তা দিতে হবে। offset `0` থেকে শুরু। 3rd argument এ কতটা element বের করে আনবে। কিছু না দিলে পরের সবগুলো বের করে আনবে।
- offset এ `-` value ইউজ করা যাবে। negative value এর বেলায় খেয়াল রাখা লাগবে, `-2` এর অর্থ শেষ থেকে 2 number থেকে। offset ,`-4, -3, -2, -1` এভাবে।
- length এর বেলায়ও negative value accept হবে। তখনও offset টা `-4, -3, -2, -1` এমন থাকবে।  এর আগ পর্যন্ত বের হবে।

```php
$fruits = ['Apple', 'Banana', 'Guava', 'Orange', 'Pineapple', 'Jackfruit', 'Dates'];

$someFruits = array_slice($fruits, -4, -1);
// Orange, Pineapple, Jackfruit
```

যখন array_slice() এর মাধ্যমে নতুন array তৈরি হয় তখন সেই array তে indexing আবার 0 থেকে শুরু হয়। তবে, যদি element গুলো মূল array এর indexing অনুযায়ী return করা প্রয়োজন হয় তাহলে 4th argument এ `true` pass করতে হবে `$preserve_keys` parameter এ।

```php
$fruits = ['Apple', 'Banana', 'Guava', 'Orange', 'Pineapple'];

$someFruits = array_slice($fruits, 2, 2, true)
print_r($someFruits);
// [2] => 'Guava',
// [3] => 'Orange'
```

Associative Array তেও `array_slice()` একই ভাবে কাজ করবে। 

```php
$sectionsStudent = [
    "A" => 30,
    "B" => 25,
    "C" => 34,
    "D" => 21,
    12 => 25,
    "E" => 20
];

$someStudents = array_slice($sectionsStudent, 3, -1, true);
print_r($someStudents);
```

- মনে রাখতে হবে associative array তে `preserved_key` true করার প্রয়োজন নেই, যেহেতু `string` আকারে থাকে key গুলো। তবে যদি কোনো key, numeric বা না দেওয়া থাকে তবে মূল array অনুযায়ী দেখানোর জন্য `$preserved_keys` true করা লাগবে।

### `array_splice()`

`array_slice()` function এর মতোই কাজ করে তবে পার্থক্য হচ্ছে `array_splice()` মূল array হতে element কেঁটে নিয়ে আসে এবং return করে। পাশাপাশি `array_splice()` এর মাধ্যমে মূল array তে নতুন element যোগ করা যায়। অর্থাৎ, `array_splice()` মূল array তে পরিবর্তন ঘটায়। যা `array_slice()` করে না।

***Structure:*** `array_splice($array, $offset, $length, $replacement)`

- `$replacement` parameter এ argument হিসেবে array pass করা যাবে। array ছাড়াও single element ও দেয়া যাবে।

```php
$fruits = ['Apple', 'Banana', 'Guava', 'Orange', 'Pineapple'];

$someFruits = array_splice($fruits, -4, 2, ['Jackfruit', 'Dates']);
```

- `-4` থেকে 2টা অর্থাৎ `Banana, Guava` কে কেটে নিয়ে এসে আলাদা array তৈরি করবে। এবং `$replacement` এ যে array টা pass হয়েছে সেই array’র element গুলো যেখান থেকে কেটে নেয়া হয়েছে সেখানেই বসিয়ে দিবে।
- মনে রাখতে হবে, `array_splice()` এর মাধ্যমে `key preserve` করা যায় না।

### `array_merge()`

`array_merge()` দুই বা ততোধিক অ্যারে একত্রে জোড়া দেয় বা merge করে। array গুলোর মানগুলো নিয়ে নতুন একটি array return করে। 

```php
$fruits1 = ['Apple', 'Banana', 'Guava'];
$fruits2 = ['Orange', 'Pineapple'];

$allFruits = array_merge($fruits1, $fruits2);
print_r($allFruits);
```

- return করা array তে নতুন করে index বা re-index হয়।

```php
$sectionsStudent1 = ["A" => 30, "B" => 25, "C" => 34, "D" => 21, 12 => 25, "E" => 20];
$sectionsStudent2 = ["D" => 12, "L" => 20, 8 => 24, "Shapla"];

$totalStudents = array_merge($sectionsStudent1, $sectionsStudent2);
print_r($totalStudents);
```

- `D` key দুইটা element এর হওয়ায় ২য় টা প্রথমটাকে override করবে।
- `12 => 25` এই element এ number key থাকায় নতুন করে indexing শুরু করেছে। ouput এ `[0] => 25]` দেখাবে এবং `8 => 24` return করবে `[1] => 24` এভাবে। এবং `Shapla` এর index হবে `[2]`

একটা বাস্তব উদাহরণ:

```php
$defaultProfile = ['name' => 'User', 'email' => 'user@example.com', 'phone' => '', 'language' => 'English'];
$userInput = ['name' => 'Mazhar', 'email' => 'mazhartuhin78@gmail.com'];

$userProfile = array_merge($defaultProfile, $userInput);

print_r($userProfile);
```

যদি index ঠিক রাখতে হয় তাহলে `array_merge()` ইউজ না করে `+ (Union Operator)` ইউজ করতে হবে।

```php
$sectionsStudent1 = ["A" => 30, "D" => 21, 12 => 25];
$sectionsStudent2 = ["D" => 25, "L" => 20, 8 => 24, "Shapla"];

$totalStudents = $sectionsStudent1 + $sectionsStudent2;
print_r($totalStudents); 
```

- Index এর key গুলো preserve থাকবে।
- key conflict হলে আগেরটা রাখবে

## Sorting Array

### **`sort()`**

`sort()`  একটি **indexed array**-কে **ascending order**-এ সাজায় (অর্থাৎ ছোট থেকে বড়)। এটি মূল array কে modify করে।

```php
$fruits = ['Apple', 'olive', 'dragon', 'Guava', 'C' => 'Banana', 'Orange', 'Pineapple', 'Dates', 'Jackfruit'];
$numbers = [3, 22, 11, 4, 66, 4, 1, 2, 9];

// sort($fruits);
// sort($numbers);
sort($numbers, SORT_STRING);
sort($fruits, SORT_STRING | SORT_FLAG_CASE);

print_r($fruits); // A-Z অনুযায়ী সাজাবে
print_r($numbers); // ছোট থেকে বড়
```

- `sort()` function শুধুমাত্র **indexed array** এর জন্য
- associative array-এ এটি key গুলো বাদ দিয়ে দেয় এবং re-index করে। অর্থাৎ, এটি associative array-র জন্য না। associative array-র জন্য রয়েছে `asort()`
- চাইলে numbers কেও string হিসেবে compare করা যাবে, `sort($numbers, SORT_STRING)` নতুন `SORT_STRING` flag টা যুক্ত করে।
- default ভাবে `sort()` case-sensitive  ভাবে sort করে। অর্থাৎ, আগে capital letter গুলো আসে তারপর small letter. কিন্তু যদি এমন চাই, capital-small বিষয় না Alphabet অনুযায়ী sort হবে, তাহলে আলাদা একটা `flag` বসাতে হবে। `sort($fruits, SORT_STRING | SORT_FLASE_CASE)`

### **`rsort()`**

`sort()` এর reverse function অর্থাৎ, এটি `sort()` এর মতোই কাজ করে তবে, descending order এ sort করে।

### **`asort()`**

```php
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
```

- value অনুযায়ী sort হবে। key গুলো আগের মতো বজায় থাকে।
- আগে number বসবে তার পর alphabet। ascending order এ।

### **`arsort()`**

`arsort()` এর reverse function। array-এর value অনুযায়ী descending order এ sort করে। 

### **`ksort()`**

array এর element গুলোকে key অনুযায়ী sort করতে `ksort()` function ব্যবহার হয়। ascending order এ sort করে।

### **`krsort()`**

array এর element গুলোকে key অনুযায়ী sort করতে `ksort()` function ব্যবহার হয়। descending order এ sort করে।

---

## Searching in Array

### **`in_array()`**

array এর মধ্যে কোনো value আছে কি না যাচাই করার জন্য `in_array()`` function ব্যবহার হয়। 

`in_array($needle, $haystack, $strict)` needle মানে সুঁই, haystack মানে খড়ের গাদা। অর্থাৎ, খড়ের গাদায় সুঁই খোঁজার মতো অবস্থা। `needle` এর value হবে যা খুঁজতে চাচ্ছি এবং `haystack` এ বসবে কোন array থেকে খুঁজতে চাচ্ছি সেটা। আর `strict` এ বসতে type সহ যাচাই করবে কিনা? true দিলে type সহ যাচাই করবে, default ভাবে type যাচাই করবে না।

```php
$fruits = ['Apple', 'olive', 'dragon', 'Guava', 'b' => 'banana', 'C' => 'Banana', 'Orange', 'Dates',];
$numbers = [3, 22, 2, 11, '56', 4, 66, 4, 1, 2, 9];

// $search = in_array(56, $numbers); // found!
$search = in_array(56, $numbers, true); // not found!

if($search) {
    echo "found!";
} else {
    echo "not found!";
}
```

- যদি মিলে যায় তাহলে প্রথমটা দেখাবে।

### **`array_search()`**

কোন key বা offset এ মান টা আছে সেটা যাচাই করে। true হলে `key` return করে false হলে false return করে।

```php
echo array_search(56, $numbers, true); // false
echo array_search("olive", $fruits); // 1
```

### **`key_exists()`**

array তো কোনো key আছে কিনা সেটা যাচাই করে।

```php
// $fruits array উপরে আছে
$keySearch = key_exists('c', $fruits);

if($keySearch) {
    echo "key exists";
} else {
    echo "key not exists!";
}
```

---

## Difference and Intersection

### `array_intersect()`

array গুলোর মধ্যে যে মান গুলো মিল আছে, সেগুলো বের করে। (সেট অংকের `A n B`  এর মতো)

```php
$numbers1 = [1, 4, 5, 66, 1, 3, 23, 2, 54];
$numbers2 = [88, 3, 21, 44, 3, 28, 1, 2, 7];

$fruits1 = ['a' => 'apple', 'b' => 'banana', 'c' => 'lemon'];
$fruits2 = ['d' => 'dragon', 'b' => 'malta', 'e' => 'grapes', 'c' => 'lemon'];

print_r (array_intersect($numbers1, $numbers2)); // [1, 1, 3, 2]
print_r (array_intersect($numbers2, $numbers1)); // [3, 3, 1, 2]
print_r (array_intersect($fruits1, $fruits2)); // ['lemon']
```

- `array_intersect()` কেবল value গুলো চেক করে।
- argument এ আগে যে array দেয়া হবে সেটার ভিত্তিতে মিল যাচাই হবে। অর্থাৎ সেই array index এর ক্রম অনুযায়ী return করবে

### `array_intersect_assoc()`

যে মান গুলোর key এবং value দুইটাই যদি মিল সেগুলো নিয়ে নতুন array তৈরি করবে।

```php
// উপরের array গুলো থেকে

print_r (array_intersect_assoc($numbers1, $numbers2)); // [ [7] => 2]
print_r (array_intersect_assoc($fruits1, $fruits2)); // [ 'c' => 'lemon']
```

### `array_diff()`

প্রথম array তে যে মান গুলো আছে কিন্তু পরের array-তে নেই সেগুলো নিয়ে নতুন array return করে। (সেট অংকের `(A-B)` এর মতো)

```php
print_r (array_diff($numbers1, $numbers2)); // [4, 5, 66, 23, 54] key সহ return করবে
print_r (array_diff($fruits1, $fruits2)); // ['a' => 'apple' 'b' => 'banana'
```

- argument এর মধ্যে array গুলোর স্থান পরিবর্তন করলে output ভিন্ন আসবে

### `array_diff_assoc()`

`array_diff()` এর মতোই কাজ করে তবে `key` এবং `value` দুইটাই যাচাই করে।

---

## **Some Utility Array Functions**

### `array_walk()`

`array_walk()` function একটি array এর প্রতিটি element এর উপর একটি callback function apply করে। এটি নতুন array return করে না বরং original array কে modify করে।

```php
// array-র element গুলোর square বের করা
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
function square($num) {
    printf("Square of %d is %d \n", $num, $num * $num);
}

array_walk($numbers, 'square');
print_r($numbers);

// lower case to uppercase
$fruits = ['apple', 'banana', 'mango'];
function toUppercase(&$value, $key) {
    $value = strtoupper($value);
}

array_walk($fruits, 'toUppercase');
print_r($fruits);
// Output: Array ( [0] => APPLE [1] => BANANA [2] => ORANGE )
?>
```

- 1st argument এ array এবং 2nd argument এ callback function pass করতে হয়।
- এই কোডের 1st example এ মূল array modify হবে না কারণ callback function এ reference parameter (`&`) দেয়া হয়নি।
- `printf()` PHP-র output দেখানোর একটা ফাংশন। এটা formatted output দেখাতে পারে। `%d` মানে `integer` number।
- `array_walk()` এর মাধ্যমে কেবল display করানো যায়, কিন্তু কিছু return করানো যায় না।
- `strtoupper()` string কে uppercase করার PHP-র built-in function।

### `array_map()`

`array_map()` ও `array_walk()` এর মতো প্রত্যেক element এর উপর function run করায়, তবে পার্থক্য হচ্ছে, `array_map()` মূল array-কে modify করে না এবং নতুন array return করে।

```php
// cube return করা
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
function cube($num) {
    return $num * $num * $num;
}

$cubicNumbers = array_map('cube', $numbers);
print_r($cubicNumbers);
print_r($numbers);

// Uppercase first letter
$fruits = ['apple', 'banana', 'mango'];

$capitalized = array_map('ucfirst', $fruits);
print_r($capitalized);
```

- 1st argument এ callback function এবং 2nd argument এ array দিতে হবে।
- চাইলে `,` দিয়ে একাধিক array pass করা যাবে।
- `ucfirst()` PHP-এর একটি built-in function। যেটা string value এর first letter uppercase করে।

### `array_filter()`

`array_filter()` function একটি array থেকে নির্দিষ্ট condition অনুযায়ী elements filter করে নতুন array return করে।

```php
// filter even and odd numbers
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];

function even($num) { // for even number
    return $num % 2 == 0;
} 
function odd($num) { // for odd number
    return $num % 2 == 1;
}
$evenNumbers = array_filter($numbers, 'even');
$oddNumbers = array_filter($numbers, 'odd');

print_r($evenNumbers);
print_r($oddNumbers);
```

- 1st argument-এ `array` , 2nd argument-এ callback function, 3rd argument-এ`ARRAY_FILTER_USE_KEY` বা `ARRAY_FILTER_USE_BOTH` flag ব্যবহার করা যাবে।
- callback function এবং flag pass করা ছাড়াও `array_filter()` function দিয়ে falsy value গুলো remove করে নতুন array return করা যায়।

```php
$array = [0, 1, '', 'hello', null, false, true, 'world'];

$filtered = array_filter($array);
print_r($filtered);
// Output: Array ( [1] => 1 [3] => hello [6] => 1 [7] => world )
```

### `array_reduce()`

`array_reduce()` array-র সবগুলো element এর উপরে function অনুযায়ী কাজ করে একটা একক মান return করে। অর্থাৎ, কাজকর্ম করে ছোট করে ফেলে!

এটা single একটা value return করবে। array return করে না। মূল array কে modify করে না।

```php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

function sum($oldValue, $newValue) {
    return $oldValue + $newValue;
}
$sum = array_reduce($numbers, 'sum', 0);
echo $sum;
```

- `array_reduce(array, 'callback function name', initial value)`
- callback function এর দুইটা parameter থাকে। প্রথমটাকে `$oldValue` বা শুরুর মান বলা যায়। প্রথম iteration এ `$oldValue` এর initial value হয়। initial value default থাকে `null`। তবে, চাইলে `array_reduce()` এর 3rd argument এ initial value ইচ্ছা মতো pass করা যাবে।
- এই code এ `$oldValue` initial value `0`। 1st iteration এ `$newValue` হবে 1st element অর্থাৎ `1` । তাহলে return statement অনুযায়ী return হবে `0 + 1` বা `1`। এবার return করা মান বা `1` assign হবে`$oldValue`-তে। `$newValue` হবে পরের element বা `2`। return হবে `1 + 2` বা `3`।
- এভাবে iteration চলতে থাকবে, `3 + 3`, `6 + 4` …..। শেষ iteration এ return হবে `55` আর সেটাই হবে `array_reduce()` এর final reduce করা মান।

জোড় সংখ্যা গুলোর যোগফল বের করি:

```php
// $numbers array আগের example থেকে
function sumEven($oldValue, $newValue) {
```

### `range()`

`range()` function-টি নিদিষ্ট range-এর মধ্যে একটি array তৈরি করতে ব্যবহৃত হয়।

```php
// 5 থেকে 20 পর্যন্ত সংখ্যা গুলো নিয়ে নতুন array তৈরি
$numbers = range(5,50);

print_r($numbers);
```

- `range($start, $end, $stepping)`
- 3rd parameter এ কত করে stepping বা অগ্রগতি হবে সেটা বলে দেয়া যায়।

0 থেকে 30 পর্যন্ত জোড় সংখ্যা গুলো print করবো। (stepping হবে 2)

```php
$numbers = range(0,30, 2);

foreach($numbers as $number) {
    if ($number > 0) {
        echo $number, "\n";
    }
}
```

- foreach ব্যবহার করে array এর element গুলো echo করা হয়েছে। if condition বসানো হয়েছে যাতে 0 print না হয়।

চাইলে, 60 পর্যন্ত সংখ্যা গুলো নির্ণয় করতে পারি যেগুলো 5 দিয়ে ভাগ যায়। এর জন্য আগের example-এ `$end` এর value 60 এবং `$stepping` এর value 5 pass করলেই result পাওয়া যাবে।

### `rand()` & `mt_rand()`

`rand()` & `mt_rand()` দুই function-ই `$min` এবং `$max` value এর মধ্যে random number print করে, তবে বর্তমানে `rand()` এর ব্যবহার হয় না বললেই চলে। `mt_rand()` কে prepare করা হয়। কারণ, এটা `rand()` এর চাইতে fast result দেয় এবং quality ও উন্নত।

```php
// নির্দিষ্ট array এর value গুলোর random value print 
$numbers = range(10, 50);
$random = mt_rand(0, 40);

echo $numbers[$random]; 

// উপরের array এবং mt_rant() দিয়ে toss করা যাক এবার
$toss = $numbers[$random];
if ($toss % 2 == 0) {
	echo "Head";
} else {
	echo "Tail";
}
```

- `range()` দিয়ে 10-50 পর্যন্ত number নিয়ে একটা array তৈরি করা হয়েছে। `mt_rand()` এর মাধ্যমে 0-40 এর মধ্যে random number return করা হচ্ছে। এবং সেটা `$numbers[]` এর মধ্যে pass করা হয়েছে। তো, প্রতিবার random offset এর value print হচ্ছে `$numbers` array থেকে।

### `shuffle()`

`shuffle()` ফাংশনটি একটি অ্যারের উপাদানগুলোকে এলোমেলো করে সাজানোর জন্য ব্যবহৃত হয়। ফাংশনটি argument হিসাবে একটা `$array` accept করে।

এটি মূল array-কে পরিবর্তন করে। array-এর সবগুলো `key` reset হয়ে নতুন করে indexing হয়।

```php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

shuffle($numbers);
print_r($numbers);

$fruits = ['Apple', 'Banana', 'Mango', 'Pineapple', 'Orange'];

shuffle($fruits);
print_r($fruits);
```

- যেহেতু `shuffle()` function key গুলোকে reset করে নতুন করে indexing করে তাই, Associative array তে shuffle করলে key গুলো হারিয়ে যাবে!! `0, 1, 2...` এভাবে key গুলো সাজাবে!
- যেহেতু `shuffle()` মূল array কে পরিবর্তন করে দেয় তাই associative array তে shuffle function ইউজ করতে carefully করা লাগবে।