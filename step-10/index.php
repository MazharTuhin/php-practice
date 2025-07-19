<?php

// echo getcwd();
// echo __DIR__;
// $fileName = "D:/code/herd/php/step-10/Data/file.txt";

// $filePointer = fopen($fileName, 'r');

######################
## fgets()

// echo fgets($filePointer, 5);
// echo fgets($filePointer);
// echo fgets($filePointer);
// echo fgets($filePointer);

#########################
## rewind()

// rewind($filePointer);
// echo fgets($filePointer);
// echo fgets($filePointer);
// echo fgets($filePointer, 5);
// echo fgets($filePointer, 5);
// echo fgets($filePointer, 5);
// echo fgets($filePointer, 5);

##############################
## fseek()
// fseek($filePointer, 6); 
// echo fgets($filePointer);

###################################
## file()

// $data = file($fileName);

// print_r($data);

###########################
## file_get_contents()

// $data2 = file_get_contents($fileName);
// echo $data2;

#############################
## write data

// $filePointer = fopen($fileName, 'w');
// $filePointer = fopen($fileName, 'a');

// $existingData = file_get_contents($fileName);
// echo $existingData;

// fwrite($filePointer, "\nHello, World!");
// $data = file_get_contents($fileName);
// echo $data;

// $filePointer = fopen($fileName, 'r+');

// echo file_get_contents($fileName);
// echo PHP_EOL;
// fwrite($filePointer, "Write a line with r+\n");

// echo file_get_contents($fileName);


// fclose($filePointer);


################################
## file_put_contents()

// $fileName = "D:/code/herd/php/step-10/Data/file.txt";

// file_put_contents($fileName, "RRF January 2025\n", FILE_APPEND | LOCK_EX);

// echo file_get_contents($fileName);



####################################################

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

###############
## Processing data with CSV (Comma-Separated Values)

$fileName = "D:/code/herd/php/step-10/Data/file.txt";

// $filePointer = fopen($fileName, "w");
// if ($filePointer) {
//     foreach ($students as $student) {
//         fputcsv($filePointer, $student);
//     }
//     fclose($filePointer);
//     echo "Data added!";
// }

// echo file_get_contents($fileName);
// $filePointer = fopen($fileName, 'r');
// while($student = fgetcsv($filePointer)) {
//     printf("Name = %s\nEmail = %s\nAge = %s\nClass = %s\n\n",$student[0], $student[1], $student[2], $student[3]);
// }

$newStudent = [
    "Name" => "Ahmed Noor",
    "Email" => "ahmednoor@gmail.com",
    "Age" => "15",
    "Class" => "8"
];

// $filePointer = fopen($fileName, 'a');
// fputcsv($filePointer, $newStudent);
// fclose($filePointer);




################################
## Processing with Serialize format

echo filesize($fileName) . " bytes";

$fileName = "D:/code/herd/php/step-10/Data/file.txt";
$file2 = "D:/code/herd/php/step-10/Data/file2.txt";
$newFile = "D:/code/herd/php/step-10/Data/newFile.txt";

// copy($fileName, $file2);
// unlink($file2);

rename($file2, $newFile);


