# PHP Control Flow Alternative Syntax

PHP তে code গুলো সাধারণত উপর থেকে নিচে একের পর এক execute হয়, এটা একটা flow। এই flow কে নিয়ন্ত্রণ বা পরিবর্তন করার জন্য যে statement গুলো ইউজ করা হয় সেগুলা হচ্ছে Control Flow Statements!

PHP-তে তিন ধরনের Control Flow Statements রয়েছে।

1. Conditional Statements : `if`, `if...else`, `if...elseif...else` , `switch`
2. Loops: `for`, `while`, `do...while`, `foreach`
3. Jump Statements: `break`, `continue`, `return`

এই বিষয়গুলো সম্পর্কে step-3 এবং step-4 এ জেনেছি।

## আজকের টপিক: Control Flow Alternative Syntax

Control Flow Statements গুলোর মধ্যে ১টা syntax common সেটা হচ্ছে `{}` (curly braces)। Alternative Syntax এ `{}` এর পরিবর্তে `:` ব্যবহার করা হয় এবং statement এর শেষে ending keyword লিখা হয়।

সংক্ষেপে বললে:

- `{` এর পরিবর্তে `:` বসবে
- `}` এর পরিবর্তে ending keyword বসবে।

HTML Code এর সাথে যখন PHP code লিখা হয়, তখন Alternative Syntax এ লিখা হয়। এই Syntax CMS এবং Framework গুলোও follow করে।

## `if` statement

```php
## Regular Syntax
<?php
$age = 16;

if ($age >= 18) {
	echo "You are an adult!";
} else {
	echo "Your are not an adult";
}
?>
## Alternative Syntax
<?php if ($age >= 18): ?>
    <p>Your are an adult</p>
<?php else: ?>
    <p>You are not an adult.</p>
<?php endif; ?>
```
## `for` loop

```php
<table>
      <?php for ($i = 1; $i <= 8; $i++): ?>
      <tr>
          <?php for ($j = 1; $j <= 10; $j++): ?>
              <td><?php echo $i * $j ?></td>
          <?php endfor; ?>
      </tr>
      <?php endfor; ?>
  </table>
```

`foreach()` loop

```php
<?php
    $fruits = [
        'A' => 'Apple',
        'B' => 'Banana',
        'C' => 'Cherry',
        'D' => 'Date',
        'E' => 'Elderberry',
        'F' => 'Fig',
        'G' => 'Grape',
        'H' => 'Honeydew Melon',
        'J' => 'Jackfruit',
        'K' => 'Kiwi',
        'L' => 'Lemon',
        'M' => 'Mango',
        'N' => 'Nectarine',
        'O' => 'Orange',
        'P' => 'Papaya', 
        'R' => 'Raspberry',
        'S' => 'Strawberry',
        'T' => 'Tamarillo',
        'U' => 'Ugni',
        'W' => 'Watermelon',
        'X' => 'Xigua',
        'Y' => 'Yuzu',
        'Z' => 'Zalacca'
    ];
?>

<h2>A list of fruits (A-Z)</h2>
<ul>
    <?php foreach ($fruits as $key => $value): ?>
        <li>
            <?php echo "{$key} for {$value}"; ?>
        </li>
    <?php endforeach; ?>
</ul>
```