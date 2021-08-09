$(document).on('click', '.add_item', function(){
    var rowcount = $(this).attr('btn_id');
    if ($(this).val() == 'Add Item') {
        if ($('#serial'+ rowcount).val().toLowerCase() != 'n/a') {
            if ($('#serial'+ rowcount).val().toLowerCase().replace(/-/g, '')) {
                $.ajax({
                    url: 'verifyserial',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="ctok"]').attr('content')
                    },
                    dataType: 'json',
                    type: 'get',
                    async: false,
                    data: {
                        serial: $('#serial'+ rowcount).val().toLowerCase()
                    },
                    success: function (data) {
                        if (data != "allowed") {
                            console.log(data);
                            alert('Serial Number already exist!');
                            $('#serial'+ rowcount).val('');
                            return false;
                        }else{
                            if($('#category'+ rowcount).val() && $('#desc'+ rowcount).val() && $('#serial'+ rowcount).val()) {
                                y++;
                                var additem = '<div class="row no-margin" id="row'+y+'"><div class="col-md-2 form-group"><select id="category'+y+'" style="color: black" class="form-control category" row_count="'+y+'"></select></div><div class="col-md-3 form-group"><select id="desc'+y+'" style="color: black" class="form-control desc" row_count="'+y+'"><option selected disabled>select item description</option></select></div><div class="col-md-2 form-group"><input type="text" id="serial'+y+'" class="form-control serial" row_count="'+y+'" placeholder="serial number" style="color: black" onkeyup="checkserial(this)" disabled></div><div class="col-md-1 form-group"><input type="button" class="add_item btn btn-xs btn-primary" btn_id="'+y+'" value="Add Item"></div></div>';
                                $('.add_item[btn_id=\''+rowcount+'\']').val('Remove');
                                $('#category'+ rowcount).prop('disabled', true);
                                $('#desc'+ rowcount).prop('disabled', true);
                                $('#serial'+ rowcount).val($('#serial'+ rowcount).val().toLowerCase().replace(/-/g, ''));
                                $('#serial'+ rowcount).prop('disabled', true);
                                if (r < 20 ) {
                                    $('#reqfield').append(additem);
                                    $('#category'+ rowcount).find('option').clone().appendTo('#category'+y);
                                    $('#itemdiv'+ y).hide();
                                    r++;
                                }
                            }
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                        return false;
                    }
                });
            }
        }else{
            if($('#category'+ rowcount).val() && $('#desc'+ rowcount).val() && $('#serial'+ rowcount).val()) {
                y++;
                var additem = '<div class="row no-margin" id="row'+y+'"><div class="col-md-2 form-group"><select id="category'+y+'" style="color: black" class="form-control category" row_count="'+y+'"></select></div><div class="col-md-3 form-group"><select id="desc'+y+'" style="color: black" class="form-control desc" row_count="'+y+'"><option selected disabled>select item description</option></select></div><div class="col-md-2 form-group"><input type="text" id="serial'+y+'" class="form-control serial" row_count="'+y+'" placeholder="serial number" style="color: black" onkeyup="checkserial(this)" disabled></div><div class="col-md-1 form-group"><input type="button" class="add_item btn btn-xs btn-primary" btn_id="'+y+'" value="Add Item"></div></div>';
                $('.add_item[btn_id=\''+rowcount+'\']').val('Remove');
                $('#category'+ rowcount).prop('disabled', true);
                $('#desc'+ rowcount).prop('disabled', true);
                $('#serial'+ rowcount).val($('#serial'+ rowcount).val().toLowerCase().replace(/-/g, ''));
                $('#serial'+ rowcount).prop('disabled', true);
                if (r < 20 ) {
                    $('#reqfield').append(additem);
                    $('#category'+ rowcount).find('option').clone().appendTo('#category'+y);
                    $('#itemdiv'+ y).hide();
                    r++;
                }
            }
        }
    }else{
        if (r == 20) {
            y++;
            var additem = '<div class="row no-margin" id="row'+y+'"><div class="col-md-2 form-group"><select id="category'+y+'" style="color: black" class="form-control category" row_count="'+y+'"></select></div><div class="col-md-3 form-group"><select id="desc'+y+'" style="color: black" class="form-control desc" row_count="'+y+'"><option selected disabled>select item description</option></select></div><div class="col-md-2 form-group"><input type="text" id="serial'+y+'" class="form-control serial" row_count="'+y+'" placeholder="serial number" style="color: black" onkeyup="checkserial(this)" disabled></div><div class="col-md-1 form-group"><input type="button" class="add_item btn btn-xs btn-primary" btn_id="'+y+'" value="Add Item"></div></div>';
            $('#reqfield').append(additem);
            $('#category'+ rowcount).find('option').clone().appendTo('#category'+y);
            $('#itemdiv'+ y).hide();
            r++;
        }
        $('#category'+rowcount).val('select category');
        $('#desc'+rowcount).val('select item description');
        $('#serial'+rowcount).val('select serial');
        $('#category'+rowcount).prop('disabled', false);
        $('#desc'+rowcount).prop('disabled', false);
        $('#serial'+rowcount).prop('disabled', false);
        $('#row'+rowcount).hide();
        $(this).val('Add Item');
        r--;
    }
});