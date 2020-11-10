<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Category;
use App\Country;
use App\Company;
use App\Brand;
use App\User;

class DeviceController extends Controller
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
        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);
        $devices = Device::orderBy('created_at', 'desc')->paginate(10);

        // $inventories = Inventory::all();
        // $inventories = Inventory::where('title', '*name of the item')->get();
        // $inventories = DB::select('SELECT * FROM inventories');
        // $inventories = Inventory::orderBy('description', 'desc')->get();
        // $inventories = Inventory::orderBy('description', 'desc')->take(1)->get();
        // $categories = Category::all();
        //  foreach($categories as $category) {
        //     $category->monitor = Device::orderBy('name', 'desc')->where('category_id', $category->id)->get();
        // }

        // if ($user = Device::where('category_id', '=', Category::get('id'))->exists()) {
        //     dd($user);
        //  }

        return view('device.index', compact('devices', 'current_user'));
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
        $countries = Country::all();
        $companies = Company::all();
        return view('device.create', compact('categories', 'brands', 'current_user','countries','companies'))->with('success', 'device successfuly created!');
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
            'deviceCode' => 'required',
            'name' => 'required',
            'model_no' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'model_year' => 'required',
            'cost' => 'required',
            'country_id' => 'required',
        ]);

        // Create New List
        $device = new Device;
        $device->deviceCode = $request->input('deviceCode');
        $device->name = $request->input('name');
        $device->model_no = $request->input('model_no');
        $device->brand_id = $request->input('brand_id');
        $device->category_id = $request->input('category_id');
        $device->user_id = auth()->user()->id;
        $device->model_year = $request->input('model_year');
        $device->cost = $request->input('cost');
        $device->country_id = $request->input('country_id');
        // $device->category = auth()->category()->category;
        $device->save();
        
        // Return Back
        return redirect('/device')->with('success', 'New Device List Created!');
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
        $device = Device::find($id);
        return view('device.show', compact('device', 'current_user'));
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
        $device = Device::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $companies = Company::all();
        $countries = Country::all();
        return view('device.edit')->with(compact('device', 'categories', 'brands', 'current_user', 'companies', 'countries'));
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
            'deviceCode' => 'required',
            'name' => 'required',
            'model_no' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'model_year' => 'required',
            'cost' => 'required',
            'country_id' => 'required',
        ]);

        // Create New List
        $device = Device::find($id);
        $device->deviceCode = $request->input('deviceCode');
        $device->name = $request->input('name');
        $device->model_no = $request->input('model_no');
        $device->brand_id = $request->input('brand_id');
        $device->category_id = $request->input('category_id');
        $device->model_year = $request->input('model_year');
        $device->country_id = $request->input('country_id');

        $device->save();
        
        // Return Back
        return redirect('/device')->with('success', 'Updated Device List!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::find($id);
        $device->delete();
        return redirect('/device')->with('success', 'Device Deleted!');
    }
}
