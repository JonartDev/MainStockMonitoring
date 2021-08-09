$(document).on('change', '.category', function(){
    var codeOp = " ";
    var descOp = " ";
        $.ajax({
            type:'get',
            url:'getcode',
            data:{'id':id},
            success:function(data)
            {
                var itemcode = $.map(data, function(value, index) {
                    return [value];
                });
                codeOp+='<option selected disabled>select item code</option>';
                descOp+='<option selected disabled>select item description</option>';
                itemcode.forEach(value => {
                    codeOp+='<option value="'+value.id+'">'+value.id+'</option>';
                    descOp+='<option value="'+value.id+'">'+value.item.toUpperCase()+'</option>';
                });
                $("#item" + count).find('option').remove().end().append(codeOp);
                $("#desc" + count).find('option').remove().end().append(descOp);
                itemcode.forEach(value => {
                    for(var g=1;g<=count;g++){
                        if (value.id == $("#item" + g).val()) {
                            $('#item'+count+' option[value='+value.id+']').remove()
                            $('#desc'+count+' option[value='+value.id+']').remove()
                        }
                    }
                });
            },
            error: function (data) {
                if(data.status == 401) {
                    window.location.href = '/login';
                }
                alert(data.responseText);
            }
        });