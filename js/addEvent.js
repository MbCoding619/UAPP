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
    


    
    $("#submit").click(function(){
        alert("Clicked");
    var school = $("#school").val();
    var type = $("#Type").val();
    var info = $("#info").val();
    var date = $("#date").val();
    var venue = $("#venue").val();
    alert(date);
    if($.trim(type).length >0 & $.trim(info).length >0) {
        $.ajax({
            type:"POST",  //Request type
            url: "includes/addEvents.php",   
            data:{school:school, type:type,info:info,date:date,venue:venue},
            cache:false,
            success:function(data) {
                alert("AJAX!");
                alert(data);
               
               // window.location ='main.html';
            }
        })
    } 
    else {
        alert('Input fields are empty');
    }
})
})