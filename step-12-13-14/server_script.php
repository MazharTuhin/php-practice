<?php
    // Variable Declared
    $name = $email = $phone = $student_id = $group = $dob = $gender = $address = $photo = '';
    $students = [];
    $errors = [];
    $success = '';


    if(session_status() == PHP_SESSION_NONE) {
        session_set_cookie_params(86500);
        session_start();
    }

    // If Server method POST and for submitted
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Asign 'name', 'email', 'phone' fields values to pre declared variables
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $student_id = $_POST['student_id'];
        $group = $_POST['group'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $photo = $_FILES['photo']['name'];

        if (!isset($_SESSION['students'])) {
            $_SESSION['students'] = [];
        }

        // ERROR MESSAGES
        if (empty($name)) $errors['name'] = "Name is required";

        if (empty($email)) $errors['email'] = "Email is required"; 
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Enter a valid email.";

        if (empty($phone)) $errors['phone'] = "Phone is required!";

        if (empty($student_id)) $errors['student_id'] = "Student ID is required!";

        if (empty($group)) $errors['group'] = "Group is required!";

        if (empty($dob)) $errors['dob'] = "Date of Birth is required!";

        if (empty($photo)) $errors['photo'] = "Photo is required!";

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old_values'] = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'student_id' => $student_id,
                'group' => $group,
                'dob' => $dob,
                'gender' => $gender,
                'address' => $address,
                'photo' => $photo
            ];
        } else {
            if (!isset($_SESSION['students'])) {
                $_SESSION['students'] = [];
            }

            // make a array with the values of form fields and push these to sessions array
            if (!empty($name) && !empty($email) && !empty($phone)) {
                $newStudent = [
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'student_id' => $student_id,
                    'group' => $group,
                    'dob' => $dob,
                    'gender' => $gender,
                    'address' => $address,
                    'photo' => $photo
                ];
                
                array_push($_SESSION['students'], $newStudent);
                
                // clear previous errors and old values
                unset($_SESSION['errors']);
                unset($_SESSION['old_values']);

                // success Message
                $_SESSION['success'] = 'New students information successfully added!';
            }

        }
        
        // for prevent duplicate on refresh page
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    // load data from session to $errors variable by GET request
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
    }
    // load data from session to $success variable by GET request
    if (isset($_SESSION['success'])) {
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }

    // Old values
    $old_name = isset($_SESSION['old_values']['name']) ? $_SESSION['old_values']['name'] : '';
    $old_email = isset($_SESSION['old_values']['email']) ? $_SESSION['old_values']['email'] : '';
    $old_phone = isset($_SESSION['old_values']['phone']) ? $_SESSION['old_values']['phone'] : '';
    $old_student_id = isset($_SESSION['old_values']['student_id']) ? $_SESSION['old_values']['student_id'] : '';
    $old_group = isset($_SESSION['old_values']['group']) ? $_SESSION['old_values']['group'] : '';
    $old_dob = isset($_SESSION['old_values']['dob']) ? $_SESSION['old_values']['dob'] : '';
    $old_gender = isset($_SESSION['old_values']['gender']) ? $_SESSION['old_values']['gender'] : '';
    $old_address = isset($_SESSION['old_values']['address']) ? $_SESSION['old_values']['address'] : '';
    $old_photo = isset($_SESSION['old_values']['photo']) ? $_SESSION['old_values']['photo'] : '';


    // load data from session to $students variable by GET request
    if (isset($_SESSION['students'])) {
        $students = $_SESSION['students'];
    }
?>