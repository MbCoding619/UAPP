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
  
    
  
     $query = "SELECT * from tblevent";
  
    $result = mysqli_query($conn, $query);

   /* $arr = mysqli_fetch_array($result);
    if($arr){

        return $arr;
    }*/


        $r = array();
        while($array = mysqli_fetch_array($result,MYSQLI_ASSOC)){

            $r[] = $array;
        }
        return $r;

      /*  foreach($r as $trial){

            $news_details['n_id'] = $trial['n_id'];
            $news_details['n_name'] = $trial['n_name'];  
            $news_details['n_content'] = $trial['n_content'];  
            $news_details['U_ID'] = $trial['U_ID'];
        }*/

        //return $news_details;
 
    
  /*
    if($result){
  
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
  
       $news_details['n_name'] = $row['n_name'];
  
      $news_details['n_content'] = $row['n_content'];
  
      $news_details['U_ID'] = $row['U_ID'];
    
  
      }
  
  return $news_details;
  
    }else{
  
      echo "<br>no results";
  
    }
  */
  //$book_details = null;
  
  }
  function getNews2($u_id){
    $conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

    $query = "SELECT n_id,n_name,n_content,tu.U_Uname from tblnews tn,tbluser tu where tn.u_id = tu.u_id  AND tn.u_id='".$u_id."'";
  
    $result = mysqli_query($conn, $query);

    $rows = array();

    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }

    foreach($rows as $trial){

        $news_details['n_id'] = $trial['n_id'];
        $news_details['n_name'] = $trial['n_name'];

     $news_details['n_content'] = $trial['n_content'];

    $news_details['U_ID'] = $trial['U_ID'];
    }

    return $news_details;

   // echo json_encode($news_details);
}

?>
