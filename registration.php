<?php 
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * From tb_user WHERE username='$username' OR email='$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username or Email Has Already Taken');</script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Registration Successful');</script>";
            header("Location: login.php");
        }
        else{
            echo
            "<script> alert('password dose not match');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>
    <form class="" action="" method="post" autocomplete="off">
        <label for="name">Name :</label>
        <input type="text" name="name" id="name" value="" required><br><br>
        <label for="username">Username :</label>
        <input type="text" name="username" id="username" value="" required><br><br>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" value="" required><br><br>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" value="" required><br><br>
        <label for="confirmpassword">Confirm Password :</label>
        <input type="confirmpassword" name="confirmpassword" id="confirmpassword" value="" required><br><br> 
        <button type="submit" name="submit">Registration</button><br><br>
    </form><br>

    <a href="login.php">Login</a>


</body>
</html>