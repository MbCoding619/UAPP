$("#send").click(function(){
    
    var fnameParam = $("#name").val();
    var snameParam = $("#surname").val();
    var unameParam = $("#username").val();
    var mailParam = $("#mail").val();
    var passParam = $("#password1").val();
    var stdIDParam = $("#studentid").val();
    var vacIDParam = $("#vacid").val();
    //alert(stdIDParam);

    var url = "http://192.168.100.189:8080/UAPP/includes/register.php?regParam=1&name="+ fnameParam+"&surname="+snameParam+"&username="+unameParam+"&mail="+mailParam+"&password1="+passParam+"&studentid="+stdIDParam+"&vacid="+vacIDParam;
    var userLog = "no user found";

    $.post(url, function (data) {
        //if(data !=null){
            alert(data);
            window.location='index.html';
       // }
        
        //console.log(passParam);
        //author_name = data;
       // window.location='page2.html';
    })

}) 
    

