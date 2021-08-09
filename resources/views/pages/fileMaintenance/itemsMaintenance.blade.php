<div class="container-fluid">
    <div class="panel-body table-responsive "  id="itemMaintenanceTable" style="display:none;"><br>
        <div class="animate fadeInDown two">
            <div class="col-md-12 mb-4">
            <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#createItem" style="width:180px; font-weight:bold; font-size:10px; border-radius:10px !important;">
                ADD NEW</button> 
            </div>
            @if(Session::get('success'))
                    <div class="alert alert-success" id="success-alert" style="font-size:14px;">
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
            <table id="MaintenanceTable" class="table items display" style="cursor:pointer;width:100%;font-size:12px;">
                <thead>
                    <tr>
                        <td>CATEGORY ID</td>
                        <td>ITEM</td>
                    </tr>
                </thead>                 
            </table>            
        </div>
    </div>
</div>
@include('pages.fileMaintenance.ItemsMaintenance.additem')
@include('pages.fileMaintenance.ItemsMaintenance.updateitem')