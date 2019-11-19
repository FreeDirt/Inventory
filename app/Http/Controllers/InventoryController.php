<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Category;
use App\Brand;
use App\User;
// use DB;

class InventoryController extends Controller
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
    public function index()
    {
        // $inventories = Inventory::all();
        // $inventories = Inventory::where('title', '*name of the item')->get();
        // $inventories = DB::select('SELECT * FROM inventories');
        // $inventories = Inventory::orderBy('description', 'desc')->get();
        // $inventories = Inventory::orderBy('description', 'desc')->take(1)->get();

        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);
        $inventories = Inventory::orderBy('created_at', 'desc')->paginate(10);
        return view('inventory.index', compact('inventories', 'current_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);
        $categories = Category::all();
        $brands = Brand::all();
        return view('inventory.create', compact('categories', 'brands', 'current_user'));
    }

    public function search(Request $request)
    {
        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);
        $search = $request->get('search');
        
        $inventories = Inventory::where('description', 'like', '%' .$search. '%')
        ->orWhere('category_id', 'like', '%' .$search. '%')
        ->orWhere('brand_id', 'like', '%' .$search. '%')
        ->orWhere('model_number', 'like', '%' .$search. '%')
        ->orWhere('serial_number', 'like', '%' .$search. '%')
        ->orWhere('year_purchased', 'like', '%' .$search. '%')
        ->orWhere('quantity', 'like', '%' .$search. '%')
        ->orWhere('user', 'like', '%' .$search. '%')
        ->orWhere('created_at', 'like', '%' .$search. '%')
        ->orWhere('updated_at', 'like', '%' .$search. '%')
        ->orWhere('amount', 'like', '%' .$search. '%')->paginate(3);

        $brands = Brand::where('name', 'like', '%' .$search. '%')->paginate(3);
        return view('inventory.index', compact('inventories', 'current_user', 'brands'));
        // return view('inventory.index')->with('inventories', $inventories);

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
            'description' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'model_number' => 'required',
            'serial_number' => 'required|unique:inventories|max:255',
            'year_purchased' => 'required',
            'amount' => 'required',
            'quantity' => 'required',
            'user' => 'required'
        ]);

        // Create New List
        $inventory = new Inventory;
        $inventory->description = $request->input('description');
        $inventory->category_id = $request->input('category_id');
        $inventory->brand_id = $request->input('brand_id');
        $inventory->user_id = auth()->user()->id;
        $inventory->model_number = $request->input('model_number');
        $inventory->serial_number = $request->input('serial_number');
        $inventory->year_purchased = $request->input('year_purchased');
        $inventory->amount = $request->input('amount');
        $inventory->quantity = $request->input('quantity');
        $inventory->user = $request->input('user');
        // $inventory->category = auth()->category()->category;
        $inventory->save();
        
        // Return Back
        return redirect('/inventory')->with('success', 'New Inventory List Created!');

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
        $inventory = Inventory::find($id);
        return view('inventory.show', compact('inventory', 'current_user'));
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
        $inventory = Inventory::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('inventory.edit')->with(compact('inventory', 'categories', 'brands', 'current_user'));
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
            'description' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'model_number' => 'required',
            'serial_number' => 'required',
            'year_purchased' => 'required',
        ]);

        // Create New List
        $inventory = Inventory::find($id);
        $inventory->description = $request->input('description');
        $inventory->category_id = $request->input('category_id');
        $inventory->brand_id = $request->input('brand_id');
        $inventory->model_number = $request->input('model_number');
        $inventory->serial_number = $request->input('serial_number');
        $inventory->year_purchased = $request->input('year_purchased');

        $inventory->save();
        
        // Return Back
        return redirect('/inventory')->with('success', 'Updated Inventory List!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect('/inventory')->with('success', 'Inventory Deleted!');
    }
}
