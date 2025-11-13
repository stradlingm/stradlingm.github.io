<?php 
    $navBarTitle = "StradlingM Portfolio Website";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
            Name: Matthew Stradling
            File: <?php echo $file . "\n"; ?>
            Date: <?php echo $date . "\n"; ?>
            Description: <?php echo $desc . "\n"; ?>
        -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $title; ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="/fall2025/index.php"><?php echo $navBarTitle; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/fall2025/index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/fall2025/grades.php">Grades</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Contact</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Services</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container px-4 px-lg-5">