<?php
include 'config.php';
session_start();

# admin code
if (!isset($_SESSION['id'])) {
    header('location:login.php');
}

if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = $_COOKIE['id'];
}

# select data from admin table
$id = $_SESSION['id'];
$searchTable = "SELECT * FROM admin WHERE id = $id";
$rslt = mysqli_query($conn, $searchTable);

if (!$rslt) {
    echo mysqli_error($conn);
}

$myData = mysqli_fetch_assoc($rslt);
if (!$myData) {
    echo mysqli_error($conn);
}

$welcome = "hello " . $myData['userName'] . ", Welcome!!";


?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-4.6.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/CSS/style.css">
    <title>Dashboard</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark    ">
         <img src="./assets/./image/./Capture.PNG" width="80" alt="can't load image"> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse h4 mt-2" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active ml-4 ">
                    <a class="nav-link" href="create_event.php">Create Event </a>
                </li>
            </ul>
        </div>

        <div class="d-flex user-data ml-3">
 
                            <h2><a href="logout.php" class="btn btn-danger">Log out</a></h2>
             
        </div>
    </nav>
    <!--  show data of users  -->
    <div class="table-responsive ">
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>

                    <th class="table-light">Id</th>
                    <th class="table-light">Full Name</th>
                    <th class="table-light">Standard</th>
                    <th class="table-light">Roll No.</th>
                    <th class="table-light">Gender</th>
                    <th class="table-light">Event</th>
                    <th class="table-light">Mobile No.</th>


                </tr>
            </thead>

            <tbody>
                <?php

                # fetch data from student table
                $selectTable = "SELECT * FROM student";
                $result = mysqli_query($conn, $selectTable);
                while ($myData = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="table-light"> <?php echo $myData['id']; ?> </td>
                        <td class="table-light"> <?php echo $myData['fullName']; ?> </td>
                        <td class="table-light"><?php echo $myData['standard']; ?> </td>
                        <td class="table-light"><?php echo $myData['rollNo']; ?> </td>
                        <td class="table-light"><?php echo $myData['gender']; ?> </td>
                        <td class="table-light"><?php echo $myData['event']; ?> </td>
                        <td class="table-light"><?php echo $myData['mobileNo']; ?> </td>


                    </tr>
                <?php } ?>

            </tbody>

        </table>
    </div>

</body>

</html>