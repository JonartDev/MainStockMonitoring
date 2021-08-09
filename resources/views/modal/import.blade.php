
<div class="container">
    <div class="modal fade in" id="import">
    <div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header" style="background-color:#455357; color:white;">
            <h4 class="modal-title">IMPORT UNDER DEVELOPMENT</h4><br>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="background-color:white;color:black;">
                <form action="#" method="post" enctype="multipart/form-data">  
                    @csrf               
                    <div class="col-md-11 form-group">
                        <input type="file" style="font-size: 14px; height:30px;" name="select_file" class="form-control"/>
                        <div class="text-right" style="font-size:16px;">.xls / .xslx</div> 
                    </div>                    
                    <!-- <div class="form-group col-md-11">
                        <input type="submit" style="font-size:14px; height:40px;" class="btn btn-xs btn-dark submit float-right" value="Upload" name="submit">
                    </div>    -->
                    <div class="form-group col-md-11">
                    <button type="submit" class="btn btn-xs btn-dark submit float-right" style="font-size:14px; width:150px; height:40px;" name="upload">
                    UPLOAD</button>  
                </div> 
                </form>                     
            </div>        
            </div>
    </div>
    </div>
    </div>
</div>
