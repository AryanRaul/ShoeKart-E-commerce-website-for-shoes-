<?php include('server.php') 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <!-- Boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- Glide js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="./css/styles.css" />
    <title>ShoeKart</title>
  </head>
  <body>
    <!-- Header -->
    <header class="header" id="header">      
      <div class="navigation">
        <div class="nav-center container d-flex">
        <a href="/" class="logo"><h1>ShoeKart</h1></a>

          <ul class="nav-list d-flex">
            <li class="nav-item">
            <!-- <a href="index.php" class="nav-link">Home</a> -->
            </li>
            
            
            <li class="icons d-flex">
            <a href="cart.html" class="icon">
              <i class="bx bx-cart"></i>
            </a>
            <a href="loginnew.php" class="icon">
              <i class="bx bx-user"></i>
            </a>
            <div class="icon">
              <i class="bx bx-search"></i>
            </div>
            <div class="icon">
              <i class="bx bx-heart"></i>
              <span class="d-flex">0</span>
            </div>
            <a href="cart.html" class="icon">
              <i class="bx bx-cart"></i>
              <span class="d-flex">0</span>
            </a>
          </li>
          </ul>

          <div class="icons d-flex">
          <a href="cart.php" class="icon">
              <i class="bx bx-cart"></i>
            </a>
            <a href="loginnew.php" class="icon">
              <i class="bx bx-user"></i>
            </a>
            <!-- <div class="icon">
              <i class="bx bx-search"></i>
            </div> -->
            <div class="content">
  	
 <?php
         if(!isset($_SESSION['username'])){
         echo "
         <li class='nav-item' >
        <a  class='nav-link' >Welcome Guest</a>
        </li>";
            }
             else{
            echo
           "<li class='nav-item' >
              <a class='nav-link' href='#'> Welcome ".$_SESSION['username']."</a>
             </li>";
                 }
                 ?>
                 <?php
if(!isset($_SESSION['username'])){
echo "
<li class='nav-item' >
<a class= 'nav-link' href='loginnew.php'>Login</a>
</li>";
}else{
echo"<li class='nav-item' >
<a class= 'nav-link' href='logout.php'>Logout</a>
</li>";
}
?>

      </div>

          <div class="hamburger">
            <i class="bx bx-menu-alt-left"></i>
          </div>
        </div>
      </div>

    <div class="hero">
      <div class="glide" id="glide_1">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide">
              <div class="center">
                <div class="left">
                  <img src="./images/adidas2.png" width="140" height="90">
                  <h1 class=""><p><font color="white"><font size="16">THE PERFECT MATCH!</font></font></p></h1>
                  
                  <p>                                                   </p>
                  <p>                                                   </p>
                  <p>                                                   </p>
                </div>
                <div class="right">
                    <img class="img1" src="./images/shoe1.png" alt="">
                </div>
              </div>
            </li>
            <li class="glide__slide">
              <div class="center">
                <div class="left">
                  <img src="./images/nikelogo.png" width="140" height="80">                  
                  <h1><font color="white"><p><font size="12">NEW COLLECTION!</font></p></font></h1>
                </div>
                <div class="right">
                  <img class="img2" src="./images/nike2.png" alt="">
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </header>

    

    <!-- New Arrivals -->
    <section class="section new-arrival">
      <div class="title">
        <h1>NEW ARRIVALS</h1>
        <p>All the latest picked from designer of our store</p>
      </div>

      <?php
      $db = mysqli_connect('localhost', 'root', '', 'project');
      $select_query="Select * from products";
      $result_query=mysqli_query($db,$select_query);
      //$row=mysqli_fetch_assoc($result_query);
      //echo $row['product_title'];
      while($row=mysqli_fetch_assoc($result_query))
      {
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $image1=$row['image1'];
        $price=$row['price'];
        $brand=$row['brand'];
        echo " 
        <div class='product-center'>
        <div class='product-item'>
          <div class='overlay'>
            <a href='product_details.php?product_id=$product_id' class='product-thumb'>
              <img src='./product_images/$image1' alt='' />
            </a>
          </div>
          <div class='product-info'>
            <span><b>$brand</b></span>
            <a  href='product_details.php?id=$product_id'> $product_title</a>
            <h4>$price</h4>
            <div class='buttonss'>
            <a class='checkout btn' href='index.php?add_to_cart=$product_id'>Add to Cart
            </a>
          
            </div>
          </div>
        </div>
        </div>
        </section>";
        
     }
        ?> 
   

    <?php 
    //ip function 
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  
?>  

    <?php
  //cart function
      $db = mysqli_connect('localhost', 'root', '', 'project');
if(isset($_GET['add_to_cart'])){
  global $db;
  $get_ip_add = getIPAddress();
  $get_product_id=$_GET['add_to_cart'];
  $select_query="Select * from cart_details where ip_address='$get_ip_add' and product_id=$get_product_id";
  $result_query=mysqli_query($db,$select_query);
  $num_of_rows=mysqli_num_rows ($result_query);
 if($num_of_rows>0){
   echo"<script>alert('This item is already present inside cart')</script>";
   echo"<script>window.open ('index.php' ,' _self')</script>";
}else{
   $insert_query="insert into cart_details (product_id, ip_address,quantity) values 
   ($get_product_id,'$get_ip_add',0)";
   $result_query=mysqli_query($db,$insert_query);
   if($result_query){
    echo "<script>alert('Successfully Added to Cart')</script>";

}else{
   echo "<script>window.open('index.php','_self')</script>";
}
}
}

?>


    <!-- Promo -->

    <section class="section banner">
<div class="left">
  <span class="trend"><p><font size="6">The Souled Store</font></p></span>
  <h1>NEW ONE!</h1>
</div>
<div class="right">
  <img src="./images/deadpl1.png" alt="" width="20" height="460">
</div>
    </section>




    

    

    <!-- Footer -->
    <footer class="footer">
      <div class="row">
        <div class="col d-flex">
          <h4>INFORMATION</h4>
          <a href="">About us</a>
          <a href="">Contact Us</a>
          <a href="">Term & Conditions</a>
          <a href="">Shipping Guide</a>
        </div>
        <div class="col d-flex">
          <h4>USEFUL LINK</h4>
          <a href="">Online Store</a>
          <a href="">Customer Services</a>
          <a href="">Promotion</a>
          <a href="">Top Brands</a>
        </div>
        <div class="col d-flex">
          <span><i class='bx bxl-facebook-square'></i></span>
          <span><i class='bx bxl-instagram-alt' ></i></span>
          <span><i class='bx bxl-github' ></i></span>
          <span><i class='bx bxl-twitter' ></i></span>
          <span><i class='bx bxl-pinterest' ></i></span>
        </div>
      </div>
    </footer>


 
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
  <script src="./js/slider.js"></script>
  <script src="./js/index.js"></script>
</html>
