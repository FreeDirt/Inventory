<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Exports\DevicesExport;
use App\Imports\DevicesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Device;
use App\Category;
use App\Country;
use App\Company;
use App\Brand;
use App\Image;
use App\User;
use App\Parentcat;
use DB;

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
        $brands = Brand::all();
        $companies = Company::all();
        $countries = Country::all();
        $devices = Device::orderBy('created_at', 'desc')->get();
        $images = Image::all();
        $importdevices = Device::orderBy('id', 'desc')->get();
        $parentcats = Parentcat::all();

        return view('device.index', compact('devices', 'current_user','brands', 'importdevices', 'companies', 'countries', 'parentcats','images'));
    }

    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function stockAjax($id)
    {
        $pcategories = DB::table("categories")
                    ->where("parent_cat",$id)
                    ->pluck("name","id");
        return json_encode($pcategories);
    }

     /**
     * Import function
     */
    public function import(Request $request)
    {
        if ($request->file('imported_file')) {
            Excel::import(new DevicesImport(), request()->file('imported_file'));
            return back();
        }
    }


    /**
     * Export function
     */
    public function export()
    {
        return Excel::download(new DevicesExport(), 'devices.xlsx');
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
        $images = Image::all();
        $parentcats = Parentcat::all();
        return view('device.create', compact('categories', 'brands', 'current_user','countries','companies','parentcats', 'images'))->with('success', 'device successfuly created!');
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
            'acquisition' => 'required',
            'cost' => 'required',
            'country_id' => 'required',
            'device_img' => 'image|nullable|max:1999',
        ]);

        if($request->hasFile('device_img')){
            $filenameWithExt = $request->file('device_img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('device_img')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('device_img')->storeAs('public/cover_images', $filenameToStore);
        } elseif($request->has('device_img')) {
            $filenameToStore = $request->input('device_img');
        } else {
            $filenameToStore = 'default.png';
        }

        // Create New List
        $device = new Device;
        $device->deviceCode = $request->input('deviceCode');
        $device->name = $request->input('name');
        $device->model_no = $request->input('model_no');
        $device->brand_id = $request->input('brand_id');
        $device->category_id = $request->input('category_id');
        $device->user_id = auth()->user()->id;
        $device->model_year = $request->input('model_year');
        $device->acquisition = $request->input('acquisition');
        $device->cost = $request->input('cost');
        $device->country_id = $request->input('country_id');
        $device->device_img = $filenameToStore;
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
            'acquisition' => 'required',
            'cost' => 'required',
            'country_id' => 'required',
        ]);

        // Handle File Upload
        if($request->hasFile('device_img')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('device_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // GEt just Extension
            $extension = $request->file('device_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('device_img')->storeAs('public/cover_images', $fileNameToStore);
        } 

      
        // Create New List
        $device = Device::find($id);
        $device->deviceCode = $request->input('deviceCode');
        $device->name = $request->input('name');
        $device->model_no = $request->input('model_no');
        $device->brand_id = $request->input('brand_id');
        $device->category_id = $request->input('category_id');
        $device->model_year = $request->input('model_year');
        $device->acquisition = $request->input('acquisition');
        $device->country_id = $request->input('country_id');
        if($request->hasFile('device_img')){
            $device->device_img = $fileNameToStore;
        }
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
