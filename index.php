<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
              <title>PROJECT KAY SIR JARED</title>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/main.css">
  </head>
  <body>
    <div class="main">
      <div class="nav-main">
        <div class="logo-container">
          <img src="./assets/images/home-logs.png" alt="home logo" />
        </div>
        <div class="hamburger-container show" id="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <ul class="menu-container" id="menus">
          <li><a href="#home" class="text-white">Home</a></li>
          <li><a href="#products" class="text-white">Products</a></li>
          <li><a href="product.php" class="text-white">Shop</a></li>
          <li><a href="#contacts" class="text-white">Calculator</a></li>
          </ul>
          <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
          ?> 
            <li style="list-style:none;">
            <span class="bg-black mr-3" style="font-size: 25px;" id="span">[ <?php echo $cart_rows_number; ?> ]</span>
            <a href="cart.php"
              ><img
                src="./assets/images/home-cart-icon.png"
                alt="home cart icon"
            /></a>
          </li>
          <li style="list-style:none; margin-left:30px;">
            <a href="logout.php"
              ><img
                src="./assets/images/home-admin-icon.png"
                alt="home user icon"
            /></a>
          </li>
          
      </div>
      <div class="home-section" id="home">
        <div class="hero-main">
          <div class="hero-text-container">
            <h1><span>Brgr</span> Mania</h1>
            <p>At BurgerMania, we believe that a great burger is more than just a meal - it's an experience. Our mission is to satisfy your cravings and bring you the most delicious, mouthwatering burgers you've ever tasted.</p>
            <button>Order Now!</button>
          </div>
          <div class="hero-image-container">
            <img src="./assets/images/home-hero-img.png" alt="home burger" />
          </div>
        </div>
      </div>
      <div class="products-section" id="products">
        <h2>START YOUR <span>ORDER TODAY</span></h2>
        <div class="products-list">
          <div class="product">
            <div class="hover-details">
              <div class="price-container">
                <p>Classic <span>Burger</span></p>
                <p>PHP 45.00</p>
              </div>
              <div class="image-container">
                <img
                  src="./assets/images/products-cart-icon.png"
                  alt="product cart icon"
                />
              </div>
            </div>
            <div class="burger-container">
              <div class="image-container">
                <img
                  src="./assets/images/products-classic-burger.png"
                  alt="product classic burger"
                />
              </div>
              <p>Classic <span>Burger</span></p>
            </div>
            <div class="price-container">
              <p>PHP 45.00</p>
              <div class="image-container">
                <img
                  src="./assets/images/products-cart-icon.png"
                  alt="product cart icon"
                />
              </div>
            </div>
          </div>
          <div class="product">
            <div class="hover-details">
              <div class="price-container">
                <p>Classic <span>Spicy Burger</span></p>
                <p>PHP 45.00</p>
              </div>
              <div class="image-container">
                <img
                  src="./assets/images/products-cart-icon.png"
                  alt="product cart icon"
                />
              </div>
            </div>
            <div class="burger-container">
              <div class="image-container">
                <img
                  src="./assets/images/products-classic-burger.png"
                  alt="product classic burger"
                />
              </div>
              <p>Classic <span>Spicy Burger</span></p>
            </div>
            <div class="price-container">
              <p>PHP 45.00</p>
              <div class="image-container">
                <img
                  src="./assets/images/products-cart-icon.png"
                  alt="product cart icon"
                />
              </div>
            </div>
          </div>
          <div class="product">
            <div class="hover-details">
              <div class="price-container">
                <p>BBQ <span>Burger</span></p>
                <p>PHP 60.00</p>
              </div>
              <div class="image-container">
                <img
                  src="./assets/images/products-cart-icon.png"
                  alt="product cart icon"
                />
              </div>
            </div>
            <div class="burger-container">
              <div class="image-container">
                <img
                  src="./assets/images/products-bbq-burger.png"
                  alt="product bbq burger"
                />
              </div>
              <p>BBQ <span>Burger</span></p>
            </div>
            <div class="price-container">
              <p>PHP 60.00</p>
              <div class="image-container">
                <img
                  src="./assets/images/products-cart-icon.png"
                  alt="product cart icon"
                />
              </div>
            </div>
          </div>
          <div class="product">
            <div class="hover-details">
              <div class="price-container">
                <p>Crispy <span>Burger</span></p>
                <p>PHP 50.00</p>
              </div>
              <div class="image-container">
                <img
                  src="./assets/images/products-cart-icon.png"
                  alt="product cart icon"
                />
              </div>
            </div>
            <div class="burger-container">
              <div class="image-container">
                <img
                  src="./assets/images/products-crispy-burger.png"
                  alt="product crispy burger"
                />
              </div>
              <p>Crispy <span>Burger</span></p>
            </div>
            <div class="price-container">
              <p>PHP 50.00</p>
              <div class="image-container">
                <img
                  src="./assets/images/products-cart-icon.png"
                  alt="product cart icon"
                />
              </div>
            </div>
          </div>
          <div class="product">
            <div class="hover-details">
              <div class="price-container">
                <p>Flame Grilled <span>Burger</span></p>
                <p>PHP 60.00</p>
              </div>
              <div class="image-container">
                <img
                  src="./assets/images/products-cart-icon.png"
                  alt="product cart icon"
                />
              </div>
            </div>
            <div class="burger-container">
              <div class="image-container">
                <img
                  src="./assets/images/products-flame-grilled-burger.png"
                  alt="product flame grilled burger"
                />
              </div>
              <p>Flame Grilled <span>Burger</span></p>
            </div>
            <div class="price-container">
              <p>PHP 60.00</p>
              <div class="image-container">
                <img
                  src="./assets/images/products-cart-icon.png"
                  alt="product cart icon"
                />
              </div>
            </div>
          </div>
          <div class="product">
            <div class="hover-details">
              <div class="price-container">
                <p>Grilled <span>Burger</span></p>
                <p>PHP 40.00</p>
              </div>
              <div class="image-container">
                <img
                  src="./assets/images/products-cart-icon.png"
                  alt="product cart icon"
                />
              </div>
            </div>
            <div class="burger-container">
              <div class="image-container">
                <img
                  src="./assets/images/products-grilled-burger.png"
                  alt="product flame grilled burger"
                />
              </div>
              <p>Grilled <span>Burger</span></p>
            </div>
            <div class="price-container">
              <p>PHP 40.00</p>
              <div class="image-container">
                <img
                  src="./assets/images/products-cart-icon.png"
                  alt="product grilled icon"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="contacts-section" id="contacts">
        <div class="image-container">
          <img
            src="./assets/images/contacts-bacon-burger.png"
            alt="contacts bacon burger"
          />
        </div>
        <div class="form-container">
          <div class="form-wrapper">
            <h1><span>Calcu</span> here</h1>
            <input type="text" name="price" id="price" placeholder="ENTER AMOUNT" />
            <input type="text" name="price" id="price" placeholder="ENTER AMOUNT" />
            <input type="text" name="price" id="price" placeholder="ENTER AMOUNT" />
            <input type="text" name="price" id="price" placeholder="ENTER AMOUNT" />
            <input type="text" name="price" id="price" placeholder="ENTER AMOUNT" />
            <input type="text" name="price" id="price" placeholder="ENTER AMOUNT" />
            <textarea placeholder="TOTAL AMOUNT" id="totalAmount"></textarea>
            <input type="submit" value="COMPUTE" onclick="getTotal()">
          </div>
        </div>
      </div>
      <div class="footer-section">
        <div class="content">
          <div class="about-wrapper">
            <h2>ABOUT</h2>
            <a href="#" class="text-white">FAQs</a>
            <a href="#" class="text-white">Terms & Conditions</a>
          </div>
          <div class="logo-wrapper">
            <div class="image-container">
              <img src="./assets/images/home-logs.png" alt="footer logo" />
            </div>
            <a href="#" class="text-white">www.BrgrMania.com</a>
          </div>
          <div class="contacts-wrapper">
            <div class="content">
              <h2>CONTACTS</h2>
              <p>(+63) 9123456789</p>
              <div class="icon-wrapper">
                <div class="icon-container">
                  <img src="./assets/images/footer-fb-icon.png" alt="fb logo" />
                </div>
                <div class="icon-container">
                  <img
                    src="./assets/images/footer-youtube-icon.png"
                    alt="youtube logo"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="divider"></div>
          <p class="copyright">© 2023 Project Sir Jared </p>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="JS/main.js"></script>
    <script type="text/javascript" src="JS/bootstrap.bundle.min.js"></script>
  </body>
</html>
