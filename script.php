<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="buslist.css"> -->
  <title>buslist</title>
   <style>
     :root{
  --orange:rgb(106, 169, 5);;
}
.heading{
  text-align: center;
  padding:2.5rem 0
}

.heading span{
  font-size: 2.3rem;

 background:rgba(255, 165, 0,.2);
 color: #ffa500;
  border-radius: .5rem;
  padding:.2rem 1rem;
}

.heading span.space{
  background:none;
}
table{
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

}
tr:nth-child(even){background-color:#f2f2f2;}
   </style>
</head>
<body>

<h1 class="heading">
      <span>b</span>
      <span>u</span>
      <span>s</span>
      <span class="space"></span>
      <span>l</span>
      <span>i</span>
      <span>s</span>
      <span>t</span>
  </h1>
  
  <table >
      <tr>
      <th>Bus No</th>
      <th>Source</th>
      <th>Destination</th>
      <th>Leaving Time</th>
      <th>Couche Type</th>
      <th>Fair</th>
     </tr>

     <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travel_agency";

    $connection = new mysqli($servername, $username, $password, $dbname);
    
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    /* echo "Successfully connected to Database.<hr><br>"; */

    
        $sql = "SELECT * FROM buslist";
        $result = $connection->query($sql);
        if($result != false && $result -> num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["BUS_NO"]."</td><td>".$row["SOURCE"]."</td><td>".$row["DESTINATION"]."</td><td>".$row["LEAVING_TIME"]."</td><td>".$row["COUCE_TYPE"]."</td><td>".$row["FAIR"]."</td></tr>";
            }
            echo '</table>';
         
        }
        $connection->close(); 
    ?> 
  </table>
  
</body>
</html>