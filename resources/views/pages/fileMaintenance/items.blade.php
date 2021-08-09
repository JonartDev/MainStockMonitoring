<div class="container-fluid">
    <div class="panel-body table-responsive" id="item_transactions" styel="display:none;"><br>
        <div class="animate fadeInDown two">
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
            <div class="col-md-12 mb-4">
            <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#createItemtrans" style="width:180px; font-weight:bold; font-size:10px; border-radius:10px !important;">
                ADD NEW</button> 
            </div>            
            <table id="transcTable" class="table item_transactions display" style="width:100%;">
                <thead data-searchable=true>
                    <tr>
                        <td>SUPPLIER</td>
                        <td>CLIENT</td>
                        <td>ITEM</td>
                        <td>DELIVERY DATE</td>
                        <td>REFERENCE DELIVER DOCUMENT</td>
                        <td>SERIAL</td>
                        <td>WARRANTY</td>
                        <td>WARRANTY START</td>
                        <td>WARRANTY END</td>
                        <td>STATUS</td>
                        <td>REMARKS</td>
                        <td>CREATED BY</td>
                        <td>UPDATED BY</td>
                    </tr>
                </thead>                 
            </table>            
            
        </div>
    </div>
</div>

@include('pages.fileMaintenance.items.additemtrans')
@include('pages.fileMaintenance.items.updateitemtrans')