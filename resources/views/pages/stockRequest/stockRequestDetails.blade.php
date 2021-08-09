<div class="container table-responsive">
    <div class="modal fade in" id="stockRequestDetails">
    <div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header text-center" style="background-color:black; color:white;height:45px;">
            <h6 class="modal-title w-100">STOCK REQUEST DETAILS</h6>            
            <button type="button" class="close" id='modalClose' data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="background-color:white;color:black;">                          
                    <!-- <button type="submit" style="background-color:#7b8d93" class="btn btn-dark float-right">SAVE</button><br>   -->   
                
            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="form-inline" style="margin-left:35px;">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" >DATE</label>
                        </div>
                        <input class="input-group-text "  id="daterequestdetails" style="width:285px;" type="text" readonly > &nbsp;&nbsp;
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" >REQUEST NUMBER</label>
                        </div>
                        <input class="input-group-text" id="request_num_details" style="width:220px;" type="text" readonly>
                    </div>
                </div>
                <div class="form-inline mt-1" style="margin-left:35px;">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" >REQUESTED BY</label>
                        </div>
                        <input class="input-group-text" id="requested_by_details"style="width:228px;" type="text" readonly > &nbsp;&nbsp;
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" >STATUS</label>
                        </div>
                        <input class="input-group-text" id="status_details" style="width:286px;" type="text" readonly >
                    </div>
                </div>
        </div>
        <div class="modal-header text-center" style="background-color:black; color:white;height:45px;">
            <h6 class="modal-title w-100">REQUEST DETAILS</h6>
        </div>      

            <table id="stockDetailsrequest" class="table stockDetails display" style="cursor:pointer; border:none; font-size:10px;">
                <thead>                            
                    <tr>
                        <th>CATEGORY</th>
                        <th>ITEM DESCRIPTION</th>
                        <th>QTY</th>
                        <th>STATUS</th>
                    </tr>
                </thead>    
            </table>
            <div class="col-md-12 mt-2 mb-4">
            @if(auth()->user()->hasanyRole('purchasing'))
            <button type="submit" id="requestApproved" class="btn btn-xs btn-dark submit float-left"  style="height:30px;width:100px; font-size:12px;display:none;">
                APPROVED</button>

            <button type="submit" id="requestForReceiving" class="btn btn-xs btn-dark submit ml-2 float-left"  style="height:30px;width:150px; font-size:12px; display:none;">
            FOR RECIEVING</button>
            @endif

            @if(auth()->user()->hasanyRole('warehouse'))    
            <button type="submit" id="requestReceived" class="btn btn-xs btn-dark submit float-left"  style="height:30px;width:100px; font-size:12px;">
                RECEIVED</button>
            @endif

            <center><button type="submit" id="requestDel" class="btn btn-xs btn-dark submit float-right"  style="height:30px;width:100px; font-size:12px;">
                DELETE</button></center>   
            </div> 
    </div>
    </div>
    </div>
</div>

<script>
    $(function () {
        $('#modalClose').on('click', function () {
            $('#stockRequestDetails').hide();
        })
        
    })

    $('table.stockDetails tbody').on('click', 'tr', function () {
        console.log('category');
        
    } );

</script>