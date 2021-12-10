
        function getProfile() {
            let userLogged = null;
            if (typeof (Storage) != "undefined") {

                userLogged = localStorage.getItem('username');
               // alert("Local Not Null");
            }

            if (userLogged != null) {
                $.ajax({
                    type: "GET",  //Request type
                    url: "includes/getProfile.php?username=" + userLogged,
                    data: { username: userLogged },
                    cache: false,
                    success: function (data) {
                        //alert("AJAX!");
                        //alert(data);
                        let JsonRespone = $.parseJSON(data);
                         alert(JsonRespone.Fname);
                         let div = document.getElementById('profileTitle');
                         let h2 = document.createElement("h2");
                         h2.innerHTML = JsonRespone.Fname +" "+JsonRespone.Lname;
                         div.append(h2);
                         let usernameInput = document.getElementById('usernameProfile');
                         usernameInput.value = JsonRespone.username;
                         let emailInput = document.getElementById('emailProfile');
                         emailInput.value = JsonRespone.Email;
                         let passInput = document.getElementById('passProfile');
                         passInput.value = JsonRespone.password;
                         let stdIDInput = document.getElementById('studentidProfile');
                         stdIDInput.value = JsonRespone.studentid;
                         let vacIDInput = document.getElementById('vacidProfile');
                         vacIDInput.value = JsonRespone.vacid;




                        // window.location ='main.html';
                    }
                })
            }
            else {
                alert('Input fields are empty');
            }
        }


function updateProfile(){


}


        