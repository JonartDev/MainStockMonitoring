<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLogs;
use App\Models\User;
use App\Models\Stocks;
use App\Models\Item;
use App\Models\Category;
use App\Models\Location;
use DB,Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        $list = DB::table('user_logs')->get(); 
        // $logs=DB::table('user_logs')->insert([
        //     'email' => $UserName,
        //     'activity' => 'logged in'.auth()->user()->id,
        //     'created_at' => $current_date_time,
        // ]);  
        return view('/pages/home', compact('list')); 
    }public function homes(){
        $list = UserLogs::all();
         return DataTables::of($list)
          ->addColumn('created_at', function ($list){
            return Carbon::parse($list->created_at->toFormattedDateString().' '.$list->created_at->toTimeString())->isoFormat('lll');
        })
         ->make(true);
    }    
    public function joborder()
    {      
        return view('/pages/joborder');
    }
    
    public function assembly()
    {      
        return view('/pages/assembly');
    }
    
    public function pullout()
    {      
        return view('/pages/pullout');
    }
    public function filemaintenance()
    {      
        return view('/pages/filemaintenance');
    }
    
    public function stockrequest()
    {      
        return view('/pages/stockrequest');
    }
    
    public function users()
    {      
        $list = DB::table('users')->get();
        return view('/pages/users', compact('list'));
    }public function userss(){
        $list = User::all();
         return DataTables::of($list)
         ->make(true);
    } 
    
   
    
    

}
