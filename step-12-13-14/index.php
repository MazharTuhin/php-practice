<?php require_once 'cookie-script.php' ?>
<?php require_once 'server_script.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Practice</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <div class="container">
        <!-- INPUT -->
        <div class="form-container">
            <!-- FORM HEADING -->
            <div class="form-heading">
                <h2>Student Information Form</h2>
            </div>
            <!-- MAIN FORM -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <!-- NAME -->
                <div class="form-group">
                    <label for="name">Full Name<span>*</span></label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" value="<?php echo htmlspecialchars($old_name); ?>">
                    <!-- Error Message -->
                    <?php if (isset($errors['name'])): ?>
                        <p class="error-message"> <?php echo $errors['name']; ?> </p>
                    <?php endif; ?>
                </div> 
                <!-- EMAIL -->
                <div class="form-group">
                    <label for="email">Email<span>*</span></label>
                    <input type="email" name="email" id="email" placeholder="example@example.com" value="<?php echo htmlspecialchars($old_email); ?>">
                    <!-- Error Message -->
                    <?php if (isset($errors['email'])): ?>
                        <p class="error-message"> <?php echo $errors['email']; ?> </p>
                    <?php endif; ?>
                </div> 
                <!-- PHONE -->
                <div class="form-group">
                    <label for="phone">Phone<span>*</span></label>
                    <input type="tel" name="phone" id="phone" placeholder="018-000-00000" value="<?php echo htmlspecialchars($old_phone); ?>">
                    <!-- Error Message -->
                    <?php if (isset($errors['phone'])): ?>
                        <p class="error-message"> <?php echo $errors['phone']; ?> </p>
                    <?php endif; ?>
                </div>
                <!-- STUDENT ID -->
                <div class="form-group">
                    <label for="student_id">Student ID<span>*</span></label>
                    <input type="number" name="student_id" id="student_id" placeholder="Enter your Student ID" value="<?php echo htmlspecialchars($old_student_id); ?>">
                    <!-- Error Message -->
                    <?php if (isset($errors['student_id'])): ?>
                        <p class="error-message"> <?php echo $errors['student_id']; ?> </p>
                    <?php endif; ?>
                </div> 
                <!-- GROUP -->
                <div class="form-group">
                    <label for="group">Group<span>*</span></label>
                    <select name="group" id="group">
                        <option value="">--Select Group--</option>
                        <option value="Science" <?php echo ($old_group == 'Science') ? 'selected' : ''; ?> >Science</option>
                        <option value="Commerce" <?php echo ($old_group == 'Commerce') ? 'selected' : ''; ?> >Commerce</option>
                        <option value="Humanities" <?php echo ($old_group == 'Humanities') ? 'selected' : ''; ?> >Humanities</option>
                    </select>
                    <!-- Error Message -->
                    <?php if (isset($errors['group'])): ?>
                        <p class="error-message"> <?php echo $errors['group']; ?> </p>
                    <?php endif; ?>
                </div> 
                <!-- DATE OF BIRTH -->
                <div class="form-group">
                    <label for="dob">Date of Birth<span>*</span></label>
                    <input type="date" name="dob" id="dob" value="<?php echo htmlspecialchars($old_dob); ?>">

                    <!-- Error Message -->
                    <?php if (isset($errors['dob'])): ?>
                        <p class="error-message"> <?php echo $errors['dob']; ?> </p>
                    <?php endif; ?>
                </div> 
                <!-- GENDER -->
                <div class="form-group gender-group">
                    <label>Gender :</label>

                    <div class="radio-group">
                        <input type="radio" name="gender" id="male" value="Male" <?php echo ($old_gender == 'Male') ? 'checked' : ''; ?> >
                        <label for="male">Male</label>
                        
                        <input type="radio" name="gender" id="female" value="Female" <?php echo ($old_gender == 'Female') ? 'checked' : ''; ?>>
                        <label for="female">Female</label>
                    </div>
                </div> 
                <!-- ADDRESS -->
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" placeholder="Write your address" value="<?php echo htmlspecialchars($old_address); ?>"><?php echo trim(htmlspecialchars($old_address)); ?></textarea>
                </div>
                <!-- PHOTO -->
                <div class="form-group">
                    <label for="photo">Photo<span>*</span></label>
                    <input type="file" name="photo" id="photo" value="<?php echo $old_photo; ?>">
                    <!-- Error Message -->
                    <?php if (isset($errors['photo'])): ?>
                        <p class="error-message"> <?php echo $errors['photo']; ?> </p>
                    <?php endif; ?>
                </div>

                <!-- SUBMIT BUTTON -->
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
    </div>

    <?php if (!isset($_COOKIE['cookie_accepted'])): ?>
        <!-- COOKIE BOX -->
        <div class="cookie-container" id="cookie-box">
            <div class="cookie-content">
                <p>
                    cookie ব্যবহারের মাধ্যমে আপনার ব্রাউজারে আমাদের ওয়েবসাইট ব্রাউজের অভিজ্ঞতাকে আরো উন্নত করা হয়। আপনি কি সম্মত আছেন?
                </p>
            </div>
            <div class="cookie-btn">
                <button onclick="acceptCookie()">Allow</button>
            </div>
        </div>
    <?php endif; ?>


    <!-- JS for COOKIE BOX -->
    <script>
        function acceptCookie() {
            fetch('?accept_cookie=true').then(() => {
                document.getElementById('cookie-box').style.display = 'none';
            });
        }
    </script>

</body>
</html>