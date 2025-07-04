# 3.1 PHP String Operator, **Null Coalescing**

## 1. String Operator

### Concatenation (.) যুক্ত করা

একাধিক string কে যুক্ত করার জন্য concatenation operator ব্যবহার করা হয়।

```php
$firstName = "Mazhar";
$lastName = "Tuhin";

$fullName = $firstName . " " . $lastName;

echo $fullName; // Mazhar Tuhin
```

### Concatenation Assignment Operator (.+)

```php
$greeting = "Hello";
$greeting .= " World!"; // $greeting এর সাথে নতুন স্ট্রিং যুক্ত হচ্ছে

echo $greeting; // আউটপুট: Hello World!
```

### Double Quotation এর মধ্যে variable

```php
$name = "Mazhar";

echo "My name is {$name}"; // My name is Mazhar
```

### Concatenation Operator এর মাধ্যমে string এ শুধু scaler type variable না, চাইলে array, function এর value ও ব্যবহার করা যায়।

```php
// function এর রিটার্ন ভ্যালু যুক্ত করা
function getTime() {
    return date("h:i A");
}
echo "Current time is " . getTime(); // Current টা্ইম শো করবে getTime() function এর মাধ্যমে

// array থেকে ভ্যালু যুক্ত করা
$user = ['first_name' => 'Mazhar', 'last_name' => 'Tuhin'];
echo "User: " . $user['first_name'] . " " . $user['last_name']; // User: Mazhar Tuhin
```
---

## 2. Null Coalescing (??)

যদি প্রথম operand এর value null না হয় তবে প্রথম operand return করে। আর যদি ১ম operand এর value null হয় তবে পরের operand return করে।

```php
$value = "Mazhar";
$nullCls = $value ?? 'anonymous';

echo $nullCls; // Output is: Mazhar কারণ 1st operand টা null না, তা্ই ্এটার value return করেছে
```

`$value` যদি null বা set না থাকতো তাহলে 2nd Operator এর value `anonymous` return করতো।