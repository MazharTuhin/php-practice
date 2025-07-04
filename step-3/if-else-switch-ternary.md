# 3.2 PHP If-else conditional statement, Switch…case, Ternary Operator

## If-else

### if-else (যদি)

কোনো একটা condition সত্য (`true`) কিনা তা যাচাই করে সেই অনুযায়ী কোড চালানো যায়। যদি (`if`) সত্য হয় তাহলে কোডের `if` অংশটা execute হবে, আর যদি মিথ্যা হয় তাহলে `else` অংশটা execute হবে।

```php
$age = 16;

if ($age >= 18) {
	echo "You are an adult!";
} else {
	echo "Your are not an adult";
}

// You are not a adult
```

- condition ছিলো `age` 18 বা তার বেশি হলে `adult` হবে অথবা adult না। `age` 16 হওয়ায় `else` এর অংশটুকু print হয়েছে।

### if-elseif-else

আমরা চাইলে, একই `statement` এর মধ্যে একাধিক `condition` যুক্ত করতে পারি। যার জন্য ১ম `condition` এর পরের সবগুলো `condition` এর জন্য `elseif` ব্যবহার করতে হবে।

```php
$score = 75;

if ($score > 100 && $score < 0) {
	echo "Unvalid Score!";
} elseif ($score >= 80) {
	echo "Grade: A+";
} elseif ($score >= 70) {
	echo "Grade: A";
} elseif ($score >= 60) {
	echo "Grade: A-";
} elseif ($score >= 50) {
	echo "Grade: B";
} elseif ($score >= 40) {
	echo "Grade: C";
} else {
	echo "Failed!";
}

// Grade A;
```

### Nested `if` statement

একটা `if` এর মধ্যে চাইলে আরো `if-else` condition ব্যবহার করা যায়।

```php
$age = 25;
$hasID = true;

if ($age >= 18) {
	if ($hasID == true) {
		echo "Access granted!";
	} else {
		echo "ID required!";
	}
} else {
	echo "Acces denied!";
}

// Access granted
```

- প্রথমে `age` চেক করবে। `age` যদি condition অনুযায়ী `true` হয় তাহলে nested if এর condition চেক করবে, `false` হলে `else` এর code block টা execute হবে।

---

## Switch-case

একটা `variable` এর অনেকগুলো সম্ভাব্য মান check করার জন্য `switch`ব্যবহার করা হয়। প্রতিটা সম্ভাব্য মান একেকটা `case` হিসেবে কাজ করে। `if-elseif` এর বিকল্প হিসেবে এটা ব্যবহার করা যায়। 

```php
$day = "Tuesday";

switch ($day) {
	case "Friday":
	case "Saturday":
		echo "Weekend";
		break;
	case "Sunday":
		echo "First working day of the week!";
		break;
	case "Thursday":
		echo "Last working day of the week!";
		break;
	default:
		echo "A regular day";
}

// A regular day

```

- প্রতিটা `case` block এর পরেই `break` use করতে হয়। কারণ, `switch` statement এ প্রতিটা `case` check করা হয় শুরু থেকে, যদি variable এর value মিলে যায় তবে ওই `case` এর code block execute হয়ে `break` এর মাধ্যমে `switch` থেকে বের হয়ে যায়। আর যদি value না পাওয়া যায় তবে পরের `case` check করা হয়।
- যদি কোনো `case` এ কাঙ্কিত value match না করে, তবে default block এ থাকা code execute হবে।
- ১ম দুইটা `case` একই code return করবে তাই, দুইটা `case` এর জন্য একটা code block ব্যবহার করা যায়।

---

## Ternary Operator

Ternary Operator কে `if-else` এর short-hand বলা যায়। একটা condition দেয়া থাকবে, যদি true হয় তবে প্রথম অংশ execute হবে, false হলে দ্বিতীয় অংশ execute হবে।

**structure**

```php
(condition) ? value_if_true : value_if_false;
```

example: শুরুর দিকের `if-else` এর example টা `ternary operator` এর মাধ্যমে দেখবো।

```php
$age = 16;

$checkAge = ($age >= 18) ? "You are an adult!" : "You are not an adult";

echo $checkAge;

// You are not an adult

$isLoggedIn = true;
echo $isLoggedIn ? "Welcome!" : "Please login.";

// Welcome
```
