<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Supplier;
use App\Models\Item;
use App\Models\User;
use App\Models\ItemTrans;
use App\Models\Category;
use App\Models\Client;
use DB,Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class FileMaintenanceController extends Controller
{
// ITEMS
    public function itemtrans()
    {      
        $list = DB::table('item_transactions')->get();
        return view('/pages/filemaintenance', compact('list'));
        
    }public function itemtranss(){
        $list = ItemTrans::query()
        ->join('suppliers','item_transactions.supplier_id','suppliers.id')
        ->join('clients','item_transactions.client_id','clients.id')
        ->join('items','item_transactions.item_id','items.id')
        ->join('status','item_transactions.status','status.id')
        ->join('users','item_transactions.created_by','users.id')
        ->get();
            return DataTables::of($list)
        ->make(true);

        // $list = ItemTrans::all();
        //  return DataTables::of($list)
        //  ->make(true);
    }public function addtrans(Request $request){
        $request->validate([
            'supplier_id'=>'required',
            'client_id'=>'required',
            'item_id'=>'required',
            'delivery_date'=>'required',
            'warranty'=>'required',
            'warranty_start'=>'required',
            'warranty_end'=>'required',
            'status'=>'required',
        ]);
        
        $item = new ItemTrans;
        $item->supplier_id = $request->supplier_id;
        $item->client_id = $request->client_id;
        $item->item_id = $request->item_id;
        $item->delivery_date = $request->delivery_date;
        $item->ref_del_doc = $request->reference_doc;
        $item->serial_number = $request->serial_number;
        $item->warranty = $request->warranty;
        $item->warranty_start = $request->warranty_start;
        $item->warranty_end = $request->warranty_end;
        $item->status = $request->status;
        $item->remarks = $request->remarks;
        $item->created_by = $request->created_by;
        $item->updated_by = $request->updated_by;
        $save= $item->save();
        if($save){                 
            return redirect('/admin/filemaintenance#item_transactions')->with('success','New Item was created successfuly');
        }else{
            return redirect('/admin/filemaintenance#item_transactions')->with('fail','something went wrong, please try again');
        }
    }

// ITEM MAITENANCE
    public function item()
    {      
        //ITEMS
        $suppliers= Supplier::select('id','supplier_name')->get()->sortBy('supplier_name');
        $clients= Client::select('id','client_name')->get()->sortBy('client_name');
        $items= Item::select('id','item')->get()->sortBy('item');
        $users= User::select('id','name')->get()->sortBy('name');
        $status=  DB::table('status')->select('id','status')->get()->sortBy('status');



        $categories= Category::select('id','category')->get()->sortBy('category');
        $list = DB::table('items')->get();
        return view('/pages/filemaintenance', compact('list','categories','suppliers','clients','items','status','users'));        
    }public function items(){    
        $list = Item::query()
            ->join('categories','items.category_id','categories.id')
            ->get();
        return DataTables::of($list)
         ->make(true);         
    } public function addItem(Request $request){
        $request->validate([
            'category'=>'required',
            'item'=>'required'
        ]);
        
        $item = new Item;
        $item->category_id = $request->category;
        $item->item = $request->item;
        $save= $item->save();
        if($save){                 
            return redirect('/admin/filemaintenance#itemMaintenanceTable')->with('success','New supplier was created successfuly');
        }else{
            return redirect('/admin/filemaintenance#itemMaintenanceTable')->with('fail','something went wrong, please try again');
        }
    }

// SUPPLIER
    public function supplier()
    {      
        $list = DB::table('suppliers')->get();
        return view('/pages/filemaintenance', compact('list'));
        
    }public function suppliers(){
        $list = Supplier::all();
         return DataTables::of($list)
         ->make(true);
    }public function addSupplier(Request $request){
        $request->validate([
            'sup_code'=>'required',
            'sup_name'=>'required',
            'sup_tin'=>'required|min:5|max:12',
            'contact'=>'required',
            'address'=>'required',
            'contactno'=>'required|min:5|max:12',
            'email'=>'required|email|unique:suppliers'
        ]);
        
        $supplier = new Supplier;
        $supplier->supplier_code = $request->sup_code;
        $supplier->supplier_name = $request->sup_name;
        $supplier->TIN =$request->sup_tin;
        $supplier->contact_person = $request->contact;
        $supplier->address = $request->address;
        $supplier->contact_no = $request->contactno;
        $supplier->email = $request->email;
        $save= $supplier->save();
        if($save){                 
            return redirect('/admin/filemaintenance#supplier')->with('success','New supplier was created successfuly');
        }else{
            return redirect('/admin/filemaintenance#supplier')->with('fail','something went wrong, please try again');
        }
    }public function updateSupplier(Request $request){
        $request->validate([
            'sup_code'=>'required',
            'sup_name'=>'required',
            'sup_tin'=>'required',
            'contact'=>'required',
            'address'=>'required',
            'contactno'=>'required',
            'email'=>'required|email'
        ]);      

        $updating = DB::table('suppliers')
        ->where('id',$request ->sid)
        ->update([
            'supplier_code'=>$request->sup_code,
            'supplier_name'=>$request->sup_name,
            'TIN'=>$request->sup_tin,
            'contact_person'=>$request->contact,
            'address'=>$request->address,
            'contact_no'=>$request->contactno,
            'email'=>$request->email
        ]);
        
        if($updating){       
            return redirect('/admin/filemaintenance#supplier')->with('success','Supplier was updated successfully');
        }else{
            return redirect('/admin/filemaintenance#supplier')->with('fail','something went wrong, please try again');
        }

    }
    
// CLIENT
    public function client()
    {      
        $list = DB::table('clients')->get();
        dd($list);
        return view('/pages/filemaintenance', compact('list'));        
    }public function clients(){    
        $list = Client::all();
        return DataTables::of($list)
         ->make(true);         
    } public function addClient(Request $request){
        $request->validate([
            'client_code'=>'required',
            'client_name'=>'required'
        ]);
        
        $client = new Client;
        $client->client_code = $request->client_code;
        $client->client_name = $request->client_name;
        $save= $client->save();
        if($save){                 
            return redirect('/admin/filemaintenance#client')->with('success','New Client was created successfuly');
        }else{
            return redirect('/admin/filemaintenance#client')->with('fail','something went wrong, please try again');
        }
    } public function updateClient(Request $request){
        $request->validate([
            'client_code'=>'required',
            'client_name'=>'required'
        ]);      

        $updating = DB::table('clients')
        ->where('id',$request ->cid)
        ->update([
            'client_code'=>$request->client_code,
            'client_name'=>$request->client_name
        ]);
        
        if($updating){       
            return redirect('/admin/filemaintenance#client')->with('success','Client was updated successfully');
        }else{
            return redirect('/admin/filemaintenance#client')->with('fail','something went wrong, please try again');
        }

    }
       
}
