var table;
$(document).ready(function () {    
    // DataTable                   
            table=$('table.item_transactions').DataTable({ 
                "dom":  '<"top"i>rt<"bottom"flp><"clear">',
                "language": {
                    "emptyTable": " ",
                    "processing":"Searching",
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/itemtranss',
                    error: function(data) {
                        if(data.status == 401) {
                            window.location.href = '/';
                        }
                        alert(data.responseText);
                    },
                },
                columns: [
                    { data: 'supplier_name'},
                    { data: 'client_name'},
                    { data: 'item', "width": "20%"},
                    { data: 'delivery_date'},
                    { data: 'ref_del_doc', "width": "20%"},
                    { data: 'serial_number'},
                    { data: 'warranty'},
                    { data: 'warranty_start'},
                    { data: 'warranty_end'},
                    { data: 'status'},
                    { data: 'remarks'},
                    { data: 'name'},
                    { data: 'name'}
                ],
                orderCellsTop: true,
                fixedHeader: true,            
            }); 
            $('#transcTable tbody').on('click', 'tr', function () {
                event.preventDefault();

                var data = table.row( this ).data();

                var id = data.id;
                    $('#id').val(id);
                var supplier_id =data.supplier_id;
                    $('#supplier_id').val(supplier_id);
                var client_id =data.client_id;
                    $('#client_id').val(client_id);
                var item_id = data.item_id;
                    $('#item_id').val(item_id);
                var delivery_date = data.delivery_date;
                    $('#delivery_date').val(delivery_date);
                var ref_del_doc = data.ref_del_doc;
                    $('#reference_doc').val(ref_del_doc);
                var serial_number =data.serial_number;
                    $('#serial_number').val(serial_number);
                var warranty = data.warranty;
                    $('#warranty').val(warranty);
                var warranty_start = data.warranty_start;
                    $('#warranty_start').val(warranty_start);
                var warranty_end = data.warranty_end;
                    $('#warranty_end').val(warranty_end);
                var status = data.status;
                    $('#statusUpdate').val(status);
                var remarks = data.remarks;
                    $('#remarks').val(remarks);
                var created_by = data.created_by;
                    $('#created_by').val(created_by);
                var updated_by = data.updated_by;
                    $('#updated_by').val(updated_by);

                    $('.modal-body').html();
                    $('#updateItemtrans').modal('show'); 
            } );  
                   
        $("#ITEM").toggleClass('nav-tabs nav-link active');   
        $("#item_transaction").toggle(); 
    
        $('#ITEM').on('click', function () {    
            $("#ITEMMAINTENANCE").removeClass('nav-tabs nav-link active');
            $("#itemMaintenanceTable").hide();
            $("#SUPPLIER").removeClass('nav-tabs nav-link active');
            $("#supplierTable").hide();
            $("#clientTable").hide();
            $("#CLIENT").removeClass('nav-tabs nav-link active'); 
            $("#item_transactions").toggle();
            $("#ITEM").toggleClass('nav-tabs nav-link active');  
            $('table.item_transactions').dataTable().fnDestroy();    
            select = 'item';
            table=$('table.item_transactions').DataTable({ 
                "dom":  '<"top"i>rt<"bottom"flp><"clear">',
                "language": {
                    "emptyTable": " ",
                    "processing":"Searching",
                },
                processing: true,
                serverSide: false,
                ajax: {
                    url: '/itemtranss',
                    error: function(data) {
                        if(data.status == 401) {
                            window.location.href = '/';
                        }
                        alert(data.responseText);
                    },
                },
                columns: [
                    { data: 'supplier_name'},
                    { data: 'client_name'},
                    { data: 'item'},
                    { data: 'delivery_date'},
                    { data: 'ref_del_doc', "width": "20%"},
                    { data: 'serial_number'},
                    { data: 'warranty'},
                    { data: 'warranty_start'},
                    { data: 'warranty_end'},
                    { data: 'status'},
                    { data: 'remarks'},
                    { data: 'name'},
                    { data: 'name'}
                ],
                orderCellsTop: true,
                fixedHeader: true,            
            });
             $('#transcTable tbody').on('click', 'tr', function () {
                event.preventDefault();

                var data = table.row( this ).data();

                var id = data.id;
                    $('#id').val(id);
                var supplier_id =data.supplier_id;
                    $('#supplier_id').val(supplier_id);
                var client_id =data.client_id;
                    $('#client_id').val(client_id);
                var item_id = data.item_id;
                    $('#item_id').val(item_id);
                var delivery_date = data.delivery_date;
                    $('#delivery_date').val(delivery_date);
                var ref_del_doc = data.ref_del_doc;
                    $('#reference_doc').val(ref_del_doc);
                var serial_number =data.serial_number;
                    $('#serial_number').val(serial_number);
                var warranty = data.warranty;
                    $('#warranty').val(warranty);
                var warranty_start = data.warranty_start;
                    $('#warranty_start').val(warranty_start);
                var warranty_end = data.warranty_end;
                    $('#warranty_end').val(warranty_end);
                var status = data.status;
                    $('#updateStatus').val(status);
                var remarks = data.remarks;
                    $('#remarks').val(remarks);
                var created_by = data.created_by;
                    $('#created_by').val(created_by);
                var updated_by = data.updated_by;
                    $('#updated_by').val(updated_by);

                    $('.modal-body').html();
                    $('#updateItemtrans').modal('show'); 
            } );      
        });

        $('#ITEMMAINTENANCE').on('click', function () {    
            $("#ITEM").removeClass('nav-tabs nav-link active');
            $("#item_transactions").hide();
            $("#SUPPLIER").removeClass('nav-tabs nav-link active');
            $("#supplierTable").hide();
            $("#clientTable").hide();
            $("#CLIENT").removeClass('nav-tabs nav-link active'); 
            $("#itemMaintenanceTable").toggle();
            $("#ITEMMAINTENANCE").toggleClass('nav-tabs nav-link active');  
            $('table.items').dataTable().fnDestroy();    
            select = 'items';
            table=$('table.items').DataTable({ 
                "dom":  '<"top"i>rt<"bottom"flp><"clear">',
                "pageLength": 5,
                "language": {
                    "emptyTable": " ",
                    "processing":"Searching"
                },
                processing: true,
                serverSide: false,
                ajax: {
                    url: '/Fitems',
                    error: function(data) {
                        if(data.status == 401) {
                            window.location.href = '/';
                        }
                        alert(data.responseText);
                    },
                },
                columns: [
                    { data: 'category', "width": "14%"},
                    { data: 'item'}
                ],         
            }); 
            $('#MaintenanceTable tbody').on('click', 'tr', function () {
                event.preventDefault();

                var data = table.row( this ).data();

                var id = data.id;
                    $('#itemid').val(id);
                var category_id =data.category_id;
                    $('#catid').val(category_id);
                var category_id =data.category;
                    $('#cat').val(category_id);
                var item =data.item;
                    $('#item').val(item);

                    $('.modal-body').html();
                    $('#updateItem').modal('show'); 
            } );
            $("#closeupdate").modal("hide");              
        });                
         $('#supTable thead tr:eq(1) th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" class="column_search" />' );
        } );
        
             $( '#supTable thead'  ).on( 'keyup', ".column_search",function () {
   
                table
                    .column( $(this).parent().index() )
                    .search( this.value )
                    .draw();
            } );
  
        $('#SUPPLIER').on('click', function () { 
            $("#ITEMMAINTENANCE").removeClass('nav-tabs nav-link active');
            $("#itemMaintenanceTable").hide();   
            $("#ITEM").removeClass('nav-tabs nav-link active');
            $("#item_transactions").hide();            
            $("#clientTable").hide();
            $("#CLIENT").removeClass('nav-tabs nav-link active'); 
            $("#supplierTable").toggle();
            $("#SUPPLIER").toggleClass('nav-tabs nav-link active'); 
            $('table.supplier').dataTable().fnDestroy();    
            select = 'supplier';
            table=$('#supTable').DataTable({ 
                "dom":  '<"top"i>rt<"bottom"flp><"clear">',
                "language": {
                    "emptyTable": " ",
                    "processing":"Searching"
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/suppliers',
                    error: function(data) {
                        if(data.status == 401) {
                            window.location.href = '/';
                        }
                        alert(data.responseText);
                    },
                },
                columns: [
                    { data: 'supplier_code'},
                    { data: 'supplier_name'},                
                    { data: 'TIN'},
                    { data: 'contact_person'},
                    { data: 'address'},
                    { data: 'contact_no'},
                    { data: 'email'}
                ]            
            }); 
          
            $('#supplierTable tbody').on('click', 'tr', function () {
                event.preventDefault();

                var data = table.row( this ).data();

                var id = data.id;
                    $('#sid').val(id);
                var supplier_code =data.supplier_code;
                    $('#sup_code').val(supplier_code);
                var supplier_name =data.supplier_name;
                    $('#sup_name').val(supplier_name);
                var tin = data.TIN;
                    $('#sup_tin').val(tin);
                var contact_person = data.contact_person;
                    $('#contact').val(contact_person);
                var address = data.address;
                    $('#address').val(address);
                var contact_no =data.contact_no;
                    $('#contactno').val(contact_no);
                var email = data.email;
                    $('#email').val(email);

                    $('.modal-body').html();
                    $('#updateSupplier').modal('show'); 
            } );
        });
        $('#CLIENT').on('click', function () {    
            $("#ITEM").removeClass('nav-tabs nav-link active');
            $("#item_transactions").hide();
            $("#SUPPLIER").removeClass('nav-tabs nav-link active');
            $("#supplierTable").hide();
            $("#itemMaintenanceTable").hide();
            $("#ITEMMAINTENANCE").removeClass('nav-tabs nav-link active');  
            $("#clientTable").toggle();
            $("#CLIENT").toggleClass('nav-tabs nav-link active');  
            $('table.clients').dataTable().fnDestroy();    
            select = 'clients';
            table=$('table.clients').DataTable({ 
                "dom":  '<"top"i>rt<"bottom"flp><"clear">',
                "language": {
                    "emptyTable": " ",
                    "processing":"Searching"
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/clients',
                    error: function(data) {
                        if(data.status == 401) {
                            window.location.href = '/';
                        }
                        alert(data.responseText);
                    },
                },
                columns: [
                    { data: 'client_code', "width": "14%"},
                    { data: 'client_name'}
                ],         
            });
             $('#clientsTable tbody').on('click', 'tr', function () {
                event.preventDefault();

                var data = table.row( this ).data();

                var id = data.id;
                    $('#cid').val(id);
                var client_code =data.client_code;
                    $('#client_code').val(client_code);
                var client_name =data.client_name;
                    $('#client_name').val(client_name);

                console.log("hello");
                    $('.modal-body').html();
                    $('#updateClient').modal('show'); 
            } );           
        });
           
    if(window.location.href.indexOf('#item_transactions') > -1){
        if (!$('#transcTable').is(':visible')) {
            $('#ITEM').trigger('click');
        }
    }if(window.location.href.indexOf('#itemMaintenanceTable') > -1){
        if (!$('#supTable').is(':visible')) {
            $('#ITEMMAINTENANCE').trigger('click');
        }
    }if(window.location.href.indexOf('#supplier') > -1){
        if (!$('#supTable').is(':visible')) {
            $('#SUPPLIER').trigger('click');
        }
    }if(window.location.href.indexOf('#client') > -1){
        if (!$('#clientsTable').is(':visible')) {
            $('#CLIENT').trigger('click');
        }
    }
    $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);    
});        
});