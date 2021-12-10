$(document).ready(function(){
    let userLogged = null;

    function checkLogged(){
        let checkUser = null;
        if(typeof(Storage) != "undefined"){
            checkUser = localStorage.getItem('username');
            if(checkUser !=null){
                window.location ='main.html'; 
                alert(checkUser);              
            }
    
        }

    };

    //checkLogged();
    


    
    $("#sub").click(function(){
        alert("Clicked");
    var username = $("#username").val();
    var password = $("#password").val();
    if($.trim(username).length >0 & $.trim(password).length >0) {
        $.ajax({
            type:"POST",  //Request type
            url: "includes/login2.php",   
            data:{username:username, password:password},
            cache:false,
            success:function(data) {
                alert(data +"  Successfully Logged");
                userLogged = data;
                let staffLogged ="admin";
                let checkBox = document.getElementById("checkbox-mini-0");
                if(checkBox.checked == true){

                    if(typeof(Storage) !=="undefined" && userLogged=="Admin"){

                        localStorage.setItem('username',userLogged);
                        localStorage.setItem('staff',staffLogged);
                        
                        
                    }
                    window.location ='main.html';

                }else{
                    if(typeof(Storage) !=="undefined"){

                        localStorage.setItem('username',userLogged);                       
                        
                    }
                    window.location ='main.html';
                    
                }
                
            }
        })
    } 
    else {
        alert('Input fields are empty');
    }
})
})
