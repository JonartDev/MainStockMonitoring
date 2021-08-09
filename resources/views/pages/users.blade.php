@extends('layouts.app')
@section('content')
<div class="panel-body table-responsive "><br>
    <div class="animate fadeInDown two">
        <h4 class="text-center">USER ACCCOUNT</h4>        
        <div class="container-fluid">
            <table id="userTable" class="table" style="width:100%; border:0px; font-size:12px;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>TIME CREATED</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($list as $user)            
                        <tr>     
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>     
                        </tr>      
                    @endforeach    
                </tbody>    
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#userTable').DataTable({
            "dom": '<"top"i>rt<"bottom"flp><"clear">',
            "language": {
                "emptyTable": " ",
                "processing": "Searching"
            },
            });
        } );
</script>
@endsection