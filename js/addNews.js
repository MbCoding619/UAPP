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
    


    
    $("#send").click(function(){
        alert("Clicked");
    var school = $("#school").val();
    var type = $("#Type").val();
    var info = $("#info").val();
    if($.trim(type).length >0 & $.trim(info).length >0) {
        $.ajax({
            type:"POST",  //Request type
            url: "includes/addNews.php",   
            data:{school:school, type:type,info:info},
            cache:false,
            success:function(data) {
                alert(data);
               
                window.location ='main.html';
            }
        })
    } 
    else {
        alert('Input fields are empty');
    }
})
})