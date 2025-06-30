### Variable

`$my_name = “Mazhar”; (snake_case) > variable`

`$myName; (camelCase) > (function/method)`

`$MyName; (PascelCase) > (Class)`

### Constant

define(”PI”, 3.1416);

CONST PI = 3.1416;

### Statement and Expression

$number = 10; 

এখানে `$number = 10;` এই পুরো লাইনটাকে বলো হবে `statement`, যেটা আলাদা হয় `;` সাইন দ্বারা এবং `10` কে বলা হবে `expression`। আবার `$x` ও কিন্তু একটা `expression`।  

### Data Types

**Scaler Types**

যে Data গুলোতে মূলত একটা মাত্র value থাকে।

- Integer
- Float/Double
- String
- Boolean

**Compound Types**

একাধিক value ধারণ করে।

- Array
- Object

**Special Types**

- null
- resource

## Operators

### Arithmetic Operators

`$number1 = 5;`

`$number2 = 3;`

- Addition (+) = `$number1 + $number2` `// 8`
- Subtraction (-) = `$number1 - $number2` `// 2`
- Multiplication (*) = `$number1 * $number2` `// 15`
- Addition (/) = `$number1 / $number2` `// 1.6666666666667`
- Modulus (%) = `$number1 + $number2` `// 2` (ভাগশেষ)
- Exponentiation (**) = `$number1 ** $number2` `// 125` (ঘাত/সূচক)

### Assignment Operators

Basic Assignment Operator `(=)` 

`$number1 = 5;` // `$number1` variable এ 5 assign করা হয়েছে।

**Combined Assignment Operators**

`+=` (Addition and Assignment)

`$xnumber1 += $number2;`

`$number1 = $number1 + $number2;` // 15

`=` (Subtraction and Assignment)

`$number1 -= $number2;`

`$number1 = $number1 - $number2;` // 2

`+=` (Multiplication and Assignment)

`$number1 *= $number2;`

`$number1 = $number1 * $number2;`

`/=` (Division and Assignment)

`$number1 /= $number2`;

`$number1 = $number1 / $number2;`

`%=` (Modulus and Assignment)

`$number1 %= $number2;`

`$number1 = $number1 % $number2;`

`*=` (Exponentiation and Assignment)

`$number1 **= $number2;`

`$number1 = $number1 ** $number2;`

`.=` (Concatenation and Assignment)

`$number1 .= $number2;`

`$number1 = $number1 . $number2;`