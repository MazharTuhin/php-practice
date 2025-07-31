<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <?php require_once 'server_script.php' ?>
    
    <!-- OUTPUT -->
    <div class="output-container">
        <div class="output-heading-box">
            <!-- OUTPUT HEADING -->  
            <div class="output-heading">
                <h2>All Students</h2>
            </div>
            <!-- BUTTON -->
            <a href="/step-12-13/index.php" class="add-student-btn">Add Student</a>
        </div>
        <div class="data-container">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Student ID</th>
                        <th>Group</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Photo</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (empty($students)): ?>
                        <tr>
                            <td>Student 1</td>
                            <td>student@example.com</td>
                            <td>018-000-00000</td>
                            <td>215001</td>
                            <td>Science</td>
                            <td>2 January 2013</td>
                            <td>Male</td>
                            <td>21/3 Doctor Para, Feni Sadar</td>
                            <td>student1.jpeg</td>
                        </tr>
                        <tr>
                            <td>Student 2</td>
                            <td>student@example.com</td>
                            <td>018-000-00000</td>
                            <td>215002</td>
                            <td>Commerce</td>
                            <td>2 January 2013</td>
                            <td>Female</td>
                            <td>21/3 Master Para, Feni Sadar</td>
                            <td>student2.jpeg</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <?php if (isset ($student['name'])):?>
                                    <td> <?php echo htmlspecialchars($student['name']); ?></td>
                                <?php endif; ?>
                                <?php if (isset ($student['email'])):?>
                                    <td> <?php echo htmlspecialchars($student['email']); ?></td>
                                <?php endif; ?>
                                <?php if (isset ($student['phone'])):?>
                                    <td> <?php echo htmlspecialchars($student['phone']); ?></td>
                                <?php endif; ?>
                                <?php if (isset ($student['student_id'])):?>
                                    <td> <?php echo htmlspecialchars($student['student_id']); ?></td>
                                <?php endif; ?>
                                <?php if (isset ($student['group'])):?>
                                    <td> <?php echo htmlspecialchars($student['group']); ?></td>
                                <?php endif; ?>
                                <?php if (isset ($student['dob'])):?>
                                    <td> <?php echo htmlspecialchars($student['dob']); ?></td>
                                <?php endif; ?>
                                <?php if (isset ($student['gender'])):?>
                                    <td> <?php echo htmlspecialchars($student['gender']); ?></td>
                                <?php endif; ?>
                                <?php if (isset ($student['address'])):?>
                                    <td> <?php echo htmlspecialchars($student['address']); ?></td>
                                <?php endif; ?>
                                <?php if (isset ($student['photo'])):?>
                                    <td> <?php echo htmlspecialchars($student['photo']); ?></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>