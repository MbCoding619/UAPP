function getContent() {
    let test = $("#test").text();
    //let passParam = $("#password").val();

    let url = "http://localhost:8080/UAPP/includes/checkExpiry.php";

    let statusUser = "Error!";
    let contentArray = [];
    let idArray = [];

    $.get(url, function (data, status) {

        if (data != null && status == "success") {

            statusUser = "Successfully got!";
            let JsonRespone = $.parseJSON(data);
            alert(data + " " + statusUser + " " + JsonRespone.date);
            var count = Object.keys(JsonRespone).length;
            //console.log(count);
            for (var i = 0; i < count; i++) {

               // console.log(JsonRespone[i].n_id);
                 //console.log(JsonRespone[i].n_content);
                idArray.push((JsonRespone[i].date).toString());
                //alert(idArray);
                //contentArray.push(JsonRespone[i].n_content);
                //TRY STORING IT IN AN ARRAY 
                //console.log(JsonRespone['n_id'][i]['n_content'][i]);


            };
            function test(array) {

                array.forEach(element => console.log(element));
            }


            function populateTable(idArray, contentArray) {
                let html = '<tr>';
                test(idArray);
                test(contentArray);
                for (var i = 0; i < idArray.length; i++) {

                    html += '<td>' + idArray[i] + '</td>';
                    html += '<td>' + contentArray[i] + '</td></tr>';

                    //console.log(idArray[i]);
                }
                html += '<tr>';

                document.getElementById('table_id').getElementsByTagName("tbody")[0].innerHTML += html;

            }


        } else {

            alert(statusUser);
        }
        ;
        //populateTable(idArray, contentArray);
        test(idArray);
       


    })

};