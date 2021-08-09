    @extends('layouts.app')
    @section('content')
    <script src="{{ asset('js/home.js') }}"></script>
    <div class="container pt-5">
    <div class="animate fadeInDown two">
        <div class="container-fluid">
                <div class="row">
                    @if(!auth()->user()->hasanyRole('purchasing'))
                    <div class="col-sm-2">
                            <div class="card bg-card ml-2" style="min-height: 90px; width:150px;">
                                <div class="card-header" style="min-height: 60px; background-color: #0d1a80; color: white;font-family:arial;font-size:80%;font-weight: bold">
                                    STOCKS                                
                                </div>
                                <div class="card-body text-center">
                                {{DB::table('stocks')->count();}}
                                </div>
                            </div>
                    </div>
                    @endif
                    @if(auth()->user()->hasanyRole('purchasing','admin','warehouse'))
                    <div class="col-sm-2">
                            <div class="card bg-card ml-2" style="min-height: 90px; width:150px;">
                                <div class="card-header" style="min-height: 60px; background-color: #0d1a80; color: white;font-family:arial;font-size:80%;font-weight: bold">
                                    STOCK REQUEST
                                </div>
                                <div class="card-body text-center">                               
                                {{DB::table('stock_request')->get()->groupBy('request_number')->count();}}
                                </div>
                            </div>
                    </div>
                    @endif
                    @if(!auth()->user()->hasanyRole('purchasing'))
                    <div class="col-sm-2">
                            <div class="card bg-card ml-2" style="min-height: 90px;width:150px;">
                                <div class="card-header" style="min-height: 60px; background-color: #0d1a80; color: white;font-family:arial;font-size:80%;font-weight: bold">
                                    JOB ORDER
                                </div>
                                <div class="card-body text-center">
                                0
                                </div>
                            </div>
                    </div>
                    <div class="col-sm-2">
                            <div class="card bg-card ml-2" style="min-height: 90px;width:150px;">
                                <div class="card-header" style="min-height: 60px; background-color: #0d1a80; color: white;font-family:arial;font-size:80%;font-weight: bold">
                                    DELIVERY
                                </div>
                                <div class="card-body text-center">
                                    0
                                </div>
                            </div>
                    </div>
                    <div class="col-sm-2">
                            <div class="card bg-card ml-2" style="min-height: 90px;width:150px;">
                                <div class="card-header" style="min-height: 60px; background-color: #0d1a80; color: white;font-family:arial;font-size:80%;font-weight: bold">
                                    PULLOUT
                                </div>
                                <div class="card-body text-center">
                                    0
                                </div>
                            </div>
                    </div>
                    @endif
                </div>
        </div>
    </div>
    </div>
    <div class="container-fluid">
        <div class="panel-body table-responsive "><br>
            <div class="animate fadeInDown two">
                <h4 class="text-center">USER ACTIVITY LOGS</h4>
                <table id="#" class="table user_logs" style="width:100%;font-size:12px;">
                    <thead>
                        <tr>
                            <td>DATE</td>
                            <td>NAME</td>
                            <td>ACTIVITY</td>
                        </tr>
                    </thead>                 
                </table>
            </div>
        </div>
    </div>
    @endsection
