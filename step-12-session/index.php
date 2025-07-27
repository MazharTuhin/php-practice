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
    $name = $email = $phone = '';
    $students = [];

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);

        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['students'])) {
            $_SESSION['students'] = [];
        }

        if (!empty($name) && !empty($email) && !empty($phone)) {
            $newStudent = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone
            ];
            
            array_push($_SESSION['students'], $newStudent);
        }

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['students'])) {
        $students = $_SESSION['students'];
    }
    // print_r($students);
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
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name">
                </div> <!-- NAME -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="example@example.com">
                </div> <!-- EMAIL -->
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" placeholder="018-000-00000">
                </div> <!-- PHONE -->
                <div class="submit-btn">
                    <button type="submit" name="submit">Submit</button>
                </div>
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