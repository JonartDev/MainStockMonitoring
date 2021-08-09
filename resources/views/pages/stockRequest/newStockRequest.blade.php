<div class="container table-responsive">
    <div class="modal fade in" id="newStockRequest">
    <div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header text-center" style="background-color:black; color:white;height:45px;">
            <h6 class="modal-title w-100">NEW STOCK REQUEST</h6>    
            <button type="button" class="close" id="close">&times;</button>
        </div>
        <div class="modal-body" style="background-color:white;color:black;">                          
                    <!-- <button type="submit" style="background-color:#7b8d93" class="btn btn-dark float-right">SAVE</button><br>   -->   
                
            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="form-inline" style="margin-left:35px;">
                    <input class="form-control form-control-sm"  id="daterequest"style="width:340px;" type="text" readonly value="{{Carbon\Carbon::now()->isoFormat('DD/MM/Y')}}"> &nbsp;&nbsp;
                    <input class="form-control form-control-sm" id="request_num" style="width:340px;" type="text" placeholder="Request No.">
                </div>
                <div class="form-inline mt-1" style="margin-left:35px;">
                    <input class="form-control form-control-sm" id="requested_by" style="width:340px;" type="text" readonly value="{{auth()->user()->name}}">
                </div>
        </div>
        <div class="modal-header text-center" style="background-color:black; color:white;height:45px;">
            <h6 class="modal-title w-100">REQUEST DETAILS</h6>
        </div>        


        <form class="mt-2 mb-2">
            <div class="form-inline" style="margin-left:8px;">
                <select class="form-select" id="categoryReq" class="form-control" style="height:30px !important;width:300px;">
                        <option selected>Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{strtoupper($category->category)}}</option>
                        @endforeach
                </select>
                
                <select class="form-select" id="itemReq"class="form-control" style="height:30px !important;width:300px;">
                    <option selected>Select Item</option>
                </select>
            
                <input class="form-control" id="qtyReq" style="width:70px;height:30px;" type="number" placeholder="Qty">&nbsp;  
            
                <input type="button" class="add-row" value="ADD ITEM" style="font-size:12px;width:100px;height:30px;">
            </div>          
        </form>

        <div class="container-fluid"  id="#stockRequestDiv">
            <table id='stockRequestTable'class="table display" style="cursor:pointer; border:0px; font-size:10px; display:none;">
                <thead>                            
                    <tr>
                        <th>CATEGORY</th>
                        <th>ITEM DESCRIPTION</th>
                        <th>QTY</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>      
            </table>
        </div>  
            <div class="col-md-12 mt-2 mb-4 form-inline" style="margin-left:550px;"> 
                <button type="submit" id="requestClose"  
                class="btn btn-xs btn-dark submit float-right"  style="height:30px;width:100px; font-size:12px; display:none;">
                CLOSE</button>&nbsp;&nbsp;
                <button type="submit" id="requestSave" class="btn btn-xs btn-dark submit float-right"  style="height:30px;width:100px; font-size:12px; display:none;">
                SUMBIT</button>
            </div> 
    </div>
    </div>
    </div>
</div>