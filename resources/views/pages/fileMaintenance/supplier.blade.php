
<div class="container-fluid" >
    <div class="panel-body table-responsive" id="supplierTable" style="display:none"><br>                
        <div class="animate fadeInDown two">
                @if(Session::get('success'))
                    <div class="alert alert-success" style="font-size:14px;">
                        {{ Session::get('success')}}
                    </div>
                @endif
                @if(Session::get('fail'))
                    <div class="alert alert-danger" style="font-size:14px;">
                        {{ Session::get('fail')}}                 
                    </div>
                @endif
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
            <div class="col-md-12 mb-4">
            <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#createSupplier" style="width:180px; font-weight:bold; font-size:10px; border-radius:10px !important;">
                ADD NEW</button> 
            </div>   
            <table id="supTable" class="table supplier display" style="cursor:pointer;width:100%;font-size:12px;">
                <thead>
                    <tr>
                        <td>SUPPLIER CODE</td>
                        <td>SUPPLIER NAME</td>
                        <td>TIN</td>
                        <td>CONTACT PERSON</td>
                        <td>ADDRESS</td>
                        <td>CONTACT NUMBER</td>
                        <td>EMAIL</td>
                    </tr>
                </thead>                 
            </table>
            
        </div>
    </div>
</div>
@include('pages.fileMaintenance.supplier.addsupplier')
@include('pages.fileMaintenance.supplier.updatesupplier')