<?php
//access control headears
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
// connecting to database

//creating constants which are parametric access to the database
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'uapp');

$schoolParam = $_POST['school'];
$typeParam = $_POST['type'];
$infoParam = $_POST['info'];
$dateParam = $_POST['date'];
$venueParam = $_POST['venue'];

if($schoolParam !=null && $typeParam !=null && $infoParam !=null){


   $status = addNews($schoolParam,$typeParam,$infoParam,$dateParam,$venueParam);
   //echo $dateParam;
}


function addNews($school,$type,$info,$date,$venue){

    $conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error() );

    $addEventQuery = "INSERT INTO tblevent (school,type,content,date,venue) VALUES ('".$school."','".$type."','".$info."','".$date."','".$venue."')";
    if(mysqli_query($conn,$addEventQuery)){

        echo "Successfully added Event";
    }
}




?>