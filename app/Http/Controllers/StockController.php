<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Stock;
use App\Device;
use App\Category;
use App\Employee;
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
        $employees = Employee::all();
        $stocks = Stock::all();

        $devCounts = DB::table('devices')
            ->leftJoin('stocks', 'devices.id', '=', 'stocks.device_id')
            ->leftJoin('categories', 'categories.id', '=', 'devices.category_id')
            ->select(DB::raw('ifnull(count(serial),0) as seCount, categories.name as catNames, count(employee_id) as empTotal, categories.id as items'))
            ->groupBy('category_id')
            ->get();

        // dd($devCounts);

        foreach($stocks as $stock) {
            $stock->phpStocks = Device::where('id', $stock->device_id)->distinct()->get();
            $stock->catcounts = Category::where('id', '=', $stock->device->category_id)->distinct()->count();
        }
        
        // foreach($devices as $device) {
        //         $device->phpStocks = Stock::where('device_id', $device->id)->distinct()->get();
        // //         // $deviceas =  Category::where('categories.id', $device->category_id)->distinct()->count();
        //         $device->total = Device::where('category_id', $device->category_id)->pluck('name', 'id');
        // //         // $device->test =  DB::table('stocks')->where('device_id', $device->id)
        // //         //                 ->join('devices', 'devices.id', '=', 'stocks.device_id')
        // //         //                 ->join('categories', 'categories.id', '=', 'devices.category_id')
        // //         //                 ->distinct()->count();
        //         $device->employee = DB::table('stocks')->where('device_id', $device->id)
        //                             ->join('employees', 'employees.id', '=', 'stocks.employee_id')
        //                             ->distinct()->get();
        //     // dd($device->employee);
        // }
        // $items = $request->get('per_page');
        
        $items = $request->items ?? 10;
        $stocks = Stock::orderBy('created_at', 'asc')->paginate($items);
        $laststocks = Stock::orderBy('created_at', 'desc')->take(1)->get();

        return view('stock.index', compact(
            'stocks',
            'current_user',
            'devices',
            'categories',
            'laststocks',
            'employees', 'devCounts'))->with('items', $items);
        
        // $useDevices = DB::table('stocks')
        // ->join('employees', 'stocks.employee_id', '=', 'employees.id')
        // ->where('employees.id', '=', 1)
        // ->sum('stocks.id');
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

    public function allItems()
    {
        $userId = auth()->user()->id;
        $current_user = User::find($userId);

        $allItems = DB::table('devices')
        ->leftJoin('stocks', 'devices.id', '=', 'stocks.device_id')
        ->leftJoin('employees', 'employees.id', '=', 'stocks.employee_id')
        ->leftJoin('categories', 'categories.id', '=', 'devices.category_id')
        ->leftJoin('brands', 'brands.id', '=', 'devices.brand_id')
        ->select(DB::raw('devices.name as device,
                        categories.name as category,
                        brands.name as brand,
                        employees.name as user,
                        employees.id as empId,
                        stocks.id as stockId,
                        serial as serial,
                        description as description,
                        model_year as model_year,
                        cost as cost'))
        // ->groupBy('category_id')
        // ->orderBy('employees.id')
        ->orderBy('category', 'desc')
        ->get();

    // dd($items);
    
    return view('stock.allitems', compact('current_user', 'allItems'));

    }

    public function getItems($items)
    {
        $userId = auth()->user()->id;
        $current_user = User::find($userId);

        // dd( $current_user );

        // $catID = Category::find($id);
        
        // // $inventories = Inventory::where('title', '*name of the item')->get();
        // dd($catID);


        // $cats = DB::table('categories')->where('id', $id)
        // ->leftJoin('devices', 'devices.id', '=', 'stocks.device_id')
        // ->leftJoin('categories', 'categories.id', '=', 'devices.category_id')
        // ->select(DB::raw('categories.name as catName, categories.sub_cat as sub_cat, employee_id as empID, devices.name as devName, serial as deviceSerial, stocks.created_at as dateAdded'))
        // ->orderBy('categories.sub_cat', 'asc')
        // ->groupBy('stocks.device_id')
        // ->get()->toArray();

        $cats = DB::table('devices')->where('category_id', $items)
            ->leftJoin('stocks', 'devices.id', '=', 'stocks.device_id')
            ->leftJoin('employees', 'employees.id', '=', 'stocks.employee_id')
            ->leftJoin('categories', 'categories.id', '=', 'devices.category_id')
            ->leftJoin('brands', 'brands.id', '=', 'devices.brand_id')
            ->select(DB::raw('devices.name as device,
                            categories.name as category,
                            brands.name as brand,
                            employees.name as user,
                            employees.id as empId,
                            stocks.id as stockId,
                            serial as serial,
                            description as description,
                            model_year as model_year,
                            cost as cost'))
            // ->groupBy('category_id')
            ->orderBy('employees.id', 'desc')
            ->get();

        // dd($cats);
        
        return view('stock.items', compact('current_user', 'cats'));
    }

   
    public function search(Request $request)
    {
        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);
        $search = $request->get('search');
        $categories = Category::all();
        $devices = Device::all();
        $employees = Employee::all();
        
        $items = $request->items ?? 10;
        $stocks = Stock::where('id', 'like', '%' .$search. '%')
        ->orWhere('serial', 'like', '%' .$search. '%')
        ->orWhere('item_code', 'like', '%' .$search. '%')
        ->orWhere('device_id', 'like', '%' .$search. '%')
        ->orWhere('created_at', 'like', '%' .$search. '%')
        ->orWhere('updated_at', 'like', '%' .$search. '%')->paginate($items);

        $laststocks = Stock::orderBy('created_at', 'desc')->take(1)->get();

        return view('stock.search', compact('stocks', 'current_user', 'devices', 'categories','laststocks','employees','search'));
        // return view('inventory.index')->with('inventories', $inventories);

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
            'description' => 'nullable',
            'item_code' => 'required',
        ]);

        // Create New Message
        $stock = new Stock;
        $stock->name = $request->input('serial');
        $stock->description = $request->input('description');
        $stock->item_code = $request->input('item_code');
        $stock->employee_id = $request->input('employee_id');
        
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
            'description' => 'nullable',
            'item_code' => 'required',
        ]);

        // Create New List
        $stock = new Stock;
        $stock->device_id = $request->input('device_id');
        $stock->serial = $request->input('serial');
        $stock->description = $request->input('description');
        $stock->item_code = $request->input('item_code');
        $stock->employee_id = $request->input('employee_id');
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
        return view('stock.show', compact('stock', 'current_user'));
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
        $categories = Category::all();
        $stocks = Stock::all();
        $stock = Stock::find($id);
        $devices = Device::all();
        $employees = Employee::all();
        

        return view('stock.edit')->with(compact('stocks', 'stock','current_user','categories','devices','employees'));
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
            'description' => 'nullable',
            'item_code' => 'required',
        ]);

        // Create New List
        $stock = Stock::find($id);
        $stock->device_id = $request->input('device_id');
        $stock->serial = $request->input('serial');
        $stock->description = $request->input('description');
        $stock->item_code = $request->input('item_code');
        $stock->employee_id = $request->input('employee_id');

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
