# PHP File Handling

PHP-তে আমরা দুইভাবে Data নিয়ে কাজ করতে পারি। একটা হচ্ছে, File System আরেকটা হচ্ছে Database. 

এই নোটে File System Data নিয়ে কিভাবে কাজ করা যায়, তা নিয়ে বিস্তারিত আলোচনা হবে।

---

বর্তমানে আমার working directory নিচের মতো:

```
step-10
    Data
        file.txt
    index.html
```

- terminal এর মাধ্যমে working directory দেখতে হলে: `pwd` command ব্যবহার করা যাবে। অথবা, PHP তে `echo getcwd()` ফাংশনের মাধ্যমেও current working directory (cwd) জানা যাবে। `__DIR__` কে echo করলেও cwd পাওয়া যাবে।
- `getcwd()` এ cwd এসেছে `d:\code\herd\php`  যা মূল folder এর cwd এবং `__DIR__` দিয়ে echo করলে আসে `D:\code\herd\php\step-10`। তাহলে, `file.txt` file টার path হবে: `D:/code/herd/php/step-10/Data/file.txt`

## File খোলা এবং Data পড়া

### `fopen()`

File Open করতে হলে `fopen()` function ব্যবহার করতে হবে।

1st parameter এ filename pass করা লাগবে এবং 2nd parameter কোন mode-এ ফাইল Open হবে তা বলে দিতে হবে।

Mode গুলো:

`r` - Read Only. শুধু পড়ার জন্য। File অবশ্যই আগে থেকে থাকা লাগবে।

`w` - Write Only. শুধু লেখার জন্য। File এর পুরোনো content মুছে যাবে।

`a` - Append. নতুন যে content গুলো লেখা হবে, সেগুলো শেষে যুক্ত হবে।

`r+` - Read and Write. পড়া এবং লেখা দুইটাই হবে।

`w+` - Write and Read. লেখা এবং পড়া দুটোই হবে। পুরো content মুছে যাবে।

`a+` - Append and Read. content শেষে যুক্ত হবে এবং পড়া যাবে।

```php
$fileName = "D:/code/herd/php/step-10/Data/file.txt";

$filePointer = fopen($fileName, 'r');
```

### `fgets()`

File এর content গুলো Line by Line পড়ার জন্য `fgets()` ব্যবহার করা হয়। প্রতিবার call করলে default ভাবে এক লাইন করে পড়বে। তবে, 2nd parameter এ চাইলে length বলে দেয়া যাবে। তখন ঐ length অনুযায়ী পড়বে। length = 5 মানে 5 পর্যন্ত পড়বে। তবে, 5, 5 করে পড়তে পড়তে new line পেলে কিন্তু থেমে যাবে। 

```php
echo fgets($filePointer); // Hello World!!
echo fgets($filePointer); // Hello, Hello.
echo fgets($filePointer); // The 3rd Line

#####################
echo fgets($filePointer, 5); // Hell
echo fgets($filePointer, 5); // o Wo
echo fgets($filePointer, 5); // rld!
echo fgets($filePointer, 5); // ! (1 টা i পড়ার পরপর নতুন লা্ইন চলে আসায় পড়া বন্ধ হয়ে গেছে

```

### `rewind()`

এখানে একটা বিষয় আছে, যখন পড়বে তখন File এর cursor বা pointer সেই সাথে আগাবে। যেমন উপরে `fgets()` তিনবার call করার পর cursor এখন আছে 4th line এর একদম শুরুতে। অর্থাৎ, পরের বার call করলে 4th line পড়বে। তবে, চাইলে এই cursor কে rewind করে শুরুতে নিয়ে আসা যায় `rewind()` function এর মাধ্যমে।

```php
echo fgets($filePointer); // Hello World!!
echo fgets($filePointer); // Hello, Hello.
echo fgets($filePointer); // The 3rd Line

rewind($filePointer);
// rewind() function call করায় File Pointer একদম শুরুতে আছে
echo fgets($filePointer); // Hello World!!
echo fgets($filePointer); // Hello, Hello.
```

### `fseek()`

`rewind()` function দিয়ে File-এর একদম শুরুতে Pointer নেয়া যায়। যদি নিদির্ষ্ট কোনো পজিশনে Pointer নিতে চাই, তাহলে `fseek()` function টা ব্যবহার করা যাবে।

```php
fseek($filePointer, 6); ## Pointer-কে 6 নং পজিশনে নিয়ে যাবে
echo fgets($filePointer); // World!!
```

- একদম শেষে নিতে চাইলে, `fseek($filePointer, -1, SEEK_END)`

### `fclose()`

খোলা ফাইল বন্ধ করার জন্য `fclose()` function।

```php
fclose($filePointer);
```

### `file()`

`file()` function দিয়ে file এর প্রতিটা লাইন কে element করে একটা array return করে।

```php
$data = file($fileName);

print_r($data);
```

### `file_get_contents()`

পুরো File একসাথে পড়ার জন্য।

```php
$data2 = file_get_contents($fileName);
echo $data2;
```

## File-এ Data লেখা

File এ ডাটা লিখতে হলে file কে writing mode-এ Open করা লাগবে। 

```php
$filePointer = fopen($fileName, 'w');
```

### `fwrite()` বা `fputs()`

Open করা file-এ লেখার জন্য `fwrite()` function ব্যবহার করা হয়।

```php
fwrite($filePointer, "Hello, Nation!";

echo file_get_contents($fileName); // Hello, Nation!
```

- `w` mode-এ file Open করার সাথে সাথে File এ থাকা আগের সবগুলো ডাটা মুছে যাবে। `fwrite()` function ব্যবহার করে যখন লেখা হবে, দেখা যাবে blank একটা file এ নতুন content গুলো যুক্ত হয়েছে।
- যদি আগের content গুলো রেখে নতুন content গুলো এর পরে যুক্ত হোক চাই, তাহলে `a` mode-এ file open করা লাগবে।

```php
$filePointer = fopen($fileName, 'a');

fwrite($filePointer, "Hello, World!";
echo file_get_contents($fileName); // Hello, Nation!Hello, World!
```

### `r+` `w+` `a+` modes

**`r+` Read and Write**

```php
$filePointer = fopen($fileName, 'r+');
```

- `r+` mode-এ file Open করলে একই সঙ্গে পড়া ও লেখা যায়।
- File এর শুরু থেকে পড়া এবং লেখা শুরু হয়। File এর content গুলো মুছে যায় না।
- File pointer একদম শুরুতে (position 0) থাকে।
- নতুন data লিখলে আগের data overwrite হয়ে যায়।

**`w+` - Write and Read**

- প্রথমে write হয়, তারপর read করা যায়। আগে write mode এ open হওয়ায়,  File এর existing সব content মুছে দেয়
- কাঙ্কিত File না থাকলে নতুন file তৈরি করে
- File pointer শুরুতে (position 0) থাকে
- পড়া এবং লেখা উভয়ই করা যায়

**`a+` - Append and Read**

- File এর শেষে নতুন content যোগ করে
- File না থাকলে নতুন file তৈরি করে
- Existing content মুছে যায় না
- File এ Write করার জন্য file pointer শেষে থাকে
- Read করার জন্য file pointer শুরুতে নিয়ে যেতে হয় (`rewind()` বা `fseek()` ব্যবহার করা যেতে পারে)

### `file_put_contents()`

File এ data লেখার জন্য ব্যবহার করা হয়। এর সুবিধা হচ্ছে, File Open, Close করার ঝামেলা নাই। অটোমেটিক File Open ভাবে close হয়ে যায়।

`file_put_contents(filename, data, flags, context)` 3, 4 number parameter optional. 

গুরুত্বপূর্ণ দুইটা Flag:

- **FILE_APPEND** - existing content এর সাথে নতুন data যোগ করে (overwrite করে না)
- **LOCK_EX** - exclusive lock নেয় লেখার সময়। অর্থাৎ যখন একজন ফাইলে লেখে তখন এটা lock হয়ে থাকে যাতে অন্য কেউ শেষ না হওয়া পর্যন্ত লেখতে না পারে।

চাইলে `|` sign use করে দুইটা flag একত্রে ব্যবহার করা যায়।

```php
$fileName = "D:/code/herd/php/step-10/Data/file.txt";

file_put_contents($fileName, "RRF January 2025", FILE_APPEND | LOCK_EX);
echo file_get_contents($fileName);
```

- `FILE_APPEND` flag না দিলে আগের সব data মুছে যেতো।

## Condition check করার জন্য কিছু function

### `is_exists()`

File-টি আছে কিনা সেটা চেক করে। 

```php
if(file_exists($fileName)) {
    file_put_contents($fileName, "RRF January 2025", FILE_APPEND | LOCK_EX);
} else {
    echo "ফাইল নেই";
}
```

### `is_readable()`

File-টি পড়া যাবে কিনা সেটা চেক করে।

```php
if(is_readable("file.txt")) {
    echo "ফাইল পড়া যাবে";
}
```

### `is_writable()`

File-এ লেখা যাবে কিনা সেটা চেক করে।

```php
if(is_writable("file.txt")) {
    echo "ফাইলে লেখা যাবে";
}
```

## File ও Directory নিয়ে কিছু কাজকর্ম

### `filesize()`

```php
echo filesize($fileName) . " bytes"; // 165 bytes
```

### `copy()` - File Copy করা

```php
$fileName = "D:/code/herd/php/step-10/Data/file.txt";
$file2 = "D:/code/herd/php/step-10/Data/file2.txt";

copy($fileName, $file2);
```

### `unlink()` - File Delete করা

```php
unlink($file2);
```

### `rename()` - File rename করা

```php
$file2 = "D:/code/herd/php/step-10/Data/file2.txt";
$newFile = "D:/code/herd/php/step-10/Data/newFile.txt";

rename($file2, $newFile);
```

### **`mkdir()` - Folder তৈরি করা**

```php
mkdir("NewData");
```

### `rmdir()` - Folder delete করা

```php
rmdir("NewData");
```

## File Processing

### `CSV Format`

CSV = Comma-Separated Values

`$students` array এর ডাটাগুলো `file.txt` file এ csv আকারে write করবো। চাইলে `.csv` file এ ও save করা যাবে।

```php
$students = [
    [
        "Name" => "Safwan Mubin",
        "Email" => "safwanmubin@gmail.com",
        "Age" => "16",
        "Class" => "9"
    ],
    [
        "Name" => "Abdul Kaiyum",
        "Email" => "abdulkaiyum@gmail.com",
        "Age" => "15",
        "Class" => "8"
    ],
    [
        "Name" => "Farhan Afsar",
        "Email" => "farhanafsar@gmail.com",
        "Age" => "16",
        "Class" => "10"
    ],
];
```

**File Write [`fputcsv()` function]**

```php
$fileName = "D:/code/herd/php/step-10/Data/file.txt";

$filePointer = fopen($fileName, "w");
if ($filePointer) {
    foreach ($students as $student) {
        fputcsv($filePointer, $student);
    }
    fclose($filePointer);
    echo "Data added!";
}
```

**Read File [`fgetcsv()` function]**

```php
$filePointer = fopen($fileName, 'r');
while($student = fgetcsv($filePointer)) {
    printf("Name = %s\nEmail = %s\nAge = %s\nClass = %s\n\n",$student[0], $student[1], $student[2], $student[3]);
}
```

**নতুন ডাটা এড করা**

```php
$newStudent = [
    "Name" => "Ahmed Noor",
    "Email" => "ahmednoor@gmail.com",
    "Age" => "15",
    "Class" => "8"
];

$filePointer = fopen($fileName, 'a');
fputcsv($filePointer, $newStudent);
fclose($filePointer);
```

- এই ফরম্যাটে save করলে কোনো নির্দিষ্ট ডাটা delete করতে কিছুটা ঝামেলা। আগে `file()` function দিয়ে লাইনগুলোকে array তে convert করে, `unset()` function দিয়ে delete করা যাবে। এর আবার বাকি data গুলো loop চালিয়ে write করা!