@extends('layouts.app')
@section('content')
    <div class="panel-body table-responsive"><br>
        <div class="alert alert-success" id="success-alert" style="display:none"> Success Message</div>  
            <div class="animate fadeInDown two">
                <div class="col-md-12 mb-4">
                    <button id="impScale" data-toggle="modal" data-target="#addStock" style="font-size:12px;width:180px; height:40px; font-weight:bold; background-color:#0d1a80;color:white;">
                    ADD STOCK</button>

                    <button id="impScale" data-toggle="modal" data-target="#stocktrans" style="font-size:12px;width:180px;height:40px;  font-weight:bold; background-color:#0d1a80;color:white;">
                    STOCK TRANSFER</button>  
                
                    <button id="impScale" data-toggle="modal" data-target="#import" style="font-size:12px;width:180px; height:40px; font-weight:bold; background-color:#0d1a80;color:white;">
                    IMPORT</button> 
                </div>
        <div class="container-fluid"  id="stockTableMain">
            <table id="stocksTable" class="table stocks display" style="cursor:pointer;width:100%; border:0px; font-size:10px;">
                <thead>                            
                    <tr>
                        <th>CATEGORY</th>
                        <th>DEFECTIVE</th>
                        <th>DEMO</th>
                        <th>ASSEMBLY</th>
                        <th>A1</th>
                        <th>A2</th>
                        <th>A3</th>
                        <th>A4</th>
                        <th>BALINTAWAK</th> 
                        <th>MALABON</th>
                        <th>TOTAL STOCKS</th>
                    </tr>
                </thead>      
            </table>
        </div>
    </div>
</div>
@include('modal.addstock')
@include('modal.stocktransfer')
@include('modal.import')
    
@include('pages.stock.stockItem')


@endsection