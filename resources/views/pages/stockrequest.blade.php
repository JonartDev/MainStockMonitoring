@extends('layouts.app')
@section('content')
    <div class="panel-body table-responsive"><br>
            <div class="animate fadeInDown two">
                <div class="col-md-12 mb-4">
                    <button id="impScale" data-toggle="modal" data-target="#newStockRequest" data-backdrop="static" style="font-size:12px;width:180px; height:40px; font-weight:bold; background-color:#0d1a80;color:white;">
                    NEW STOCK REQUEST</button>
                </div>
        <div class="container-fluid"  id="stockTableMain">
            <div class="alert alert-success alert-dismissible"  id="msgDel" style="display:none">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Stock Request successfully deleted!
            </div>            
            @if(!auth()->user()->hasanyRole('purchasing'))
            <table id="stockreqDetails" class="table stock_request display" style="cursor:pointer;width:100%; border:0px; font-size:10px;">
                <thead>                            
                    <tr>
                        <th>DATE</th>
                        <th>REQUEST NUMBER</th>
                        <th>REQUESTED BY</th>
                        <th>STATUS</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach($stockreq as $stock )
                    <tr>
                        <td>{{  $stock->first()->created_at }}</td>
                        <td>{{  $stock->first()->request_number }}</td>
                        <td>{{  $stock->first()->requested_by }}</td>
                        <td>{{  $stock->first()->status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            @if(auth()->user()->hasanyRole('purchasing'))
            <table id="stockreqDetails" class="table stock_request display" style="cursor:pointer;width:100%; border:0px; font-size:10px;">
                <thead>                            
                    <tr>
                        <th>DATE</th>
                        <th>REQUEST NUMBER</th>
                        <th>REQUESTED BY</th>
                        <th>STATUS</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach($stockreqall as $stock )
                    <tr>
                        <td>{{  $stock->first()->created_at }}</td>
                        <td>{{  $stock->first()->request_number }}</td>
                        <td>{{  $stock->first()->requested_by }}</td>
                        <td>{{  $stock->first()->status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
           
        </div>
    </div>
</div>

@include('pages.stockRequest.newStockRequest')
@include('pages.stockRequest.stockRequestDetails')
@endsection