# 5.2 PHP Function (Recursive, Anonymous, Arrow, Callback function)

## Copy by Value and Copy by Reference

**Copy by value**

যখন একটি variable কে অন্য variable এ assign করা হয়, তখন ডিফল্টভাবে copy by value হয়। যেটাকে **deep copy** ও বলা হয়। 

```php
$name = "Mazhar";
function printName($pName) {
	$pName = "Tuhin";
	echo "Hello {$pName}";
}

printName($name); // Hello Tuhin
echo $name; // Mazhar
```

- `$name` এর value ছিলো `Mazhar` তো function এর argument হিসেবে `$name` value pass করা হয়েছে `$pName` variable বা parameter এর মধ্যে। function এর মধ্যে `$pName` change করা হয়েছে। কিন্তু `$name` এর initial value কিন্তু অপরিবর্তিত রয়ে গেছে।
- এটাই হচ্ছে copy by value বা deep copy। অর্থাৎ, অন্য একটা variable (`$pName`) এ যখন কোনো variable (`$name`) কে assign করা হয়, তখন সম্পূর্ণ আলাদা একটা variable তৈরি হয়। যার সাথে আগের variable এর কোনো সম্পর্ক নেই। দুইটাই ভিন্ন ভিন্ন memory location ইউজ করে।

**Copy by Reference**

একটি variable কে অন্য variable এ assign করার আরেকটা পদ্ধতি। যেখানে উভয় variable একই Memory Location শেয়ার করে। যেহেতু তারা একই memory location ইউজ করে তাই, একটি variable এর মান পরিবর্তন করলে অন্য variable এর মানও পরিবর্তিত হয়।

```php
$name = "Mazhar";
function printName(&$pName) {
	$pName = "Tuhin";
	echo "Hello {$pName}";
}

printName($name); // Hello Tuhin
echo $name; // Tuhin
```

- `&$pName` অর্থাৎ, `&` sign এর মাধ্যমে shallow copy করা হয়।
- output এ দেখা যাচ্ছে। যে variable এর মধ্যে copy করা হয়েছে সেটাতে value change করলে copy হওয়া variable এর মান ও পরিবর্তন হয়ে যাচ্ছে। এটাই copy by reference

## Recursive Function

একটা function যখন নিজেকেই নিজে call করে, তখন সেই function কে recursive function বলে।

```php
function printNumber($counter, $end, $stepping=1) {
	if ($counter > $end) {
		return;
	}
	echo $counter . "\n";
	$counter++;
	printNumber($counter, $end, $stepping);
}

printNumber(12, 48, 3);
```

- এই function এ মধ্যে নিজেই নিজেকে call করেছে। `printNumber($counter, $end, $stepping);`
- `if` condition সেট করা হয়েছে breaking condition হিসেবে।  যাতে infinity loop এর মধ্যে না পরে যায়। তাই, `$counter`, `$end` এর বেশি হলেও function কাজ বন্ধ হয়ে যায়।

---

## Anonymous Function

Anonymous function এর কোনো নাম থাকে না।

```php
$greeting = function() {
	echo "Hello World!";
};

$greeting(); // Hello World
```

- function এর output `$greeting` variable এ accept করা হয়েছে।
- যেহেতু function এর মান store করা হয়েছে তাই, print করার সময় variable নামের শেষে `()` দিতে হবে।
- function এর শেষে `;` দেয়া লাগে না। তবে, যেহেতু উপরের লাইনটা কেবল function না বরং একটা variable এর মধ্যে function যা একটা statement তাই শেষে `;` দেয়া লাগবে।
- সাধারণ function মতো parameter নেয়া যাবে।

Global scope থেকে local scope এ variable access করতে চাইলে `use()` ব্যবহার করা লাগবে।

```php
$name = "Mazhar";
$greeting = function() use ($name) {
	echo "Hello {$name}";
};

$greeting(); // Hello Mazhar
```

---

## Arrow Function

Arrow Functions হচ্ছে Anonymous Function এর সংক্ষিপ্ত syntax.

```php
// Anonymous
$sum = function ($a, $b) {
	return $a + $b;
};

echo $sum(5, 4);

// Arrow
$sum = fn($a, $b) => $a + $b;

echo $sum(5, 4);
```

- ডান পাশের `$a + $b` expression টাতে return দেয়ার প্রয়োজন নেই। Automatic return হবে।
- Arrow function এর মধ্যে একাধিক statement ব্যবহার করা যায় না।

---

## Callback Function

Callback function হচ্ছে একটা function কে আরেকটা function এর argument (parameter) হিসেবে pass করা। যেটা পরে প্রয়োজন মতো call করা হয়।

```php
function  sayHello($name) {
    echo "Hello, {$name}";
}

function greeting($callbackFunc, $personName) {
    return $callbackFunc($personName);
}

$result = greeting("sayHello", "Mazhar"); // Hello Mazhar
```

- `sayHello()` সাধারণ একটা function।
- এই function কে `greeting()` function এর parameter হিসেবে pass করা হয়েছে।
- `greeting()` function টা দুইটা parameter নেয়। `$callbackFunc` এবং `$personName`
- `$callbackFunc` আসলে একটা function এর নাম (string হিসেবে)
- `$callbackFunc($personName)` মানে হলো: যেই function এর নাম দেওয়া হয়েছে, সেটাকে call করো `$personName` parameter দিয়ে। যার ফলে `greeting("sayHello", "Mazhar")` এর মাধ্যমে call করা হলে, প্রথম argument থেকে `sayHello` function `$callbackFunc` এ যায় এবং `Mazhar` value যায় `$personName` এ । তাই, `return $callbackFunc($personName)` হয়ে যায় `return sayHello("Mazhar");`।
- আরো ক্লিয়ার বুঝার জন্য: https://claude.ai/share/5a900f8a-f82e-4eef-a775-5a8096eb9680