<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_agency"; 

$connection = new mysqli($servername, $username, $password, $dbname  );

if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

   if(!empty($_POST['submit']))
   {
    $contact_number = $_POST['contact_number'];
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $leavingtime = $_POST['time'];
    $number_of_seats = $_POST['number_of_seats'];
    $couch_type = $_POST['couch_type'];
    $name="";
    $fair=""; 
    $busno="";

    /*for name*/
    $q="select * from registration where contact_number='$contact_number'";

    $result=mysqli_query($connection,$q);
   $num=mysqli_num_rows($result);
   if($num==1)
   {    
     $row = $result->fetch_assoc();
     $name= $row["name"];
     
   }
   $qq="select * from buslist where SOURCE='$source' && DESTINATION='$destination' && LEAVING_TIME='$leavingtime' &&	COUCE_TYPE='$couch_type'";
   $resultt=mysqli_query($connection,$qq);
   $numm=mysqli_num_rows($resultt);
   if($numm==1)
  {    
  
    $row = $resultt->fetch_assoc();
    $fair= $row["FAIR"];
    $busno= $row["BUS_NO"];
 
  }
  require("fpdf/fpdf.php");
  $pdf=new FPDF();
  $pdf->AddPage();
  $pdf->SetFont("Arial","B",16);
  $pdf->Cell(0,20,"Zaman Travel Bus Ticket",1,1,'C');

  $pdf->SetFont("Arial","B",14);
  $pdf->Cell(20,10,"Name:",1,0);
  $pdf->SetFont("Arial","",14);
  $pdf->Cell(0,10,$name,1,1);

  $pdf->SetFont("Arial","B",14);
  $pdf->Cell(50,10,"Contact Number:",1,0);
  $pdf->SetFont("Arial","",14);
  $pdf->Cell(0,10,$contact_number,1,1);

  $pdf->SetFont("Arial","B",14);
  $pdf->Cell(40,10,"Source:",1,0);
  $pdf->SetFont("Arial","",14);
  $pdf->Cell(0,10,$source,1,1);

  $pdf->SetFont("Arial","B",14);
  $pdf->Cell(50,10,"Destination:",1,0);
  $pdf->SetFont("Arial","",14);
  $pdf->Cell(0,10,$destination,1,1);

  $pdf->SetFont("Arial","B",14);
  $pdf->Cell(50,10,"No. of Seats:",1,0);
  $pdf->SetFont("Arial","",14);
  $pdf->Cell(0,10,$number_of_seats,1,1);

  $pdf->SetFont("Arial","B",14);
  $pdf->Cell(50,10,"Leaving Time:",1,0);
  $pdf->SetFont("Arial","",14);
  $pdf->Cell(0,10,$leavingtime,1,1);

  $pdf->SetFont("Arial","B",14);
  $pdf->Cell(30,10,"Bus No.:",1,0);
  $pdf->SetFont("Arial","",14);
  $pdf->Cell(0,10,$busno,1,1);

  $pdf->SetFont("Arial","B",14);
  $pdf->Cell(50,10,"Couch Type:",1,0);
  $pdf->SetFont("Arial","",14);
  $pdf->Cell(0,10,$couch_type,1,1);

  $pdf->SetFont("Arial","B",14);
  $pdf->Cell(25,10,"Fair:",1,0);
  $pdf->SetFont("Arial","",14);
  $pdf->Cell(0,10,$fair,1,1);

  $pdf->SetFont("Arial","B",14);
  $pdf->Cell(70,20,"Customer Care No :",1,0,'C');
  $pdf->SetFont("Arial","",14);
  $pdf->Cell(0,20,"1234",1,1);

  

  $pdf->output();
    

  
   }

?>