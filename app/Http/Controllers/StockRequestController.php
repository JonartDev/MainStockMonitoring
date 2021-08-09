<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Location;
use App\Models\Stock;
use App\Models\StockRequest;
use App\Models\Item;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use DB;

class StockRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function stocks()
    {      
        $categories= Category::select('id','category')->get()->sortBy('category');
        $locations= Location::select('id','location')->get()->sortBy('location');
        $items= Item::select('id','item')->get()->sortBy('item');
        $stockreq = StockRequest::select('created_at','request_number','requested_by','status')->where('user_id',auth()->user()->id)->get()->groupBy('request_number');
        $stockreqall = StockRequest::select('created_at','request_number','requested_by','status')->get()->groupBy('request_number');
        $list = DB::table('stocks')->get();
        return view('/pages/stockrequest', compact('list','categories','locations','items','stockreq','stockreqall'));
    }
    public function items(Request $request){ //chef //$request = orders        
        $list = Item::query()->select('items.id','item')
            ->join('categories', 'categories.id', 'items.category_id')
            ->where('items.category_id',$request->category_id)
            ->get();
        return response()->json($list);//finish product send to waiter
    }
    public function saveRequest(Request $request){
        $items= Item::query()->select('id','category_id')
                ->where('item',$request->item)
                ->first();

            $stockRequest = new StockRequest;
            $stockRequest->request_number = $request->request_number;
            $stockRequest->requested_by = auth()->user()->name;
            $stockRequest->user_id = auth()->user()->id;
            $stockRequest->category = $items->category_id;
            $stockRequest->item = $items->id;
            $stockRequest->quantity = $request->quantity;
            $stockRequest->status = 'PENDING';
            $stockRequest->save();
           
            return response()->json($stockRequest);
    }
    public function requestDetails(Request $request){
        $stockreq = StockRequest::query()->select('categories.category','items.item','quantity','status')
            ->join('categories', 'categories.id', 'stock_request.category')
            ->join('items', 'items.id', 'stock_request.item')
            ->where('request_number',$request->reqnum)
            ->get();        
        return DataTables::of($stockreq)
         ->make(true);
    }
    
    public function deleteRequest(Request $request){
        $delete=StockRequest::where('request_number', $request->request_number)->delete();
        
        if($delete){                 
            return redirect('/admin/stockrequest')->with('success','Stock request Deleted successfuly');
        }else{
            return redirect('/admin/stockrequest')->with('fail','something went wrong, please try again');
        }
    }

    public function approvedRequest(Request $request){
            $updating = DB::table('stock_request')
            ->where('request_number',$request->request_number)
            ->update([
                'status'=>'APPROVED'
            ]);
           
            return response()->json($updating);
    }
    public function receivedRequest(Request $request){
        $updating = DB::table('stock_request')
        ->where('request_number',$request->request_number)
        ->update([
            'status'=>'FOR RECEIVING'
        ]);
       
        return response()->json($updating);
    }

    public function saveRequesttoStocks(Request $request){
        $items= Item::query()->select('id','category_id')
                ->where('item',$request->item)
                ->first();

                for ($i=0; $i < $request->qty ; $i++) { 
                    # code...
                    $stocks = new Stock;
                    $stocks->item_id = $request->item;
                    $stocks->category_id = $request->category;
                    $stocks->user_id =auth()->user()->id;
                    $stocks->location_id =$request->location;
                    $stocks->status = 'in';
                    $save= $stocks->save();                   
                }   
                return response()->json($stocks);
    }
}
