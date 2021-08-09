$(document).on('change', '#categories', function(){ //customer
    var id=$('#categories').val();
    var descOp = " ";
        $.ajax({ //waiter
            type:'get', //paorder
            url:'items', //chef location
            data:{'category_id':id}, //order
            success:function(data) //waiter collect finish product(data)
                {
                    var itemcode = $.map(data, function(value, index) { //check orders
                        return [value];
                    });
                    descOp+='<option selected disabled>Choose Item</option>'; 
                    itemcode.forEach(value => {
                        descOp+='<option value="'+value.item_id+'">'+value.item.toUpperCase()+'</option>'; //put orders on tray
                    });
                    
                    $("#items").find('option').remove().end().append(descOp); //return to customer                
                },
            error: function (data) {
                if(data.status == 401) {
                    window.location.href = '/stocks';
                }
                alert(data.responseText);
            }
        });
});
$(document).on('change', '#items', function(){
    var id=$('#items').val();
    var loc = " ";
        $.ajax({
            type:'get',
            url:'locations',
            data:{'item_id':id},
            dataType: 'json',           
            success:function(data)
                {                    
                    var locationcode = $.map(data, function(value, index) {
                        return [value];
                    });
                    loc+='<option selected disabled>Choose location</option>';
                    locationcode.forEach(value => {
                        loc+='<option value="'+value.location_id+'">'+value.location.toUpperCase()+'</option>';
                    });
                    
                    console.log(loc);
                    $("#locationfrom").find('option').remove().end().append(loc);                 
                },
            error: function (data) {
                if(data.status == 401) {
                    window.location.href = '/stocks';
                }
                alert(data.responseText);
            }
        });
});

$(document).on('change', '#locationfrom', function(){
    var id=$('#locationfrom').val();
    var category=$('#categories').val();
    var item=$('#items').val();
        $.ajax({
            type:'get',
            url:'stocksAvailable',
            data:{'location_id':id,'category_id':category,'item_id':item},
            dataType: 'json',           
            success:function(data)
                {                         
                    $("#strans").val(data);                 
                },
            error: function (data) {
                if(data.status == 401) {
                    window.location.href = '/stocks';
                }
                alert(data.responseText);
            }
        });
});
$('#quantityst').on('change',function(e){    
    var qty = $('#quantityst').val();//
    var sqty = $('#strans').val();
     if(parseInt(qty) > parseInt(sqty)){         
            $("#quantityst").val(sqty);
            return false; 
        }  
});
$('#buttrans').on('click', function() {
    var category = $('#categories').val();
    var item = $('#items').val();
    var locationfrom = $('#locationfrom').val();
    var locationto= $('#locationto').val();
    var qty = $('#quantityst').val();//
    var sqty = $('#strans').val();
        if(parseInt(qty) > parseInt(sqty)){
            alert('Quantity must be less than to available stocks!');
            return false;
        }  
        if(category!="Choose Category" && item!="Choose Item" && locationfrom!="Choose location" && locationto!="Choose Location"&& qty!=""){
            /*  $("#butsave").attr("disabled", "disabled"); */
            if(locationto == "Choose Location"){
                alert('Please Choose location.');
                return false;
            }  
                $.ajax({
                    url: "stocks/update",
                    type: "POST",
                    headers: {
                    'X-CSRF-TOKEN': $("#csrf").val(),
                        },
                    data: {
                        _token: $("#csrf").val(),
                        category: category,
                        item: item,
                        locationfrom: locationfrom,
                        locationto: locationto,
                        qty: qty
                    },
                    dataType: 'json',           
                    success: function(dataResult){                         
                        $('#stocktrans').hide();
                        sweetAlert("TRANSFERED", "ITEM SUCCESFULLY TRANSFER", "success");
                        setTimeout(function(){window.location.href="/stocks"} , 2000);  
                    },
                    error: function (data) {
                        if(data.status == 401) {
                            window.location.href = '/';
                        }
                        alert(data.responseText);
                    }
                });
        }
        else{
            alert('Please fill all the field !');
        }
  }); 

