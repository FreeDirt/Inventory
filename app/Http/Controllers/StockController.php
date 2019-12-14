<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Stock;
use App\Device;
use App\Category;
use DB;

class StockController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index(Request $request)
    {    
        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);
        $devices = Device::all();
        $categories = Category::all();

        foreach($devices as $device) {
            $device->phpStocks =  Stock::where('device_id', $device->id)->get();
        }
        // $items = $request->get('per_page');
        $items = $request->items ?? 10;
        $stocks = Stock::orderBy('created_at', 'asc')->paginate($items);
        $laststocks = Stock::orderBy('created_at', 'desc')->take(1)->get();
        
        return view('stock.index', compact('stocks', 'current_user', 'devices', 'categories','laststocks'))->with('items', $items);


        // $catNames = DB::table('stocks')
        // ->join('devices', 'devices.id', 'device_id')
        // ->join('categories', 'categories.id', 'category_id')
        // ->select('categories.name', )
        // ->get();

        // JSON
        // $result = $stocks->getCollection()->transform(function($stock, $key){
        //     return [
        //         'id' => $stock->id,
        //         'serial' => $stock->serial,
        //     ];
        // });
        // return response()->json($result);
    }


    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function stockAjax($id)
    {
        $devices = DB::table("devices")
                    ->where("category_id",$id)
                    ->pluck("name","id");
        return json_encode($devices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->validate($request, [
            'serial' => 'required',
            'item_code' => 'required',
        ]);

        // Create New Message
        $stock = new Stock;
        $stock->name = $request->input('serial');
        $stock->item_code = $request->input('item_code');
        
        // Create New stock
        $stock->save();
        
        // Return Back
        return back()->with('success', 'stock Sent!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'device_id' => 'required',
            'serial' => 'required|unique:stocks|max:255',
            'item_code' => 'required',
        ]);

        // Create New List
        $stock = new Stock;
        $stock->device_id = $request->input('device_id');
        $stock->serial = $request->input('serial');
        $stock->item_code = $request->input('item_code');
        // $stock->user_id = auth()->user()->id;
        $stock->save();
        
        // Return Back
        return redirect('/stock')->with('success', 'New Stock List Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);
        $stock = Stock::find($id);
        return view('stock', compact('stock', 'current_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);
        $stock = Stock::find($id);
        return view('stock')->with(compact('stock','current_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'device_id' => 'required',
            'serial' => 'required',
            'item_code' => 'required',
        ]);

        // Create New List
        $stock = Stock::find($id);
        $stock->stock_id = $request->input('stock_id');
        $stock->serial = $request->input('serial');
        $stock->item_code = $request->input('item_code');

        $stock->save();
        
        // Return Back
        return redirect('/stock')->with('success', 'Updated Stock List!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);
        $stock->delete();
        return redirect('/stock')->with('success', 'Stock Deleted!');
    }
}
