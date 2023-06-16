<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="flex">

      <a href="admin_products.php" class="logo"><span>BRGR</span>Mania</a>

      <nav class="navbar">
         <a href="admin_products.php">HOME</a>
         <a href="admin_users.php">MANAGE USER</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <a  style="color: white; font-size:2rem;" href="logout.php">
            LOGOUT
         </a>
      </div>

   </div>

</header>
