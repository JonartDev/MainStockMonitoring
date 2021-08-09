<div class="container">
    <div class="modal fade in" id="addStock">
    <div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header" style="background-color:black; color:white;height:50px;">
            <h6 class="modal-title">ADD STOCK</h6>
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
                <div class="input-group mb-3" >
                    <div class="input-group-prepend">
                        <label class="input-group-text">Category</label>
                    </div>
                    <select class="form-select" id="category" name="category" class="form-control">
                            <option selected>Choose Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{strtoupper($category->category)}}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text">Item</label>
                    </div>
                    <select class="form-select" id="item" name="item">
                            <option selected>Choose Item</option>                        
                    </select>
                </div> 
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text">Location</label>
                    </div>
                    <select class="form-select" id="location" name="location">
                            <option selected>Choose Location</option>
                        @foreach($locations as $location)
                            <option value="{{$location->id}}">{{$location->location}}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text">Quantity</label>
                    </div>
                    <input type="number" id="quantity" placeholder="Enter Quantity" name="quantity" style='font-size:12px'>
                &nbsp; &nbsp; &nbsp;
                    <!-- <div class="input-group-prepend">
                        <label class="input-group-text">Available Stocks</label>
                    </div>
                    <input type="text" disabled> -->
                </div> 

                <div class="col-md-12 mb-4">
                    <!-- <button type="submit" style="background-color:#7b8d93" class="btn btn-dark float-right">SAVE</button><br>   -->   
                    <center><button type="submit" id="butsave" class="btn btn-xs btn-dark submit float-right" style="width:180px; font-size:12px;">
                    ADD</button></center>   
                </div>    
                 
        </div>
    </div>
    </div>
    </div>
</div>