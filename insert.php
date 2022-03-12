<?php
include 'config.php';

$fNameErr = $mNameErr = $lNameErr = $stdErr  = $rollNoErr = $genErr = $eventErr = $mobileErr =  $dateErr =  $sTimeErr = $eTimeErr = '';

# insert data through user
if (isset($_POST['submit'])) {

    $selectTable = "SELECT * FROM student";

    if (!mysqli_query($conn, $selectTable)) {
        $createTable = "CREATE TABLE student (
     id int(10) AUTO_INCREMENT not null primary key,
     fullName varchar(100) not null,
     standard int(10) not null,
     rollNo int(10),
     gender text not null,
     event text not null,
     mobileNo int(10) not null)";

        if (!mysqli_query($conn, $createTable)) {
            echo mysqli_error($conn);
        }
    }




    if (empty($_POST['fName'])) {
        $fNameErr = 'enter your first name';
    } elseif (!preg_match("/^[a-zA-Z]*$/", $_POST['fName'])) {
        $fNameErr = 'only enter alphabet ';
    } elseif (empty($_POST['mName'])) {
        $mNameErr = 'enter your middle name';
    } elseif (!preg_match("/^[a-zA-Z]*$/", $_POST['mName'])) {
        $mNameErr = 'only enter alphabet ';
    } elseif (empty($_POST['lName'])) {
        $lNameErr = 'enter your last name';
    } elseif (!preg_match("/^[a-zA-Z]*$/", $_POST['lName'])) {
        $lNameErr = 'only enter alphabet ';
    } elseif (empty($_POST['std'])) {
        $stdErr = 'standard shold be not empty ';
    } elseif (!preg_match("/\d/", $_POST['std'])) {
        $stdErr = 'only enter number ';
    } elseif (empty($_POST['rollNo'])) {
        $rollNoErr = 'roll No. shold be not empty ';
    } elseif ($_POST['rollNo'] <= 0) {
        $rollNoErr = 'roll No. shold greaterthan 0 ';
    } elseif (!preg_match("/\d/", $_POST['rollNo'])) {
        $rollNoErr = 'roll No. must be in digit';
    } elseif (empty($_POST['gender'])) {
        $genErr = 'gender should be not empty';
    } elseif (empty($_POST['event'])) {
        $eventErr = 'please select your event';
    } elseif (empty($_POST['mobile'])) {
        $mobileErr = 'mobile number should be not empty';
    } elseif (!preg_match("/\d/", $_POST['mobile'])) {
        $mobileErr = 'mobile number must be in digit';
    } elseif ($_POST['mobile'] <= 0) {
        $mobileErr = 'mobile No. shold greaterthan 0 ';
    } elseif (strlen($_POST['mobile']) != 10) {
        $mobileErr = 'mobile number should be 10 characters';
    } else {
        $fullName = $_POST['fName'] . " " . $_POST['mName'] . " " . $_POST['lName'];
        $std = $_POST['std'];
        $rollNo = $_POST['rollNo'];
        $gender = $_POST['gender'];
        $event = $_POST['event'];
        $mobile = $_POST['mobile'];

        $insertQuery = "INSERT INTO student (`fullName`,`standard`,`rollNo`,`gender`,`event`,`mobileNo`) VALUES ('$fullName','$std','$rollNo','$gender','$event ','$mobile')";
        if (!mysqli_query($conn, $insertQuery)) {
            echo mysqli_error($conn);
        } else {
            #fetch events from admin's data
            $fetchEvent = "SELECT * FROM events WHERE event = '$event'";
            $result = mysqli_query($conn, $fetchEvent);
            $data = mysqli_fetch_assoc($result);
            $event = $data['event'];
            $date = $data['date'];
            $time = $data['time'];
            $msg = "";
            function show()
            {

?>
                <script>
                    document.getElementById("alert").style.display = "block";
                </script>
            <?php
            }
        }
    }
}



# add events through admin
if (isset($_POST['createEvent'])) {

    $selectTable = "SELECT * FROM events";

    if (!mysqli_query($conn, $selectTable)) {
        $createTable = "CREATE TABLE events (
     id int(10) AUTO_INCREMENT not null primary key,
     event varchar(100) not null,
     date date ,
     time varchar(100) not null)";

        if (!mysqli_query($conn, $createTable)) {
            echo mysqli_error($conn);
        }
    }



    if (empty($_POST['event'])) {
        $eventErr = 'enter event';
    } elseif (empty($_POST['date'])) {
        $dateErr = 'enter date of event';
    } elseif (empty($_POST['stime'])) {
        $sTimeErr = 'enter time of start event';
    } elseif (empty($_POST['etime'])) {
        $eTimeErr = 'enter time of end event';
    } else {

        $event = $_POST['event'];
        $date = $_POST['date'];
        $stime = $_POST['stime'];
        $etime = $_POST['etime'];
        $time = $stime . ' to ' . $etime;

        $insertQuery = "INSERT INTO events (`event`,`date`,`time`) VALUES ('$event ','$date','$time')";
        if (!mysqli_query($conn, $insertQuery)) {
            echo mysqli_error($conn);
        } else { ?>

            <script>
                alert("event created successfully");
                location.replace('dashboard.php');
            </script>
<?php }
    }
}
?>