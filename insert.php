<?php
include 'config.php';
$event  = 'football';
// $fetchEvent = "SELECT * FROM event ";
//             $result = mysqli_query($conn, $fetchEvent);
//             $data = mysqli_fetch_assoc($result);
            

$fNameErr = $mNameErr = $lNameErr = $stdErr  = $rollNoErr = $genErr = $eventErr = $mobileErr =  $dateErr =  $timeErr = '';

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
            $fetchEvent = "SELECT * FROM events WHERE 'event' = $event";
            $result = mysqli_query($conn, $fetchEvent);
            $data = mysqli_fetch_assoc($result);
            $event = $data['event'];
            $date = $data['date'];
            $time = $data['time'];
            // function success()
            // {
            //     global $fullName;
            //     global $event;
            //     global $date;
            //     global $time;
                echo "Hello $fullName ,Thanks for your interest in event management, your chosen event is $event. Your event date is $date and time is $time";
            // }
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
     time time)";

        if (!mysqli_query($conn, $createTable)) {
            echo mysqli_error($conn);
        }
    }



    if (empty($_POST['event'])) {
        $eventErr = 'enter event';
    } elseif (empty($_POST['date'])) {
        $dateErr = 'enter date of event';
    } elseif (empty($_POST['time'])) {
        $timeErr = 'enter time of event';
    } else {

        $event = $_POST['event'];
        $date = $_POST['date'];
        $time = $_POST['time'];


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