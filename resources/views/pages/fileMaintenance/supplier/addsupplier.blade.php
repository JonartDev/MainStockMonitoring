<div class="container" style="font-size:12px;">
    <div class="modal fade in" id="createSupplier">
    <div class="modal-dialog modal-mg">
    <div class="modal-content">
        <div class="modal-header" style="background-color:#455357; color:white; height:50px;">
            <h6 class="modal-title">ADD SUPPLIER</h6>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="background-color:white;color:black;">                     
            <form action="{{ route('supplier.save')}}" method="post" >
                    @csrf          
                <div class="border rounded">  
                    <div class="form-inline mt-2" style="margin-left:35px;">
                        <label>SUPPLIER CODE</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control" name="sup_code" style="width:320px;">
                    </div>
                    <div class="form-inline mt-1" style="margin-left:34px;">
                        <label>SUPPLIER NAME</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control" name="sup_name" style="width:320px;">
                    </div> 
                    <div class="form-inline mt-1" style="margin-left:72px;">
                        <label>ADDRESS</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control" name="address" style="width:320px;">
                    </div>               
                    <div class="form-inline mt-1" style="margin-left:105px;">
                        <label>TIN</label>&nbsp;&nbsp;&nbsp;
                        <input type="number" class="form-control" name="sup_tin" style="width:320px;">
                    </div>
                    <div class="form-inline mt-1" style="margin-left:18px;">
                        <label>CONTACT PERSON</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control" name="contact" style="width:320px;">
                    </div>
                    <div class="form-inline mt-1" style="margin-left:14px;">
                        <label>CONTACT NUMBER</label>&nbsp;&nbsp;&nbsp;
                        <input type="number" class="form-control" name="contactno" style="width:320px;">
                    </div>
                    <div class="form-inline mt-1 mb-2" style="margin-left:88px;">
                        <label>EMAIL</label>&nbsp;&nbsp;&nbsp;
                        <input type="email" class="form-control" name="email" style="width:320px;">
                    </div>
                </div> 
                <center><button type="submit" class="btn btn-xs btn-dark mt-2 float-right"style="width:150px; height:40px; font-size:10px;">
                    SAVE</button></center> 
            </form> 
                 
        </div>
    </div>
    </div>
    </div>
</div>