<div class="container" style="font-size:12px;">
    <div class="modal fade in" id="updateItemtrans">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header" style="background-color:#455357; color:white; height:50px;">
            <h6 class="modal-title">UPDATE ITEM</h6>
            <button type="button" class="close" id='modalClose' data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="background-color:white;color:black;">                     
            <form action="{{ route('trans.save')}}" method="post" >
                    @csrf          
                <div class="border rounded">  
                    <div class="form-inline mt-2" style="margin-left:35px;">
                        <label>SUPPLIER</label>&nbsp;&nbsp;&nbsp;
                        <select class="custom-select" id="supplier_id" name="supplier_id" class="form-control" style="width:270px;">
                            <option selected>Select...</option>
                                @foreach($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{strtoupper($supplier->supplier_name)}}</option>
                                @endforeach
                        </select>

                            <label style="margin-left:35px;">WARRANTY</label>&nbsp;&nbsp;&nbsp;
                            <input type="text" class="form-control" name="warranty" id="warranty" style="width:270px;">   
                    </div>
                    <div class="form-inline mt-1" style="margin-left:48px;">
                        <label>CLIENT</label>&nbsp;&nbsp;&nbsp;
                        <select class="custom-select" name="client_id" id="client_id"class="form-control" style="width:270px;">
                            <option selected>Select...</option>
                                @foreach($clients as $client)
                            <option value="{{$client->id}}">{{strtoupper($client->client_name)}}</option>
                                @endforeach
                        </select>
                        
                            <label style="margin-left:5px;">WARRANTY START</label>&nbsp;&nbsp;&nbsp;
                            <input type="date" class="form-control" name="warranty_start" id="warranty_start" style="width:262px;">   
                    </div>
                    <div class="form-inline mt-1" style="margin-left:61px;">
                        <label>ITEM</label>&nbsp;&nbsp;&nbsp;
                        <select class="custom-select" name="item_id" id="item_id" class="form-control" style="width:270px;">
                            <option selected>Select...</option>
                                @foreach($items as $item)
                            <option value="{{$item->id}}">{{strtoupper($item->item)}}</option>
                                @endforeach
                        </select>
                        
                        <label style="margin-left:6px;">WARRANTY END</label>&nbsp;&nbsp;&nbsp;
                            <input type="date" class="form-control" name="warranty_end" id="warranty_end" style="width:270px;">  
                    </div>
                    <div class="form-inline mt-1" style="margin-left:1px;">
                        <label>DELIVERY DATE</label>&nbsp;&nbsp;&nbsp;
                        <input type="date" class="form-control" name="delivery_date" id="delivery_date" style="width:270px;">
                        
                        <label style="margin-left:58px;">STATUS</label>&nbsp;&nbsp;&nbsp;
                        <select class="custom-select"  id="statusUpdate" name="status" class="form-control" style="width:270px;">
                            <option selected>Select...</option>
                                @foreach($status as $stat)
                            <option value="{{$stat->id}}">{{strtoupper($stat->status)}}</option>
                                @endforeach
                        </select>                         
                            
                    </div>
                    <div class="form-inline mt-1">
                        <label>REFERENCE DELIVERY DOCUMENT</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control" name="reference_doc" id="reference_doc" style="width:162px;">
                        
                        <label style="margin-left:45px;">REMARKS</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control" name="remarks" id="remarks" style="width:270px;">  
                    </div>   
                    <div class="form-inline mt-1 mb-2" style="margin-left:51px;">
                        <label>SERIAL</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control" name="serial_number" id="serial_number" style="width:270px;">

                        <!-- <label style="margin-left:30px;">CREATED BY</label>&nbsp;&nbsp;&nbsp; -->
                        <input type="hidden" class="form-control" id="created_by" name="created_by" style="width:270px;">
                        <input type="hidden" class="form-control" id="updated_by" name="updated_by" style="width:270px;">  
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
            $('#updateItemtrans').hide();
        })
    })

</script>