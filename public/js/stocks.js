var table;
$(document).ready(function () {    
    // DataTable
    table=$('table.stocks').DataTable({ 
            "dom":  '<"top"rif>t<"bottom"pl>',
            "language": {
                "emptyTable": " ",
                "processing":"Searching"
            },
            processing: true,
            serverSide: false,
            ajax: {
                url: '/stockss',
                error: function(data) {
                    console.log(data);
                },
                beforeSend: function(xhrObj){
                    xhrObj.setRequestHeader("Authorization","Bearer "+$('meta[name="tok"]').attr('content'));
                },
            },
            columns: [
                { data: 'Category'},
                { data: 'Defective'},
                { data: 'Demo'},
                { data: 'Assembly'},
                { data: 'A1'},
                { data: 'A2'},
                { data: 'A3'},
                { data: 'A4'},
                { data: 'Balintawak'},
                { data: 'Malabon'},
                { data: 'Total_stocks'}
            ],
            orderCellsTop: true,
            fixedHeader: true,            
        });

        $('#stocksTable tbody').on('click', 'tr', function () {
                var data = table.row( this ).data();                
                var Category = data.id;                
                var Cat = data.Category;
                    $('#categoryHead').html(Cat);
                // $('#loading').show();
            $('#stockTableMain').hide();
            $("#itemCategory").show();
            $('table.stockItem').dataTable().fnDestroy();    
            $('table.stockItem').DataTable({ 
                "dom":  '<"top"rif>t<"bottom"pl>',
                // "language": {
                //     "emptyTable": " ",
                //     "processing":"Searching"
                // },
                processing: true,
                serverSide: true,
                async:false,
                
                ajax: {
                    url:'stockItem/',
                    data:{'category':Category}
                    },

                columns: [
                    { data: 'Item_Description'},
                    { data: 'Defective'},
                    { data: 'Demo'},
                    { data: 'Assembly'},
                    { data: 'A1'},
                    { data: 'A2'},
                    { data: 'A3'},
                    { data: 'A4'},
                    { data: 'Balintawak'},
                    { data: 'Malabon'},
                    { data: 'Total_stocks'}
                ]
                           
            });
            

        });       
               
   
        $('#butsave').on('click', function() {
      var category = $('#category').val();
      var item = $('#item').val();
      var location = $('#location').val();
      var qty = $('#quantity').val();
      if(category!="" && item!="" && location!="" && qty!=""){
        /*  $("#butsave").attr("disabled", "disabled"); */
          $.ajax({
              url: "stocks/save",
              type: "POST",
              headers: {
                'X-CSRF-TOKEN': $("#csrf").val(),

                },
              data: {
                  _token: $("#csrf").val(),
                  category: category,
                  item: item,
                  location: location,
                  qty: qty
              },
              success: function(dataResult){                      
                    $('#addStock').hide();
                    sweetAlert("SAVED", "ITEM SUCCESFULLY", "success");
                    setTimeout(function(){window.location.href="/stocks"} , 2000);                                   
              },
               error: function (data) {
                if(data.status == 401) {
                    window.location.href = '/login';
                }
                alert(data.responseText);
            }
          });

      }
      else{
          alert('Please fill all the field !');
      }   
      
  });
  
});
$(document).on('change', '#category', function(){
    var id=$('#category').val();
    var descOp = " ";
        $.ajax({
            type:'get',
            url:'/addStockitem',
            data:{'category_id':id},            
            success:function(data)
                {
                    var itemcode = $.map(data, function(value, index) {
                        return [value];
                    });
                    descOp+='<option selected disabled>Choose Item</option>';
                    itemcode.forEach(value => {
                        descOp+='<option value="'+value.id+'">'+value.item.toUpperCase()+'</option>';
                    });
                    $("#item").find('option').remove().end().append(descOp);               
                },
            error: function (data) {
                if(data.status == 401) {
                    window.location.href = '/admin/stocks';
                }
                alert(data.responseText);
            }
        });
});


