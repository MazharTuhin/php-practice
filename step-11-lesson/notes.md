# PHP require and include

`require` এবং `include` দুটিই external file কে currect script এ load করানোর জন্য ব্যবহৃত হয়। 

## `require`

**`require`**

যদি কাঙ্খিত file টি খুঁজে না পায় বা load করতে না পারে, তাহলে **Fatal Error** দিবে এবং script execution বন্ধ হয়ে যাবে।

**`require_once`**

`require` এর কাজ-ই করে তবে file টি একবার load হলে আর load করে না।

### `require/require_once` এর ব্যবহার

- Critical file যা ছাড়া application চলবে না (যেমন: database connection, configuration files)
- Class definition files
- Important function libraries

```php
require_once 'database.php';
```

## `include`

**`include`** 

যদি কাঙ্খিত file টি খুঁজে না পায়, তাহলে শুধু **Warning** দিবে কিন্তু script execution চালু থাকে।
**`include_once`** 
`include`এর কাজ-ই করে তবে file টি একবার include হলে আর include করে না।

### `include/include_once` এর ব্যবহার

- Optional content (যেমন: sidebar, footer)
- Template files যা missing থাকলেও application চলতে পারে

```php
include_once 'header.php';
```