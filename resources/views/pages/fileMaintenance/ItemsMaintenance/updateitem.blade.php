<div class="container" style="font-size:12px;">
    <div class="modal fade in" id="updateItem">
    <div class="modal-dialog modal-mg">
    <div class="modal-content">
        <div class="modal-header" style="background-color:#455357; color:white; height:50px;">
            <h6 class="modal-title">UPDATE ITEM</h6>
            <button type="button" class="close" id='modalClose' data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="background-color:white;color:black;">                     
            <form action="{{ route('items.save')}}" method="post" >
                    @csrf          
                <div class="border rounded">  
                    <input type="hidden" class="form-control" id="itemid" name="itemid" style="width:320px;">
                    <div class="form-inline mt-2" style="margin-left:21px;">
                        <label>CATEGORY ID</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control" id="catid" name="catid" style="width:320px;">
                    </div>
                    <div class="form-inline mt-1" style="margin-left:37px;">
                        <label>CATEGORY</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control" id="cat" name="cat" style="width:320px;">
                    </div>
                    <div class="form-inline mt-1 mb-2" style="margin-left:34px;">
                        <label>ITEM NAME</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control" name="item" id="item" style="width:320px;font-size:12px;">
                    </div>                  
                </div> 
                <center><button type="submit" class="btn btn-xs btn-dark mt-2 float-right"style="width:150px; font-size:10px;">
                    SAVE</button></center> 
            </form> 
                 
        </div>
    </div>
    </div>
    </div>
</div>
<script>
    $(function () {
        $('#modalClose').on('click', function () {
            $('#updateItem').hide();
        })
    })

</script>