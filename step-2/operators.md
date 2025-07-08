# PHP Comparison Operators, Logical Operators, Increment & Decrement Operators

## Comparison Operators

`$n1 = 10;` 

`$n2 = "10"`

**Equal (==) (Operand দুইটার value সমান কিনা সেটা যাচাই করে)**

`$n1 == $n2` //true

**Identical (===)**: (Operand দুইটার value এবং type দুইটাই যাচাই করে)

`$n1 === $n2` //false

**Not equal (!=)**: (Operand দুইটার value যাচাই করে, অসমান হলে true রিটার্ন করে)

`$n1 != $n2` //false

**Not identical (!==)**: (Operand দুইটার value এবং type যাচাই করে, যেকোনো একটা অসমান হলে true রিটার্ন করে)

`$n1 !== $n2` //true

---

`$n3 = 7`

`$n4 = 5`

**Greater than (>)**: (বাম পাশের Operand বড় হলে true রিটার্ন করবে)

`$n3 > $n4` // true

**Less than (<)**: (বাম পাশের Operand ছোট হলে true রিটার্ন করবে)

`$n3 < $n4` // false

**Greater than or equal to (>=)**: (বাপ পাশের Operand বড় বা দুইটাই সমান হলে true রিটার্ন করবে)

`$n3 < $n4` // true

**Less than or equal to (<=)**: (বাপ পাশের Operand ছোট বা দুইটাই সমান হলে true রিটার্ন করবে)

`$n3 < $n4` // false

**Spaceship (<=>)**: (দুইটা Operand এর মধ্যে তিনটা সম্পর্ক যাচাই করে, বাম পাশের Operand বড় হলে `1` return করে, সমান হলে `0` return করে, ডান পাশেরটা বড় হলে `-1` return করে।)

`echo 7 <==> 2` // 1

`echo 7 <==> 7` // 0 

`echo 2 <==> 7` // -1 

---

## Logical Operators

`and` বা `&&` (দুইটা শর্ত true হলেই কেবল true return করবে)

`$number = 20`

`$andLogic = $number < 25 && $number > 18` // true

`or` বা `||` (যেকোনো একটা শর্ত true হলেই true return করবে)

`$andLogic = $number < 25 || $number > 21` // true

`i` (NOT Operator: এটি বুলিয়ান মানকে উল্টে দেয়।)

`$number ≠ 20` (false)

---

## Increment & Decrement Operators

**`++` (Increment Operator) (variable এর value 1 করে বৃদ্ধি করে)**

`$number = $number++;`

`echo $number;`  (output `20` ই আসবে। কারণ `$number++` এর মাধ্যমে আগে $number এর current value return করে তারপর 1 increase হয়।)

`$number = ++$number;` 

`echo $number;`  (output `21` আসবে। কারণ `++$number` এর মাধ্যমে value 1 increase হয় তারপর আপডেটেট value return করে)

**`--` (Decrement Operator) (variable এর value 1 করে হ্রাস করে)**

`$number = 20`

`$number = $number--;`

`echo $number;`  (output `20` ই আসবে। কারণ `$number--` এর মাধ্যমে আগে $number এর current value return করে তারপর 1 decrease হয়, তাই `20` output আসছে।)

`$number = --$number;` 

`echo $number;`  (output `19` আসবে। কারণ `--$number` এর মাধ্যমে value 1 decrease হয় তারপর আপডেটেট value `19` return করে)