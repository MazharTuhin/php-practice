<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson</title>
    <link rel="stylesheet" href="src/output.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- HERO AREA -->
    <div class="bg-[#FFFCF4]">
        <!-- HEADER -->
        <?php include_once ('header.php'); ?>
        
        <!-- HERO -->
        <?php include_once ('sections/hero.php'); ?>

    </div>

    <!--COURSES -->
    <?php include_once ('sections/courses.php'); ?>

    <!-- TESTIMONIAL -->
    <?php include_once 'sections/testimonials.php'; ?>

    <!-- ABOUT -->
    <?php include_once 'sections/about.php' ?>

    <!-- BLOG -->
    <?php include_once 'sections/blog.php'; ?>

    <!-- FOOTER -->
    <?php include_once 'footer.php'; ?>
    
</body>
</html>