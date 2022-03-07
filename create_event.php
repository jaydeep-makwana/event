<?php
include 'insert.php';
session_start();

 
if (!isset($_SESSION['id'])) {
    header('location:login.php');
}

if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = $_COOKIE['id'];
}

# functions for set value in input field and keep checked radio button and checkbox
function setValue($value)
{
    if (isset($_POST[$value])) {
        echo $_POST[$value];
    }
}
 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <link rel="stylesheet" href="./assets/./CSS/./style.css">
    <link rel="stylesheet" href="./assets/./bootstrap-4.6.1-dist/./css/./bootstrap.min.css">
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
                    <a class="nav-link" href="index.php">Home </a>
                </li>
            </ul>
        </div>


    </nav>

    <div class="container border mt-5 p-1 w-25">
        <form method="post">

        

                <div class="form-group ">
                    <label for="fullName">Name Of Event</label>
                    <input type="text" class="form-control" id="fullName" name="event" value="<?php setValue('event'); ?>">
                    <small><?php echo $eventErr;  ?></small>
                </div>
           

          
                <div class="form-group ">
                    <label for="fullName">Date</label>
                    <input type="date" class="form-control" id="fullName" name="date" value="<?php setValue('date'); ?>">
                    <small><?php echo $dateErr;  ?></small>
                </div>

         
          
<div class="row">
<div class="col-lg-6">

    <div class="form-group ">
        <label for="fullName">Start Time</label>
        <input type="time" class="form-control" id="fullName" name="stime" value="<?php setValue('stime'); ?>">  
        <small><?php echo $sTimeErr; ?></small>
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group ">
        <label for="fullName">End Time</label>
        <input type="time" class="form-control" id="fullName" name="etime" value="<?php setValue('etime'); ?>">
        <small><?php echo $eTimeErr; ?></small>
    </div>
</div>
    
</div>
    




            <button type="submit" name="createEvent" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-warning">reset</button>
        </form>
    </div>
</body>

</html>