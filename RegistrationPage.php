<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="regis.css">
  <title>Sign Up</title>
</head>
<body>
<div class="Cancel" id="Cancel">

<h1 class="heading">
    
    <span>S</span>
    <span>I</span>
    <span>G</span>
    <span>N</span>
    <span class="space"></span>
    
    <span>U</span>
    <span>P</span>
    
</h1>


<div class="row1">

  

  <form action="home copy.php" method="post">
      <div class="inputBox1">
          
          <input type="text" name="name" placeholder="Name">
      </div>
      <div class="inputBox1">
          
          <input type="number"  name="contact_number" placeholder="Contact Number">
      </div>
      <div class="inputBox1">
          
          <input type="email"  name="email" placeholder="Email">
      </div>
      <div class="inputBox1">
         
          <input type="password" class ="password"  name="password" placeholder="Password">
      </div>
      <div class="inputBox1">
          
          <input type="password" class="password"  name="confirm_password"placeholder="Confirm Password">
      </div>
      
      <div class="cancelsubmit"> <input type="submit" class="btncancel" id ="btncancel"  value="Submit"></a></div>
      
  </form>

</div>

</div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_agency"; 

$connection = new mysqli($servername, $username, $password, $dbname  );

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
echo "Successfully connected to Database.<hr><br>";

if(isset($_POST["name"])){

$name = $_POST['name'];
$contact_number = $_POST['contact_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

  $sql="INSERT INTO `registration` (`name`,  `contact_number`, `email`, `password`, `confirm_password`)
  VALUES ('$name', '$contact_number', '$email', '$password', '$confirm_password');"; 
  

   if($connection->query($sql) == true)
  {
      echo "successfull";
  }
  else {
      echo "error";
  }  
  $connection->close();


} 
?>

</body>
</html>