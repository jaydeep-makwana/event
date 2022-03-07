<?php
include 'config.php';
session_start();

# admin login logic

if (isset($_SESSION['id'])) {
    header('location:dashboard.php');
}
if (isset($_COOKIE['id'])) {
    header('location:dashboard.php');
}

# select data form admin table and create table if not exist
$selectTable = "SELECT * FROM admin ";
$tblQuery = mysqli_query($conn, $selectTable);
$fetch_array = mysqli_fetch_assoc($tblQuery);

if (!$tblQuery) {
    $createTable = "CREATE TABLE  admin ( id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, userName varchar(100) NOT NULL, password varchar(100) NOT NULL )";
    if (!mysqli_query($conn, $createTable)) {
        echo mysqli_errno($conn);
    }
}

# admin login with session and cookie
$loginErr = '';
if (isset($_POST['submit'])) {

    if (empty($_POST['userName']) || empty($_POST['password'])) {

        $loginErr = "username and password required";
    } else {


        $uname = $_POST['userName'];
        $pass = $_POST['password'];


        if ($uname == $fetch_array['userName'] && $pass == $fetch_array['password']) {
            $_SESSION['id'] = $fetch_array['id'];
            setcookie('id', $fetch_array['id'], time() + 60 * 10);
            header('location:dashboard.php');
        } else {
            $loginErr = "username or password invalid";
        }
    }
}


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
    <link rel="stylesheet" href="./assets/./CSS/./style.css">
    <link rel="stylesheet" href="./assets/./bootstrap-4.6.1-dist/./css/./bootstrap.min.css">
    <title> login</title>
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

    <div class="container w-25 border mt-5">
    <form method="post">
                <h1 class="text-center p-3"> Admin Log in</h1>
                <small class="red"><?php echo $loginErr; ?></small>

                <div class="form-group">
                    <label for="" class="">User Name</label>
                    <input class="form-control" type="text" name="userName" value="<?php setValue('userName'); ?>">
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input class="form-control" type="text" id="password" name="password" value="<?php setValue('password'); ?>">
                </div>

                <div class="form-check showPassword">
                    <input type="checkbox" class="form-check-input" id="asignInPass">
                    <label for="asignInPass" class="form-check-label">show password</label>
                </div>

                <input type="submit" name="submit" value='Log in' class="btn btn-primary">

            </form>
    </div>
</body>
</html>

