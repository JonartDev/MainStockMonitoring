<div class="container">
    <div class="modal fade in" id="stocktrans">
    <div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header" style="background-color:black; color:white;height:50px;">
            <h6 class="modal-title">STOCK TRANSFER</h6>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="background-color:white;color:black;">                
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" >Category</label>
                    </div>
                    <select class="form-select" id="categories" name="categories" class="form-control">
                            <option selected>Choose Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{strtoupper($category->category)}}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" >Item</label>
                    </div>
                    <select class="form-select" id="items" name="items">
                            <option selected>Choose Item</option>                     
                    </select>
                </div> 
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" >FROM</label>
                    </div>
                    <select class="form-select" id="locationfrom" name="locationfrom">
                            <option selected>Choose Location</option>
                    </select>
                    &nbsp; &nbsp; &nbsp;
                    <div class="input-group-prepend">
                        <label class="input-group-text" >TO</label>
                    </div>
                    <select class="form-select" id="locationto" name="locationto">
                            <option selected>Choose Location</option>
                        @foreach($locations as $location)
                            <option value="{{$location->id}}">{{$location->location}}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" >Quantity</label>
                    </div>
                    <input type="number" style='font-size:12px' id="quantityst" placeholder="Enter Quantity" name="quantity">
                &nbsp; &nbsp; &nbsp;
                    <div class="input-group-prepend">
                        <label class="input-group-text" >Available Stocks</label>
                    </div>
                    <input type="number" readonly id='strans' name='strans' style='font-size:12px'>

                    <!-- {{DB::table('items')  
                        ->join('stocks', 'item_id', '=', 'items.id')
                        ->select('items.id','item','items.category_id','stocks.location_id','stocks.status')
                        ->where('items.category_id','cat')
                        ->where('items.id','itemaa')
                        ->where('stocks.location_id','loc')
                        ->where('stocks.status','in')
                        ->count();}}
                     -->
                </div> 

                <div class="col-md-12 mb-4">
                    <!-- <button type="submit" style="background-color:#7b8d93" class="btn btn-dark float-right">SAVE</button><br>   -->   
                    <center><button type="submit" id="buttrans" class="btn btn-xs btn-dark submit float-right" style="width:150px; height:40px; font-size:14px;">
                    TRANSFER</button></center>   
                </div>    
                 
        </div>
    </div>
    </div>
    </div>
</div>
