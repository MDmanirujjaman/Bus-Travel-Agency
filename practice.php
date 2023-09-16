<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="login.css">
  <style> table{
  border-collapse:collapse;
  width:100%;
  color:#d96459;
  font-family:monospace;
  font-size:25px;
  text-align:left;

}
th{
  background-color:#588c7e;
  color:white;

}</style>
</head>
<body>
<form action="" method="post">
  <div class="imgcontainer">
    <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
    <h1 class="heading">
    
    <span>L</span>
    <span>O</span>
    <span>G</span>
    <span>I</span>
    <span>N</span>
    
    
</h1>
  </div>

  <div class="container">
    <label for="uname"><b>Contact Number</b></label>
    <input type="number" placeholder="Enter Contact Number" name="contact_number" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit" name="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">  <a href="home.php">Cancel</a> </button>
    <span class="psw">Forgot <a href="#">password?</a></span><br>
    <span class="psw">don't have any account? <a href="registration.php" target=null>register now</a></span>
  </div>
</form>
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

if(isset($_POST["submit"])){



$contact_number = $_POST['contact_number'];
$password = $_POST['password'];

$q="select * from registration where contact_number='$contact_number' && password = '$password'";

$result=mysqli_query($connection,$q);
$num=mysqli_num_rows($result);
if($num==1)
{    
  $row = $result->fetch_assoc();
  $name= $row["password"];
  echo $name;
    
}
else{
  echo '<table><tr>
  <th>wrong password /contact_number</th>
  
  
</tr></table>';
     
}

  
  
  $connection->close();


}  

?>
</body>
</html>