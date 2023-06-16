<?php

include 'config.php';
session_start();

if(isset($_POST['login'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_products.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:index.php');

      }

   }else{
        echo "<script>alert('wrong email and password')</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/login.css">
    <title>LOGIN FORMS</title>
</head>
<body>
    <div class="main">
        <div class="forms">
            <h1>LOGIN HERE!</h1>
            <form action="" method="post">
                <div class="box1">
                    <input type="text" name="email" id="">
                    <label for="">EMAIL</label>
                </div>
                <div class="box1">
                    <input type="password" name="password" id="">
                    <label for="">PASSWORD</label>
                </div>
                <div class="box2">
                    <input type="submit" name="login" value="LOGIN">
                </div>
                <p style="color: aliceblue;">don't have an account? <a style="color: yellow;" href="register.php">register now</a></p>
            </form>
        </div>
    </div>
</body>
</html>