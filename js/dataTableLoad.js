function getContent3(tableID){
    let test = 1;
    tableID = "#table_id"
    $(tableID).DataTable({
        "searching": true,
        "ajax":{
            "url":"http://192.168.100.189:8080/UAPP/includes/viewEvent.php",
            "dataSrc": ""
        },
        "columns":[
        {"data":'school'},
        {"data":'type'},
        {"data":'content'},
        {"data":'date'},
        {"data":'venue'}        

        ]                   
        
    });
        
    }


    function getContent4(tableID){
        let test = 1;
        tableID = "#table_news"
        $(tableID).DataTable({
            "searching": true,

            "ajax":{
                "url":"http://192.168.100.189:8080/UAPP/includes/viewNews.php",
                "dataSrc": ""
            },
            "columns":[
            {"data":'school'},
            {"data":'type'},
            {"data":'content'}
            
    
            ]                   
            
        });
            
        }

        function deleteEntry(){
            document.querySelectorAll('#table-data tr').forEach(cell => cell.addEventListener('click', handleClick, { once: true }
            ));

            function handleClick(clickEvent){
                const clickedRow = clickEvent.target;
                let text = clickedRow.texContent;
                alert(text);



            }


        }


        

   