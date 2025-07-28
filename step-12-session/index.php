<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Practice</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<?php
    // Variable Declared
    $name = $email = $phone = '';
    $students = [];
    $errors = [];
    $success = '';


    if(session_status() == PHP_SESSION_NONE) {
        session_set_cookie_params(60);
        session_start();
    }

    // If Server method POST and for submitted
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Asign 'name', 'email', 'phone' fields values to pre declared variables
        $name = trim(htmlspecialchars($_POST['name']));
        $email = trim(htmlspecialchars($_POST['email']));
        $phone = trim(htmlspecialchars($_POST['phone']));

        if (!isset($_SESSION['students'])) {
            $_SESSION['students'] = [];
        }

        // ERROR MESSAGES
        if (empty($name)) {
            $errors['name'] = "Name is required";
        }

        if (empty($email)) {
            $errors['email'] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Enter a valid email.";
        }

        if (empty($phone)) {
            $errors['phone'] = "Phone is required!";
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old_values'] = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone
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
                    'phone' => $phone
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


    // load data from session to $students variable by GET request
    if (isset($_SESSION['students'])) {
        $students = $_SESSION['students'];
    }
?>

    <div class="container">
        <!-- INPUT -->
        <div class="form-container">
            <!-- FORM HEADING -->
            <div class="form-heading">
                <h2>Student Information</h2>
            </div>
            <!-- MAIN FORM -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                    <label for="name">Full Name<span>*</span></label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" value="<?php echo $old_name; ?>">

                    <!-- Error Message -->
                    <?php if (isset($errors['name'])): ?>
                        <p class="error-message"> <?php echo $errors['name']; ?> </p>
                    <?php endif; ?>

                </div> <!-- NAME -->
                <div class="form-group">
                    <label for="email">Email<span>*</span></label>
                    <input type="email" name="email" id="email" placeholder="example@example.com" value="<?php echo $old_email; ?>">
                        
                    <!-- Error Message -->
                    <?php if (isset($errors['email'])): ?>
                        <p class="error-message"> <?php echo $errors['email']; ?> </p>
                    <?php endif; ?>
                
                </div> <!-- EMAIL -->
                <div class="form-group">
                    <label for="phone">Phone<span>*</span></label>
                    <input type="tel" name="phone" id="phone" placeholder="018-000-00000" value="<?php echo $old_phone; ?>">
                        
                    <!-- Error Message -->
                    <?php if (isset($errors['phone'])): ?>
                        <p class="error-message"> <?php echo $errors['phone']; ?> </p>
                    <?php endif; ?>
                
                </div> <!-- PHONE -->
                <div class="submit-btn">
                    <button type="submit" name="submit">Submit</button>
                </div>

                <!-- SUCCESS MESSAGE -->
        
                <?php if (isset($success)): ?>
                    <div class="success-message">
                        <?php echo $success; ?>
                    </div>
                <?php endif; ?>
            </form>
        </div>

        <!-- OUTPUT -->
        <div class="output-container">
            <div class="output-heading">
                <h2>Submitted Data</h2>
            </div> <!-- OUTPUT HEADING -->  
            <div class="data-container">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (empty($students)): ?>
                            <tr>
                                <td>Student 1</td>
                                <td>student@example.com</td>
                                <td>018-000-00000</td>
                            </tr>
                            <tr>
                                <td>Student 2</td>
                                <td>student@example.com</td>
                                <td>018-000-00000</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <?php if (isset ($student['name'])):?>
                                        <td> <?php echo $student['name']; ?></td>
                                    <?php endif; ?>
                                    <?php if (isset ($student['email'])):?>
                                        <td> <?php echo $student['email']; ?></td>
                                    <?php endif; ?>
                                    <?php if (isset ($student['phone'])):?>
                                        <td> <?php echo $student['phone']; ?></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


</body>
</html>