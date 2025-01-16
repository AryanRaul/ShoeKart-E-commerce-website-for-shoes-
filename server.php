<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $mob = mysqli_real_escape_string($db, $_POST['mob']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $dist = mysqli_real_escape_string($db, $_POST['dist']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $uppercase = preg_match('@[A-Z]@',$password_1);
  $lowercase = preg_match('@[a-z]@',$password_1);
  $number = preg_match('@[0-9]@',$password_1);
  $special_char = preg_match('@[^\w]@',$password_1);

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    { array_push($errors, "*INVALID EMAIL"); }
  }
  if (empty($password_1)) { array_push($errors, "Password is required"); } 
  if (strlen($password_1) < 8)
   { array_push($errors, "*Password should be atleast 8 characters in length"); }
  if (!$uppercase)
   { array_push($errors, "*Password should contain one UPPERCASE letter"); }
  if (!$lowercase)
   { array_push($errors, "*Password should contain one lowercase letter"); }
  if (!$number)
   { array_push($errors, "*Password should contain one number"); }   
  if (!$special_char)
   { array_push($errors, "*Password should contain one special character"); }
  if ($password_1 != $password_2) {array_push($errors, "The two passwords do not match");}

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result); 
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }


  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO users (username, email, name, mob, address, city, dist, state, pincode ,password ) 
  			  VALUES('$username', '$email','$name', '$mob', '$address', '$city', '$dist', '$state', '$pincode' ,'$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now Registered";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = " ";
  	header('location: index.php');
  }

  
}
if(isset($_POST['insert_product'])){

  $product_title=$_POST['product_title'];
  $product_description=$_POST['product_description'];
  $brand=$_POST['brand'];
  $colour=$_POST['colour'];
  $size=$_POST['size'];
  $price=$_POST['price'];
  $product_status='true';

  $image1=$_FILES['image1']['name'];
  // $image2=$_FILES['image2']['name'];
  // $image3=$_FILES['image3']['name'];

  $temp_image1=$_FILES['image1']['tmp_name'];
  // $temp_image2=$_FILES['image2']['tmp_name'];
  // $temp_image3=$_FILES['image3']['tmp_name'];

  if($product_title=='' or $product_description=='' or $brand==''or 
  $colour=='' or $size=='' or $price=='' or $image1==''){
      echo "<script>alert('Please fill all given fields')</script>";
      exit();
  }else{
      move_uploaded_file($temp_image1,"./product_images/$image1");
      // move_uploaded_file($temp_image2,"./product_images/$image2");
      // move_uploaded_file($temp_image3,"./product_images/$image3");


      $insert_product="INSERT INTO products(product_title,product_description,
      brand,colour,size,image1,price) VALUES 
      ('$product_title','$product_description','$brand','$colour','$size',
      '$image1','$price')";
      $result_query=mysqli_query($db,$insert_product); 

      if($result_query){
          echo "<script>alert('Successfully Added the Product')</script>";

      }

  }


}

// ADMIN LOGIN USER
// if (isset($_POST['login_admin'])) {
//   $username_ad = mysqli_real_escape_string($db, $_POST['username_ad']);
//   $password = mysqli_real_escape_string($db, $_POST['password']);

//   if (empty($username_ad)) {
//   	array_push($errors, "Username is required");
//   }
//   if (empty($password)) {
//   	array_push($errors, "Password is required");
//   }
//   if (count($errors) == 0) {
//   	$password = md5($password);

//   	$query = "Select * from admin ";
//   	mysqli_query($db, $query);
//   if()  
//   	$_SESSION['username_ad'] = $username_ad;
//   	$_SESSION['success'] = " ";
//   	header('location: adminportal.php');
//   }

  
// }
?>