<?php 
include('server.php')
   

?>

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
    <title>Insert Products</title>
  </head>
  <body>
    
    <div class="navigation">
      <div class="nav-center container d-flex">
        <a href="index.html" class="logo"><h1>ShopKart</h1></a>

        <ul class="nav-list d-flex">
          <li class="nav-item">
            <a href="index.html" class="nav-link">Home</a>
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
    <div class="container">
      <div class="login-form">
      <h1>INSERT PRODUCTS</h1>
      <form method="post" action="" enctype="multipart/form-data">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title"
            id="product_title" class="form-control"
            placeholder="Enter Product Title" autocomplete="off"
            required="required"><br>

            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description"
            id="product_description" class="form-control"
            placeholder="Enter Product Description" autocomplete="off"
            required="required"><br>
        
            <label for="brand" class="form-label">Brand</label>
            <input type="text" name="brand"
            id="product_brand" class="form-control"
            placeholder="Enter Product Brand" autocomplete="off"
            required="required"><br>

            <label for="colour" class="form-label">Colour</label>
            <input type="text" name="colour"
            id="product_colour" class="form-control"
            placeholder="Enter Product Colour" autocomplete="off"
            required="required"><br>

            <label for="size" class="form-label">Size</label>
            <input type="text" name="size"
            id="product_size" class="form-control"
            placeholder="Enter Product Size" autocomplete="off"
            required="required"><br>

            <label for="image1" class="form-label">Product Image1</label>
            <input type="file" name="image1"
            id="image1" class="form-control"
            required="required"><br>



            <label for="price" class="form-label">Product Price</label>
            <input type="text" name="price"
            id="price" class="form-control"
            placeholder="Enter Product Price" autocomplete="off"
            required="required"><br>

            <div class="buttons">
            <button type="button" class="cancelbtn">Reset</button>
            <button type="submit" class="signupbtn" name="insert_product">Add Product</button>
          </div>
            


        </div></form>
        
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
  </body>
</html>
