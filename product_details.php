<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Box icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Login</title>
  </head>
  <body>
    
    <div class="navigation">
      <div class="nav-center container d-flex">
        <a href="index.html" class="logo"><h1>ShopKart</h1></a>

        <ul class="nav-list d-flex">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="product.html" class="nav-link">Shop</a>
          </li>
          
          <li class="icons d-flex">
            <a href="login.html" class="icon">
              <i class="bx bx-user"></i>
            </a>
            <div class="icon">
              <i class="bx bx-search"></i>
            </div>
            

        <div class="icons d-flex">
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
        </div>

        <div class="hamburger">
          <i class="bx bx-menu-alt-left"></i>
        </div>
      </div>
    </div>

    <!-- Product Details -->

    <section class="section product-detail">
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'project');
      $select_query='Select * from products ';
      $result_query=mysqli_query($db,$select_query);
      $row=mysqli_fetch_assoc($result_query);
      //echo $row['product_title'];
      //while($row=mysqli_fetch_assoc($result_query))
      
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $image1=$row['image1'];
        $product_description=$row['product_description'];
        $price=$row['price'];
        $brand=$row['brand'];
        $colour=$row['colour'];
        $size=$row['size'];
        echo "<div class='details container'>
        <div class='left image-container'>
          <div class='main'>
            <img src='./product_images/$image1' id='zoom' alt='' />
          </div>
        </div>
        <div class='right'>
          <span>Home/T-shirt</span>
          <h1>$product_title</h1>
          <div class='price'>$price</div>
          <form>
            <div>
            <p>  Brand : $brand
            <br> Colour : $colour </p><br>
              <select>
               
                <option value='1'>$size</option>
                <option value='2'>42</option>
                <option value='3'>52</option>
                <option value='4'>62</option>
              </select>
              <span><i class='bx bx-chevron-down'></i></span>
            </div>
          </form>
          <form class='form'>
            <input type='text' placeholder='1' />
            <a href='cart.html' class='addCart'>Add To Cart</a>
          </form>
          <h3>Product Detail</h3>
          <p>
            $product_description
          </p>
        </div>
      </div>";
      
      ?>
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
          <span><i class="bx bxl-facebook-square"></i></span>
          <span><i class="bx bxl-instagram-alt"></i></span>
          <span><i class="bx bxl-github"></i></span>
          <span><i class="bx bxl-twitter"></i></span>
          <span><i class="bx bxl-pinterest"></i></span>
        </div>
      </div>
    </footer>
    <!-- Custom Script -->
    <script src="./js/index.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.4.0.min.js"
      integrity="sha384-JUMjoW8OzDJw4oFpWIB2Bu/c6768ObEthBMVSiIx4ruBIEdyNSUQAjJNFqT5pnJ6"
      crossorigin="anonymous"
    ></script>
    <script src="./js/zoomsl.min.js"></script>
    <script>    
      $(function () {
        console.log("hello");
        $("#zoom").imagezoomsl({
          zoomrange: [4, 4],
        });
      });
    </script>
  </body>
</html>
 