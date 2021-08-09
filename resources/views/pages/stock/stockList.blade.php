<div class="panel-body table-responsive" id="stockList" style="display:none"><br>
    <div class="animate fadeInDown two">  
        <div class="container-fluid">
            <table id="stockListTable" class="table display" style="cursor:pointer;width:100%; border:0px; font-size:10px;">
                <thead>
                    <tr>
                        <th>ITEM DESCRIPTION</th>
                        <th>CATEGORY</th>
                        <th>CREATED BY</th>
                        <th>LOCATION</th>
                        <th>STATUS</th>
                        <th>CREATED</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $lists)
                    <tr>
                        <td>{{ $lists->item_id}}</td>
                        <td>{{ $lists->category_id}}</td>
                        <td>{{ $lists->user_id}}</td>
                        <td>{{ $lists->location_id}}</td>
                        <td>{{ $lists->status}}</td>
                        <td>{{ $lists->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>      
            </table>
        </div>
    </div>
</div>