<div class="container" style="font-size:12px;">
    <div class="modal fade in" id="createItem">
    <div class="modal-dialog modal-mg">
    <div class="modal-content">
        <div class="modal-header" style="background-color:#455357; color:white; height:50px;">
            <h6 class="modal-title">ADD ITEM</h6>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="background-color:white;color:black;">                     
            <form action="{{ route('items.save')}}" method="post" >
                    @csrf          
                <div class="border rounded">  
                    <div class="form-inline mt-2" style="margin-left:35px;">
                        <label>CATEGORY</label>&nbsp;&nbsp;&nbsp;
                        <select class="custom-select" id="category" name="category" class="form-control">
                            <option selected>Choose Category</option>
                                @foreach($categories as $category)
                            <option value="{{$category->id}}">{{strtoupper($category->category)}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-inline mt-1 mb-2" style="margin-left:34px;">
                        <label>ITEM NAME</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control" name="item" style="width:320px;">
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