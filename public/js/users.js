var table;
$(document).ready(function () {    
    // DataTable
    table=$('table.users').DataTable({ 
            "dom":  '<"top"i>rt<"bottom"flp><"clear">',
            "language": {
                "emptyTable": " ",
                "processing":"Searching"
            },
            processing: true,
            serverSide: true,
            paging: false,
            searching: false,
            ajax: {
                url: '/userss',
                error: function(data) {
                    console.log(data);
                },
                beforeSend: function(xhrObj){
                    xhrObj.setRequestHeader("Authorization","Bearer "+$('meta[name="tok"]').attr('content'));
                },
            },
            columns: [
                { data: 'id', "width": "14%"},
                { data: 'name', "width": "14%"},
                { data: 'email', "width": "14%"},
            ],
            orderCellsTop: true,
            fixedHeader: true,            
        }); 

});