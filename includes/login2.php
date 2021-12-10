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

$username = $_POST['username'];
$password = $_POST['password'];

if($username !=null && $password !=null){

   $echoUser = checkLogin($username,$password);
   echo $echoUser;
}



function checkLogin($userParam,$passParam){
    $error ="bad";
    $username =null;
    //the connection string object
    $conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error() );
    $passEncrypt = md5($passParam);
    
    $query = "SELECT * FROM tblUser WHERE U_Uname ='".$userParam."' AND U_Password='".$passParam."'";
    
    //Executing the query on the connection object, which returns a 		resultset
    
    
    try{
        $result = mysqli_query($conn, $query);
        if($result){
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
               $username = $row['U_Uname'];
               return $username;
            }
        
        }
    }catch(mysqli_sql_exception $e){

        echo "Pa bon";
    }
    
    
        
        $conn ->close();
    
    }


?>