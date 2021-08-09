<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;
use App\Models\Stock;
use App\Models\Item;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'category'=>'required',
        //     'item'=>'required',
        //     'location'=>'required',
        //     'quantity'=>'required'
        // ]);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 
        for ($i=0; $i < $request->qty ; $i++) { 
            $stocks = Stock::where('item_id','=',$request->item)
                ->where('location_id',$request->locationfrom)
                ->where('status','in')
                ->first();                
            $stocks->location_id = $request->locationto;
            $stocks->save();
        }
        
            return response()->json($stocks);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function stocks()
    {      
        $categories= Category::select('id','category')->get()->sortBy('category');
        $locations= Location::select('id','location')->get()->sortBy('location');
        $items= Item::select('id','item')->get()->sortBy('item');
        $list = DB::table('stocks')->get();
        return view('/pages/stocks', compact('list','categories','locations','items'));
    }public function stockss(){
        $list = Category::query()->select('categories.id',
            DB::raw
            (
                'categories.category as Category'
            ),
            DB::raw
            (
                'SUM(CASE WHEN stocks.status = \'Defective\' THEN 1 ELSE 0 END) as Defective'
            ),
            DB::raw
            (
                'SUM(CASE WHEN stocks.status = \'Demo\' THEN 1 ELSE 0 END) as Demo'
            ),
            DB::raw
            (
                'SUM(CASE WHEN stocks.location_id = \'7\' AND stocks.status = \'in\' THEN 1 ELSE 0 END) as Assembly'
                // 'SUM(CASE WHEN stocks.status = \'Assembly\' THEN 1 ELSE 0 END) as Assembly'
            ),
            DB::raw
            (
                'SUM(CASE WHEN stocks.location_id = \'1\' AND stocks.status = \'in\' THEN 1 ELSE 0 END) as A1'
            ),
            DB::raw
            (
                'SUM(CASE WHEN stocks.location_id = \'2\' AND stocks.status = \'in\' THEN 1 ELSE 0 END) as A2'
            ),
            DB::raw
            (
                'SUM(CASE WHEN stocks.location_id = \'3\' AND stocks.status = \'in\' THEN 1 ELSE 0 END) as A3'
            ),
            
            DB::raw
            (
                'SUM(CASE WHEN stocks.location_id = \'4\' AND stocks.status = \'in\' THEN 1 ELSE 0 END) as A4'
            ),
            
            DB::raw
            (
                'SUM(CASE WHEN stocks.location_id = \'5\' AND stocks.status = \'in\' THEN 1 ELSE 0 END) as Balintawak'
            ),
            DB::raw
            (
                'SUM(CASE WHEN stocks.location_id = \'6\' AND stocks.status = \'in\' THEN 1 ELSE 0 END) as Malabon'
            ),
            DB::raw
            (
                'SUM(CASE WHEN stocks.status = \'\' THEN 0 ELSE 1 END) as Total_stocks'
            ),
        )
        ->join('stocks', 'categories.id', 'category_id')
        ->groupBy('categories.id');
        // $defective = Stocks::query()->where('status','Defective');
        // $demo = Stocks::query()->where('status','Demo');
        // ->addColumn('updated_at', function (BufferNo $buffer){
        //     return Carbon::parse($buffer->created_at->toFormattedDateString().' '.$buffer->created_at->toTimeString())->isoFormat('lll');
        // })
         return DataTables::of($list)
        //  ->addColumn('Defective', function($data) use ($defective){
        //     $def = $defective->where('item_id',$data->id);
        //     return $def->count();
        //  })
        //  ->addColumn('Demo', function($data) use($stocks){            
        //     $def = $stocks
        //         ->where('item_id',$data->id);
        //     return $def->count();
        //  })
        //  ->addColumn('Assembly', function($data) use($stocks){
        //     $def = $stocks->where('status','Assembly')
        //         ->where('item_id',$data->id);
        //     return $def->count();
        //  })
        //  ->addColumn('A1', function($data) use($stocks){
        //     $def = $stocks->where('status','in')
        //         ->where('location_id','1')
        //         ->where('item_id',$data->id);
        //     return $def->count();
        //  })
        //  ->addColumn('A2', function($data) use($stocks){
        //     $def = $stocks->where('status','in')
        //         ->where('location_id','2')
        //         ->where('item_id',$data->id);
        //     return $def->count();
        //  })
        //  ->addColumn('A3', function($data) use($stocks){
        //     $def = $stocks->where('status','in')
        //         ->where('location_id','3')
        //         ->where('item_id',$data->id);
        //     return $def->count();
        //  })
        //  ->addColumn('A4', function($data) use($stocks){
        //     $def = $stocks->where('status','in')
        //         ->where('location_id','4')
        //         ->where('item_id',$data->id);
        //     return $def->count();
        //  })
        //  ->addColumn('Balintawak', function($data) use($stocks){
        //     $def =  $stocks->where('status','in')
        //         ->where('location_id','5')
        //         ->where('item_id',$data->id);
        //     return $def->count();
        //  })
        //  ->addColumn('Malabon', function($data) use($stocks){
        //     $def = $stocks->where('status','in')
        //         ->where('location_id','6')
        //         ->where('item_id',$data->id);
        //     return $def->count();
        //  })
        //  ->addColumn('Total_stocks', function($data) use($stocks){
        //     $def =  $stocks->where('item_id',$data->id);
        //     return $def->count();
        //  })
         ->make(true);
    }public function stocklist(){
        $list = Stock::all();
         return DataTables::of($list)
         ->make(true);
    }public function stockItem(Request $request){
        $list = Item::query()
        ->join('stocks', 'items.id', 'item_id')
        ->where('items.category_id', $request->category)
        ->select('item as Item_Description',
            DB::raw
            (
                'SUM(CASE WHEN stocks.status = \'Defective\' THEN 1 ELSE 0 END) as Defective'
            ),
            DB::raw
            (
                'SUM(CASE WHEN stocks.status = \'Demo\' THEN 1 ELSE 0 END) as Demo'
            ),
            DB::raw
            (
                'SUM(CASE WHEN stocks.location_id = \'7\' AND stocks.status = \'in\' THEN 1 ELSE 0 END) as Assembly'
            ),
            DB::raw
            (
                'SUM(CASE WHEN stocks.location_id = \'1\' AND stocks.status = \'in\' THEN 1 ELSE 0 END) as A1'
            ),
            DB::raw
            (
                'SUM(CASE WHEN stocks.location_id = \'2\' AND stocks.status = \'in\' THEN 1 ELSE 0 END) as A2'
            ),
            DB::raw
            (
                'SUM(CASE WHEN stocks.location_id = \'3\' AND stocks.status = \'in\' THEN 1 ELSE 0 END) as A3'
            ),
            
            DB::raw
            (
                'SUM(CASE WHEN stocks.location_id = \'4\' AND stocks.status = \'in\' THEN 1 ELSE 0 END) as A4'
            ),
            
            DB::raw
            (
                'SUM(CASE WHEN stocks.location_id = \'5\' AND stocks.status = \'in\' THEN 1 ELSE 0 END) as Balintawak'
            ),
            DB::raw
            (
                'SUM(CASE WHEN stocks.location_id = \'6\' AND stocks.status = \'in\' THEN 1 ELSE 0 END) as Malabon'
            ),
            DB::raw
            (
                'SUM(CASE WHEN stocks.status = \'\' THEN 0 ELSE 1 END) as Total_stocks'
            )
        )
        ->groupBy('items.item')->get();
        return DataTables::of($list)
        ->make(true);
    } 
    
    
    public function addStockitem(Request $request){
        $list = Item::query()->select('id','item')
            ->where('category_id',$request->category_id)
            ->get();
        return response()->json($list);
    }
    public function items(Request $request){ //chef //$request = orders
        $list = Item::query()->select('item_id','item')
            ->join('stocks', 'stocks.item_id', 'items.id')
            ->where('stocks.status', 'in') //order
            ->where('stocks.category_id',$request->category_id) //order
            ->groupBy('items.id')
            ->get();
        return response()->json($list); //finish product send to waiter
    }
    public function locations(Request $request){
        $location = Stock::query()
            ->select('location_id','location')
            ->join('locations','locations.id','location_id')
            ->where('status', 'in')
            ->where('item_id', $request->item_id)
            ->groupBy('location_id')
            ->get();
        return response()->json($location);
    }
    public function stocksAvailable(Request $request){
        $count = Stock::query()
                ->select('category_id','items_id','location_id','status')
                ->where('category_id',$request->category_id)
                ->where('item_id',$request->item_id)
                ->where('location_id',$request->location_id)
                ->where('status','in')
                ->count();
        return response()->json($count);
    }
    public function itemstrans(Request $request){

        $list = Item::query()
                ->join('stocks', 'item_id', '=', 'items.id')
                ->select('items.id','item','items.category_id','stocks.location_id','stocks.status')
                ->where('items.category_id',$request->categories)
                ->where('items.id',$request->items)
                ->where('stocks.location_id',$request->locationfrom)
                ->where('stocks.status','in')
                ->get();
        return $list;


        // for ($i=0; $i < $request->qty ; $i++) { 
        //     # code...
        //     $updating = DB::table('stocks')
        //     ->where('item_id',$request ->input('items'))
        //     ->where('category_id',$request ->input('categories'))
        //     ->where('user_id',auth()->user()->id)
        //     ->where('location_id',$request ->input('locationfrom'))
        //     ->update([
        //         'location_id'=>$request->input('locationto'),
        //         'status'=>$request->input('in')
        //     ]);
        // } 
        
        // return response()->json($stocks);

        // $list = Stock::query()->select('id','item','category_id')
        //         ->join('stocks', 'item_id', '=', 'items.id')
        //         ->where('stocks.status','in')->get();
        // return $list;
    }

}
