@extends('layouts.app')
@section('content')
    <div class="panel-body table-responsive"><br>
            <div class="animate fadeInDown two">
                <div class="col-md-12 mb-4">
                    <button id="impScale" data-toggle="modal" data-target="#newStockRequest" style="font-size:12px;width:180px; height:40px; font-weight:bold; background-color:#0d1a80;color:white;">
                    NEW JOB REQUEST</button>
                </div>
        <div class="container-fluid"  id="stockTableMain">
            <table id="#" class="table stock_request display" style="cursor:pointer;width:100%; border:0px; font-size:10px;">
                <thead>                            
                    <tr>
                        <th>DATE</th>
                        <th>JOB ORDER NO.</th>
                        <th>REFERENCE NO.</th>
                        <th>CLIENT NAME</th>
                        <th>REQUESTED BY</th>
                        <th>TYPE</th>
                        <th>STATUS</th>
                    </tr>
                </thead> 
               
            </table>
           
        </div>
    </div>
</div>
@endsection