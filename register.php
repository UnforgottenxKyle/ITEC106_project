<?php
include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
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
    <link rel="stylesheet" href="CSS/register.css">
    <title>REGISTER FORMS</title>
</head>
<body>
    <div class="main">
        <div class="forms">
            <h1>REGISTER HERE!</h1>
            <form action="" method="post">
                <div class="box1">
                    <input type="text" name="name">
                    <label for="">FIRSTNAME</label>
                </div>
                <div class="box1">
                <input type="email" name="email">
                    <label for="">EMAIL</label>
                </div>
                <div class="box1">
                <input type="password" name="password">
                    <label for="">PASSWORD</label>
                </div>
                <div class="box1">
                <input type="password" name="cpassword">
                    <label for="">CONFIRM PASSWORD</label>
                </div>
                <div class="box2">
                    <input type="submit" name="submit" value="REGISTER">
                </div>
                <select name="user_type" class="box">
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                </select>
                <p style="color: aliceblue;">already have an account? <a style="color: yellow;" href="login.php">login now</a></p>
                
        </div>
    </div>
</body>
</html>