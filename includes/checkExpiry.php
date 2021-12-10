<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'uapp');

//$u_id = $_GET['u_id'];

//if($u_id!=null){

   // $news = array();
    $events = getNews();
    //$news = getNews2($u_id);
    echo(json_encode($events));
    //echo $u_id;
//}


  function getNews(){
    $conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

    $query = "SELECT date from tblevent ";
  
    $result = mysqli_query($conn, $query);

    $rows = array();

    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }

    foreach($rows as $trial){

        $news_details['date'] = $trial['date'];
        
    }

    return $news_details;

   // echo json_encode($news_details);
}

?>

