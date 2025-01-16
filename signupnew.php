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
    <link rel="stylesheet" href="css/styles.css" />
    <title>Sign Up</title>
  </head>
  <body>

    <div class="navigation">
      <div class="nav-center container d-flex">
        <a href="index.html" class="logo"><h1>ShoeKart</h1></a>

        <ul class="nav-list d-flex">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          

          <li class="icons d-flex">
            <a href="login.html" class="icon">
              <i class="bx bx-user"></i>
            </a>

          </li>
        </ul>

        <div class="icons d-flex">
          <a href="loginnew.php" class="icon">
            <i class="bx bx-user"></i>
          </a>
          
        </div>

        <div class="hamburger">
          <i class="bx bx-menu-alt-left"></i>
        </div>
      </div>
    </div>
    <!-- Login -->
    <div class="container">
      <div class="login-form">
      <form method="post" action="signupnew.php">
          <h1>Sign Up</h1>
          <p>
            Please fill in this form to create an account. or
            <a href="loginnew.php">Login</a>
          </p>
          <form method="post" action="signupnew.php">

          <?php include('errors.php'); ?>

          <label for="email"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" value="<?php echo $username; ?>"> 
          
          <label for="email"><b>Email</b></label>
          <input type="email" placeholder="Enter Email" name="email" required />

          <label for="email"><b>Name</b></label>
          <input type="text" placeholder="Enter Name" name="name" required />

          <label for="email"><b>Mobile No.</b></label>
          <input type="text" placeholder="Enter Mobile No" name="mob" required />

          <label for="email"><b>Address line</b></label>
          <input type="text" placeholder="Enter Address" name="address" required />

          <label for="email"><b>City</b></label>
          <input type="text" placeholder="Enter City" name="city" required />

          <label for="email"><b>District</b></label>
          <input type="text" placeholder="Enter District" name="dist" required />

          <label for="email"><b>State</b></label>
          <input type="text" placeholder="Enter State" name="state" required />

          <label for="email"><b>Pincode</b></label>
          <input type="text" placeholder="Enter Pincode" name="pincode" required />

          <label for="psw"><b>Password</b></label>
          <input
            type="password"
            placeholder="Enter Password"
            name="password_1"
            required
          />

          <label for="psw-repeat"><b>Confirm Password</b></label>
          <input
            type="password"
            placeholder="Confirm Password"
            name="password_2"
            required
          />

          <label>
            <input
              type="checkbox"
              checked="checked"
              name="remember"
              style="margin-bottom: 15px"
            />
            Remember me
          </label>

          <p>
            By creating an account you agree to our
            <a href="#">Terms & Privacy</a>.
          </p>

          <div class="buttons">
            <button type="button" class="cancelbtn">Cancel</button>
            <button  type="submit" class="signupbtn" name="reg_user">Sign Up</button>
          </div>
        </form>
      </div>
    </div>

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
