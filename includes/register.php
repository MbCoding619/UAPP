<?php

//access control headears
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

//creating constants which are parametric access to the database
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'uapp');

$errors=array();
$regParam = null;
$fnameReg = null;
$snameReg = null;
$emailReg = null;
$passReg = null;
$infoReg = null;
$stdIDReg =null;
$vacIDReg =null;


if(!empty($_GET['regParam'])){
	$regParam=$_GET['regParam'];
}
if(!empty($_GET['name'])){
	$fnameReg=$_GET['name'];
}
if(!empty($_GET['surname'])){
	$snameReg=$_GET['surname'];
}
if(!empty($_GET['mail'])){
	$emailReg=$_GET['mail'];
}
if(!empty($_GET['password1'])){
	$passReg=$_GET['password1'];
}
if(!empty($_GET['username'])){
	$unameReg=$_GET['username'];
}
if(!empty($_GET['studentid'])){
	$stdIDReg=$_GET['studentid'];
}
if(!empty($_GET['vacid'])){
	$vacIDReg=$_GET['vacid'];
}

if($regParam ==1){
    if($fnameReg !=null){
        $fname = $fnameReg;
        $pass = $passReg;
        
        //echo $pass;
        if(!preg_match("/[a-zA-Z]/", $fnameReg)){
            array_push($errors,'Please use letters only.');
            //print_r($errors);
            
        }else{
            registerUser($fnameReg,$passReg,$snameReg,$unameReg,$emailReg,$stdIDReg,$vacIDReg);
            //echo $fname;
           //echo md5($pass);
          // $array = getTrial($fname);
           //$array = json_encode($array);
           //echo $array;
        }      
        
    }   /* if($fnameReg !=null){
        $fname = $fnameReg;
        echo $fname;
    }*/
} 



function registerUser($fname,$passDecrypt,$sname,$uname,$email,$stdIDReg,$vacIDReg){
    $status = 'Registration Successful!';
    $errorsR = array();
    if($fname!=null){

        $conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error() );
        $passEncrypt = md5($passDecrypt);

        $registerQuery ="INSERT INTO tblUser (U_Fname,U_LName,U_Uname,U_Password,U_Email,Student_ID,Vac_ID) VALUES ('".$fname."','".$sname."','".$uname."','".$passDecrypt."','".$email."','".$stdIDReg."','".$vacIDReg."')";
        if(mysqli_query($conn,$registerQuery)){
            
            echo($status);
        }else{
            array_push($errorsR,'Error Successfully');
            //print_r($errorsR);
            echo $registerQuery;
        }
        $conn->close();
    }

}




?>