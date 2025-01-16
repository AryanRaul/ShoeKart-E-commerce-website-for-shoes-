<?php 
include('server.php')
   

?>
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'project');
 
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
    <title>Your Cart</title>
  </head>
  <body>
    <!-- Navigation -->
    <div class="top-nav">
      <div class="container d-flex">
        <ul class="d-flex">
          <li><a href="#">About Us</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
    </div>
    <div class="navigation">
      <div class="nav-center container d-flex">
        <a href="index.html" class="logo"><h1>ShoeKart</h1></a>

        <ul class="nav-list d-flex">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <!-- <li class="nav-item">
            <a href="product.html" class="nav-link">Shop</a>
          </li>
          <li class="nav-item">
            <a href="#terms" class="nav-link">Terms</a>
          </li>
          <li class="nav-item">
            <a href="#about" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="#contact" class="nav-link">Contact</a>
          </li> -->
          <li class="icons d-flex">
            <a href="login.html" class="icon">
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
          <a href="loginnew.php" class="icon">
            <i class="bx bx-user"></i>
          </a>
          <!-- <div class="icon">
            <i class="bx bx-search"></i>
          </div> -->
          <!-- <div class="icon">
            <i class="bx bx-heart"></i>
            <span class="d-flex">0</span>
          </div> -->
          <a href="cart.php" class="icon">
            <i class="bx bx-cart"></i>
            <span class="d-flex">0</span>
          </a>
        </div>

        <div class="hamburger">
          <i class="bx bx-menu-alt-left"></i>
        </div>
      </div>
    </div>
    
    <!-- Cart Items -->
    <div class="container cart">
    <form action="" method="post">  
    <table>
        <tr>
          <th>Product</th>
          <!-- <th>Description</th>
          <th>Quantity</th>
          <th>Checkbox</th> -->
          <th>Subtotal</th>
        </tr>
        <?php
        //dynamic data
        $db = mysqli_connect('localhost', 'root', '', 'project');

        global $db;
$get_ip_add = getIPAddress();
$total_price=0;
$cart_query="Select * from cart_details where ip_address='$get_ip_add'";
$result=mysqli_query($db,$cart_query);
while($row = mysqli_fetch_array($result)){
 $product_id=$row['product_id'];
 $select_products="Select * from products where product_id='$product_id'";
 $result_products=mysqli_query($db,$select_products);
 while($row_price=mysqli_fetch_array($result_products))
 {
   $price = array($row_price['price']);
   $price_table=$row_price['price'];
   $product_title=$row_price['product_title'];
   $image1=$row_price['image1'];
   $product_values=array_sum($price); // [500]
   $total_price+=$product_values; 
  



        
    echo"    <tr>
          <td>
            <div class='cart-info'>
              <img src='./product_images/$image1' alt='' />
              <div>
               <p>$product_title</p>    
               <span>Price:$price_table</span> <br>
                </div>
                </div>
              
              </td>";?>
               
             
           <!-- <td><input type='text' name='qty' value=''  /></td> -->
          <?php
          $get_ip_add = getIPAddress();
        if(isset($_POST['update_cart'])){
          $quantities=$_POST['qty'];
          $db = mysqli_connect('localhost', 'root', '', 'project');
          $update_query="update 'cart_details' set quantity=$quantities where 
          ip_address='$get_ip_add'";
          $result_products=mysqli_query($db,$update_query);
          $total_price=$total_price*$quantities;
        }?>

           <!-- <td><input type="checkbox" name="removeitem" value'></td>
           <td> -->
            <!-- <input type="submit" value="update_cart" class='checkout btn' name="update_cart"> -->
           <!-- </td> -->
           <?php echo"<td>$price_table</td>  
           </tr>";
        }
      }
      ?> 
             
          <?php
    $db = mysqli_connect('localhost', 'root', '', 'project');
    // $remove_id=$product_id;
          function remove_cart(){
            global $db;
          if(isset($_POST['remove'])){
            $removeitem= $_POST['remove_id'];
            foreach($_POST['removeitem'] as $remove_id ){
              echo $remove_id;
            $delete_query="delete from cart_details where product_id=$remove_id";
            $run_query=mysqli_query($db,$delete_query);
            if($run_query){
              echo"<script>window.open('cart.php','_self')</script>";
            }
          }}}
          echo $remove_item=remove_cart();
          
          
         
          ?>
          
          
        


      
          
        

        </tr>
      </table>
      <div class='total-price'>
        <table>
          <tr>
            <td>Subtotal</td>
           <?php
           echo"
           <td>$total_price</td>";
           ?>
          </tr>
         
        </table>
        <a href='payment.php' class='checkout btn'>Proceed To Checkout</a>
      </div>
    </div>
        </form>


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
