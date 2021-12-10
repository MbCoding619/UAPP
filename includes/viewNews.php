<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'uapp');





   
    $news = getNews();  
    echo(json_encode($news));  





function getNews(){

    $conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
  
    $book_details = null;
  
     $query = "SELECT * from tblnews ";
  
    $result = mysqli_query($conn, $query);

   


        $r = array();
        while($array = mysqli_fetch_array($result,MYSQLI_ASSOC)){

            $r[] = $array;
        }
        return $r;

      
  
  
  }


?>
