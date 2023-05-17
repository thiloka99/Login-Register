<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }
        else{
            echo
            "<script> alert('Wrong Password');</script>";
        }
    }
    else{
        echo
            "<script> alert('User not Registered');</script>";
    }
} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <h2>Login</h2>
    <form class="" action="" method="post" autocomplete="off">
        <label for="usernameemail">Username or Email : </label>
        <input type="text" name="usernameemail" id="usernameemail" value="" required><br><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value=""required><br><br>
        <button type="submit" name="submit">Login</button>
    </form><br>

    <a href="registration.php">Registration</a>
</body>
</html>