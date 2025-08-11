<?php

// class Product {
//         public $name;
//         public $price;
//         public $category;
//         public $brand;
//         public $stock;
//         public $sku;

//         function showDetails() {
//                 echo "Name: $this->name, Price: $this->price, Category: $this->category, Brand: $this->brand, Stock: $this->stock, SKU: $this->sku";
//         }
// }

// $product1 = new Product();
// $product1->name = "Samsung A26";
// $product1->price = "16000";
// $product1->category = "Mobile";
// $product1->brand = "Samsung";
// $product1->stock = "40";
// $product1->sku = "sam001";

// $product2 = new Product();
// $product2->name = "Walton Fridge F20";
// $product2->price = "32000";
// $product2->category = "Fridge";
// $product2->brand = "Walton";
// $product2->stock = "15";
// $product2->sku = "wal003";


// // echo $product1->name;
// echo $product1->showDetails();

// echo PHP_EOL;

// echo $product2->showDetails();


class Person {
        public $name, $age, $email, $phone, $address, $occupation;

        function showProfile() {
                echo "Name: $this->name,\nAge: $this->age,\nPhone: $this->phone,\nEmail: $this->email,\nAddress: $this->address,\nOccupation: $this->occupation";
        }
}

$person1 = new Person();
$person1->name = 'Mazhar';
$person1->age = '28';
$person1->email = 'mazhartuhin78@gmail.com';
$person1->phone = '01800000000';
$person1->address = 'Cumilla';
$person1->occupation = 'PHP Web Developer';

echo $person1->showProfile();