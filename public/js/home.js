var table;
$(document).ready(function () {    
    // DataTable
    table=$('table.user_logs').DataTable({ 
            "dom":  '<lf<t>ip>',
            "language": {
                "emptyTable": " ",
                "processing":"Searching"
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: '/homes',
                error: function(data) {
                     if(data.status == 401) {
                        window.location.href = '/';
                    }
                    alert(data.responseText);
                },
            },
            columns: [
                { data: 'created_at'},
                { data: 'fullname'},                
                { data: 'activity'}
            ],
            orderCellsTop: true,
            fixedHeader: true,            
        }); 

});