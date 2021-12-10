<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'uapp');

$username = $_GET['username'];

if($username!=null){
   $userinfo = getUserInfo($username);    
    
    echo json_encode($userinfo);
}



function getUserInfo($username){

    $conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
  
    
  
     $query = "SELECT `U_ID`, `U_Fname`, `U_LName`, `U_Uname`, `U_Password`, `U_Email`, `Student_ID`, `Vac_ID` FROM `tbluser` WHERE U_Uname ='".$username."'";
     $r = null;
  
    try{
        $result = mysqli_query($conn, $query);
        if($result){
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
               $r['Fname'] = $row['U_Fname'];
               $r['Lname'] = $row['U_LName'];
               $r['username'] = $row['U_Uname'];
               $r['Email'] = $row['U_Email'];
               $r['password'] = $row['U_Password'];
               $r['studentid'] = $row['Student_ID'];
               $r['vacid'] = $row['Vac_ID'];
               
            }
       }

       return $r;
    }catch(mysqli_sql_exception $e){

        echo "Pa bon";
    }

      
  
  }
  

?>
