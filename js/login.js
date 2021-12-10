function loginUser(){
    let userParam = $("#username").val();
    let passParam = $("#password").val();

    let url ="http://127.0.0.1:8080/UAPP/includes/login.php?logParam=1&username="+ userParam+"&password="+passParam;

    let statusUser = "Error!";

    $.get(url,function(data,status){

        if(data !=null && status == "success"){
           
            statusUser = "Successfully Logged!";
            alert(data +" "+statusUser);
            window.location ='main.html';
        }else{

            alert(statusUser);
        }

    })


}