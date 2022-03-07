<?php
include 'config.php';
include 'insert.php';
# functions for set value in input field and keep checked radio button and checkbox
function setValue($value)
{
    if (isset($_POST[$value])) {
        echo $_POST[$value];
    }
}

function checked($name, $value, $show)
{
    if (isset($_POST[$name])) {
        if ($_POST[$name] == $value)
            echo  $show;
    }
}

#fetch events from admin's data
$fetchEvent = "SELECT * FROM events" ;
$result = mysqli_query($conn, $fetchEvent);

 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/./CSS/./style.css">
    <link rel="stylesheet" href="./assets/./bootstrap-4.6.1-dist/./css/./bootstrap.min.css">
    <title>Registration</title>
</head>


<body>
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

    <div class="container border mt-5 p-1 w-50">
        <form method="post">
            <div class="row">
                <div class="col-lg-4">

                    <div class="form-group ">
                        <label for="fullName">First Name</label>
                        <input type="text" class="form-control" id="fullName" name="fName" value="<?php setValue('fName'); ?>">
                        <small><?php echo $fNameErr; ?></small>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="form-group ">
                        <label for="fullName">Middle Name</label>
                        <input type="text" class="form-control" id="fullName" name="mName" value="<?php setValue('mName'); ?>">
                        <small><?php echo $mNameErr; ?></small>
                    </div>

                </div>
                <div class="col-lg-4">

                    <div class="form-group ">
                        <label for="fullName">Last Name</label>
                        <input type="text" class="form-control" id="fullName" name="lName" value="<?php setValue('lName'); ?>">
                        <small><?php echo $lNameErr; ?></small>
                    </div>

                </div>
            </div>


            <div class="row">

                <div class="col-lg-4">

                    <div class="form-group ">
                        <label for="rollNo">Standard</label>

                        <select class="form-control" name="std">
                            <option selected disabled>Standard</option>

                            <?php $i = 0;
                            while ($i < 12) {
                                $i++; ?>
                                <option value="<?php echo $i; ?>" <?php checked('std', "$i", 'selected'); ?>><?php echo $i; ?></option>
                            <?php  }   ?>

                        </select>
                        <small><?php echo $stdErr; ?></small>

                    </div>
                </div>




                <div class="col-lg-4">
                    <div class="form-group ">
                        <label for="rollNo">Roll No.</label>
                        <input type="text" class="form-control" id="rollNo" name="rollNo" value="<?php setValue('rollNo'); ?>">
                        <small><?php echo $rollNoErr; ?></small>
                    </div>


                </div>


                <div class="col-lg-4 mt-2">
                    <label for="rollNo">Gender</label>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineCheckbox1" value="male" <?php checked('gender', 'male', 'checked'); ?>>
                            <label class="form-check-label" for="inlineCheckbox1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineCheckbox1" value="female" <?php checked('gender', 'female', 'checked'); ?>>
                            <label class="form-check-label" for="inlineCheckbox1">Female</label>
                        </div>

                        <small><?php echo $genErr; ?> </small>
                    </div>
                </div>


            </div>

            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group ">

                        <label for="rollNo">Event</label>
                        <select class="form-control" name="event">
                            <option selected disabled>Select Event</option>
                            <?php  while ($data = mysqli_fetch_assoc($result) ) {
                                $event = $data['event']; ?>
                                <option value="<?php echo $data['event']; ?>" <?php checked('event', "$event", 'selected'); ?>><?php echo $data['event']; ?></option>
                            <?php  }   ?>

                        </select>
                        <small><?php echo $eventErr; ?></small>
                    </div>
                </div>


                <div class="col-lg-8">
                    <div class="form-group ">
                        <label for="rollNo">Mobile No.</label>
                        <input type="text" class="form-control" id="rollNo" name="mobile" value="<?php setValue('mobile'); ?>">
                        <small><?php echo $mobileErr; ?></small>
                    </div>
                </div>
            </div>












            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-warning">reset</button>
        </form>
    </div>



    <script src="./assets/./JS/./jquery.slim.min.js"></script>
    <script src="./Assets/./bootstrap-4.6.1-dist/./js/./bootstrap.bundle.min.js"></script>

</body>

</html>