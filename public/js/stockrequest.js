  $(document).ready(function(){
       var Rq= $('table.stock_request').DataTable({ 
            "dom":  '<"top"rif>t<"bottom"pl>',
             "language": {
                "emptyTable": " ",
                "processing":"Searching"
            }
        });
        
        $(".add-row").click(function(){            
            var category = $("#categoryReq option:selected").text();
            var item = $("#itemReq option:selected").text();
            var qty = $("#qtyReq").val();
            var markup = "<tr><td>" + category + "</td><td>" + item + "</td><td>"+ qty+"</td><td> <button type='button' class='delete-row'>REMOVE</button> </td></tr>";
            
            if(category == "Select Category" || item == "Select Item" || qty == ""){
                alert('Please select item!');
                return false;
            }else{
                $("#stockRequestTable tbody").append(markup);
                category = $("#categoryReq").val('Select Category');
                item = $("#itemReq").find('option').remove().end().append('<option value="whatever">Select Item</option>').val()
                qty = $("#qtyReq").val('');
                $('#stockRequestTable').show();
                $('#stockRequestDiv').toggle();
                $('#requestClose').show();
                $('#requestSave').show();
            } 

            console.log($('#stockRequestTable').find('tbody tr').length); 
            
        });
        // Find and remove selected table rows
       $("#stockRequestTable").on('click','.delete-row',function(){
            $(this).closest("tr").remove();
            if ($('#stockRequestTable tbody').children().length==0) {
                $('#stockRequestTable').hide();
                $('#stockRequestDiv').removeClass();   
                $('#requestClose').hide();  
                $('#requestSave').hide();    
            }
        });

        
        $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);    
        });    
               
    });  
    $(document).on('click','#close', function(){
        if ($('#stockRequestTable tbody').children().length==0) {
                window.location.href = '/admin/stockrequest';
        }else{
            if(confirm("IF YOU CANCEL THE FORM, YOU WILL NOT BE ABLE TO SAVE ALL THE ENTRIES.\n\nDO YOU WANT TO PROCEED?")) {
                window.location.href = '/admin/stockrequest';
            } else {
                return false;
            }    
        }            
    });

    $(document).on('click','#requestClose', function(){
        if (confirm("IF YOU CANCEL THE FORM, YOU WILL NOT BE ABLE TO SAVE ALL THE ENTRIES.\n\nDO YOU WANT TO PROCEED?")) {
            window.location.href = '/admin/stockrequest';
        } else {
            return false;
        }    
    });

    $(document).on('click','#requestSave', function(){

        // var table_length = $('#stockRequestTable').find('tbody tr').length;
        // console.log(table_length);
        var req_num=$('#request_num').val();
        var req_by=$('#requested_by').val();

        if(!req_num == ' ')
        {
            var myTable = $('#stockRequestTable').DataTable();
                var form_data  = myTable.rows().data();
                $.each( form_data, function( key, value ) {
                $.ajax({
                    type:'post',
                    url:'/saveRequest',
                    headers: {
                        'X-CSRF-TOKEN': $("#csrf").val(),
                            },
                    data:{
                        'request_number':$('#request_num').val(),
                        'requested_by':$('#requested_by').val(),
                        'category':value[0],
                        'item':value[1],
                        'quantity':value[2]
                    },
                    success:function() //waiter collect finish product(data)
                    {   
                        $('#newStockRequest').hide();
                        sweetAlert("SAVED", "STOCK REQUEST", "success");
                        setTimeout(function(){location.href="/admin/stockrequest"} , 2000);  
                    },
                    error: function (data) {
                        if(data.status == 401) {
                            window.location.href = '/admin/stockrequest';
                        }
                            alert(data.responseText);
                    }
                });
                });
        }else{
            alert('Fill up all fields!');
            return false;
        }   
            // $('#stockRequestTable').DataTable().rows().data().toArray();    
    });   
    $(document).on('change', '#categoryReq', function(){ //customer
    var id=$('#categoryReq').val();
    var descOp = " ";
        $.ajax({ //waiter
            type:'get', //paorder
            url:'/itemsreq', //chef location
            data:{'category_id':id}, //order
            success:function(data) //waiter collect finish product(data)
                {
                    var itemcode = $.map(data, function(value, index) { //check orders
                        return [value];
                    });
                    descOp+='<option selected disabled>Choose Item</option>'; 
                    itemcode.forEach(value => {
                        descOp+='<option value="'+value.id+'">'+value.item.toUpperCase()+'</option>'; //put orders on tray
                    });
                    
                    $("#itemReq").find('option').remove().end().append(descOp); //return to customer                
                },
            error: function (data) {
                if(data.status == 401) {
                    window.location.href = '/admin/stockrequest';
                }
                alert(data.responseText);
            }
        });    
    });
    
      $('#stockreqDetails tbody').on('click', 'tr', function () {
                var table =  $('table.stock_request').DataTable(); 
                var data = table.row( this ).data();
                var req_date = data[0];
                    $('#daterequestdetails').val(req_date);
                var req_num = data[1];
                    $('#request_num_details').val(req_num);
                var req_details = data[2];
                    $('#requested_by_details').val(req_details);
                var status = data[3];
                    $('#status_details').val(status);

                    $('.modal-body').html();
                    $('#stockRequestDetails').modal('show'); 

                    if(status == 'PENDING'){                  
                        $('#requestForReceiving').hide();
                        $('#requestApproved').show();
                        $('#requestReceived').hide();
                    }else if(status == 'APPROVED'){                        
                        $('#requestForReceiving').show();
                        $('#requestApproved').hide();
                        $('#requestReceived').hide();
                    }else if(status == 'FOR RECEIVING'){                        
                        $('#requestForReceiving').hide();
                        $('#requestApproved').hide();
                    }
                    else{                        
                        $('#requestReceived').show();
                    }

            $('table.stockDetails').dataTable().fnDestroy();    
            $('table.stockDetails').DataTable({ 
                "dom":  '',
                "language": {
                    "emptyTable": " ",
                    "processing":"Searching",
                },
                processing: true,
                serverSide: false,
                
                ajax: {
                    url: '/requestDetails',
                    data: {
                        reqnum: req_num,
                    },
                    dataType: 'json',
                    error: function(data) {
                        if(data.status == 401) {
                            window.location.href = '/admin/stockrequest';
                        }
                        alert(data.responseText);
                    },
                },
                columns: [
                    { data: 'category'},
                    { data: 'item'},
                    { data: 'quantity'},
                    { data: 'status'}
                ],
                orderCellsTop: true,
                fixedHeader: true,            
            });   
        });
    $(document).on('click','#requestDel', function(){
        var req_num=$('#request_num_details').val();
        if (confirm("You are about to DELETE your STOCK REQUEST. This will be permanently deleted from the system.\n Click OK to proceed.")) {       
            $.ajax({ //waiter
                type:'get', //paorder
                url:'/deleteRequest', //chef location
                data:{'request_number':req_num}, //order
                success:function(data) //waiter collect finish product(data)
                    {   
                        $('#stockRequestDetails').hide();
                        sweetAlert("DELETED", "STOCK REQUEST", "success");
                        setTimeout(function(){location.href="/admin/stockrequest"} , 2000);  
                    },
                error: function (data) {
                    if(data.status == 401) {
                        window.location.href = '/admin/stockrequest';
                    }
                    alert(data.responseText);
                }
            }); 
        }else{
            return false;
        }   
    });

       $(document).on('click','#requestApproved', function(){
        
        if (confirm("You are about to approved STOCK REQUEST.\n Click OK to proceed.")) { 
            var approved = $('#request_num_details').val();      
           var myTable = $('table.stockDetails').DataTable();
                var form_data  = myTable.rows().data();
                $.each( form_data, function( key, value ) {   
                    $.ajax({
                        type:'get',
                        url:'/approvedRequest',
                        headers: {
                            'X-CSRF-TOKEN': $("#csrf").val(),
                                },
                        data:{
                            'request_number':approved
                        },
                        success:function() //waiter collect finish product(data)
                        {   
                            $('#stockRequestDetails').hide();
                            sweetAlert("APPROVED", "STOCK REQUEST", "success");
                            setTimeout(function(){location.href="/admin/stockrequest"} , 2000);  
                        },
                        error: function (data) {
                            if(data.status == 401) {
                                window.location.href = '/admin/stockrequest';
                            }
                                alert(data.responseText);
                        }
                    });
                });
        }else{
            return false;
        }   
    });
    $(document).on('click','#requestForReceiving', function(){
        
        if (confirm("You are about to set as For Receiving a STOCK REQUEST.\n Click OK to proceed.")) { 
            var frec= $('#request_num_details').val();      
           var myTable = $('table.stockDetails').DataTable();
                var form_data  = myTable.rows().data();
                $.each( form_data, function( key, value ) {   
                    $.ajax({
                        type:'get',
                        url:'/receivedRequest',
                        headers: {
                            'X-CSRF-TOKEN': $("#csrf").val(),
                                },
                        data:{
                            'request_number':frec
                        },
                        success:function() //waiter collect finish product(data)
                        {   
                            $('#stockRequestDetails').hide();
                            sweetAlert("SET AS FOR RECEIVING", "STOCK REQUEST", "success");
                            setTimeout(function(){location.href="/admin/stockrequest"} , 2000);  
                        },
                        error: function (data) {
                            if(data.status == 401) {
                                window.location.href = '/admin/stockrequest';
                            }
                                alert(data.responseText);
                        }
                    });
                });
        }else{
            return false;
        }   
    });
    

    $(document).on('click','#requestReceived', function(){

        if(!req_num == ' ')
        {
            var myTable = $('#stockDetailsrequest').DataTable();
                var form_data  = myTable.rows().data();
                $.each( form_data, function( key, value ) {
                $.ajax({
                    type:'post',
                    url:'/saveRequesttoStocks',
                    headers: {
                        'X-CSRF-TOKEN': $("#csrf").val(),
                            },
                    data:{
                        'category':value[0],
                        'item':value[1],
                        'qty':value[2]
                    },
                    success:function() //waiter collect finish product(data)
                    {   
                        $('#newStockRequest').hide();
                        sweetAlert("SAVED", "STOCK REQUEST", "success");
                        setTimeout(function(){location.href="/admin/stockrequest"} , 2000);  
                    },
                    error: function (data) {
                        if(data.status == 401) {
                            window.location.href = '/admin/stockrequest';
                        }
                            alert(data.responseText);
                    }
                });
                
                });
        }else{
            return false;
        }   
            // $('#stockRequestTable').DataTable().rows().data().toArray();    
    });   
   

   
         