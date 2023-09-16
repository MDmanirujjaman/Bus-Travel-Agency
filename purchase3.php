<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ticket Counter</title>
  <link rel="stylesheet" href="exercise.css">
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
  <!-- book section starts  -->

<div class="book" id="book">

<h1 class="heading">
    <span>b</span>
    <span>o</span>
    <span>o</span>
    <span>k</span>
    <span class="space"></span>
    <span>n</span>
    <span>o</span>
    <span>w</span>
</h1>

<div class="row">

    <div class="image">
        <img src="images/book-img.svg" alt="">
    </div> 
 
    <form action="pdf.php" method="post">
        <div class="inputBox">
            <h3>Contact Number</h3>
            <input type="number" placeholder="Contact number" name="contact_number">
        </div>
        <div class="inputBox">
            <h3>Source</h3>
            <select name="source" id="">
                <option seleced hidden value="">select</option>  
                <option value="Dhaka">Dhaka</option>}  
                <option value="Chittagong">Chittagong</option>  
                <option value="Khulna">Khulna</option>  
                <option value="Sylhet">Sylhet</option>  
                <option value="Rajshahi">Rajshahi</option>  
                <option value="Mymensingh">Mymensingh</option>  
                <option value="Barisal">Barisal</option>  
                <option value="Rangpur">Rangpur</option>  
                <option value="Gazipur">Gazipur</option>
                <option value="Comilla">Comilla</option>
                <option value="Narayanganj	">Narayanganj	</option> 
                </select> 
        </div>
       
        <div class="inputBox">
            <h3>Destination</h3>
            <select name="destination" id="">
                <option seleced hidden value="">select</option>  
                <option value="Dhaka">Dhaka</option>}  
                <option value="Chittagong">Chittagong</option>  
                <option value="Khulna">Khulna</option>  
                <option value="Sylhet">Sylhet</option>  
                <option value="Rajshahi">Rajshahi</option>  
                <option value="Mymensingh">Mymensingh</option>  
                <option value="Barisal">Barisal</option>  
                <option value="Rangpur">Rangpur</option>  
                <option value="Gazipur">Gazipur</option>
                <option value="Comilla">Comilla</option>
                <option value="Narayanganj	">Narayanganj	</option> 
                </select> 
                
        </div>
        <div class="inputBox">
            <h3>Number of seats</h3>
            <select name="number_of_seats" id="">
                <option seleced hidden value="">select number of seats</option>  
                <option value="1">1</option>
                <option value="2">2</option>  
                <option value="3">3</option>  
                <option value="4">4</option>  
                
           
            </select>
        </div> 
        
        <div class="inputBox">
            <h3 class="label"> leaving Time</h3>
            <select name="time" id="">
                <option seleced hidden value="">select time</option>  
                <option value="12">12 pm</option>}  
                <option value="13">01 pm</option>  
                <option value="14">02 pm</option>  
                <option value="15">03 pm</option>  
                <option value="16">04 pm</option>  
                <option value="17">05 pm</option>  
                <option value="18">06 pm</option>  
                <option value="19">07 pm</option>  
                <option value="20">08 pm</option>
                <option value="20">08 pm</option>
                <option value="21">09 pm</option>  
                <option value="22">10 pm</option>
                <option value="23">11 pm</option>  
                <option value="00">12 am </option>  
                <option value="6"> 06 am</option>  
                <option value="7">07 am</option>  
                <option value="8">08 am </option>  
                <option value="9">09 am</option>  
                <option value="10">10 am</option>
                <option value="11">11 am</option>
           
            </select>
         </div>
         <div class="inputBox">
              <h3 class="label">Couch Type</h3> 
              <select name="couch_type" id="">
                  <option seleced hidden value="">select</option>  
                  <option value="AC">AC</option>}  
                  <option value="NON-AC">NON-AC</option>  
                  
                  </select> 
          </div>
       
        
        <input type="submit" class="btn" value="book now" name="submit">
    </form>

  


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

if(isset($_POST['contact_number'])){

$contact_number = $_POST['contact_number'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$leavingtime = $_POST['time'];
$number_of_seats = $_POST['number_of_seats'];
$couch_type = $_POST['couch_type']; 




$q="select * from registration where contact_number='$contact_number'";
$result=mysqli_query($connection,$q);
$num=mysqli_num_rows($result);
if($num==1)
{ 
    
    
  
 $qq="select * from buslist where SOURCE='$source' && DESTINATION='$destination' && LEAVING_TIME='$leavingtime' ";
$resultt=mysqli_query($connection,$qq);
$numm=mysqli_num_rows($resultt);
if($numm==1)
{    
    
  if($source!=$destination){
    $sql="INSERT INTO `p2` (`CONTACT_NUMBER`, `SOURCE`, `DESTINATION`,`NO_OF_SEATS`,`LEAVING_TIME`,`COUCH_TYPE`)
    VALUES ('$contact_number', '$source', '$destination','$number_of_seats','$leavingtime','$couch_type');"; 
    
    
    if($connection->query($sql) == true)
    {
        echo '<table><tr>
        <th>Successfull ticket booked</th>
        </tr></table>';
    }
    else {
      
        echo '<table><tr>
        <th>Not booked</th>
        </tr></table>';
    }  
    }
    else{
        echo '<table><tr>
        <th>Source and destination same</th>
        </tr></table>';
    }

    header("location:pdf.php");
 
    
}
else{

    echo '<table><tr>
    <th>Bus Not Available</th>
    </tr></table>';
     
} 




}
    

else{

    echo '<table><tr>
    <th>Log In Or Register First</th>
    </tr></table>';
     
}
$connection->close();

}



?> 


</body>
</html>