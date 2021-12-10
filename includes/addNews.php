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

if($schoolParam !=null && $typeParam !=null && $infoParam !=null){

   $status = addNews($schoolParam,$typeParam,$infoParam);
   echo $status;
}


function addNews($school,$type,$info){

    $conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error() );

    $addNewsQuery = "INSERT INTO tblnews (school,type,content) VALUES ('".$school."','".$type."','".$info.",=')";
    if(mysqli_query($conn,$addNewsQuery)){

        echo "Successfully added News";
    }
}




?>