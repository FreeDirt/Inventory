<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Company;
use App\Country;
use App\Category;
use App\Designation;
use App\Department;
use App\Device;
use App\Employee;
use App\Ipaddress;
use App\Image;
use App\User;
use App\Stock;
use DB;

class EmployeeController extends Controller
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

    // public function submit(Request $res)
    // {
    //     return new User([
    //         'name'     => $row[0],
    //         'email'    => $row[1], 
    //         'password' => Hash::make($row[2]),
    //      ]);
    // }


    public function index(Request $request)
    {
        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);
        // $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        $employees = Employee::all();
        $importemployees = Employee::orderBy('id', 'desc')->get();

        // $employee->device = Stock::where('employee_id', $employee)->get();
        // $employee->phpCategories =  Category::where('categories.id', $employee->category_id)->distinct()->get();
        // $employee->device = DB::table('stocks')->where('employee_id', $employee->id)
        //                     ->join('employees', 'employees.id', '=', 'stocks.employee_id')
        //                     ->join('devices', 'devices.id', '=', 'stocks.device_id')
        //                     ->get();

        // dd($employee->device);
        if ($request->ajax()) {
            return view('employee.index', compact('employees', 'current_user','importemployees'));
        }

        return view('employee.index', compact('employees', 'current_user','importemployees'));
    }

    /**
     * Import function
     */
    public function import(Request $request)
    {
        if ($request->file('imported_file')) {
            Excel::import(new EmployeesImport(), request()->file('imported_file'));
            return back();
        }
    }


    /**
     * Export function
     */
    public function export()
    {
        return Excel::download(new EmployeesExport(), 'employees.xlsx');
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
        $companies = Company::all();
        $designations = Designation::all();
        $departments = Department::all();
        $ipaddresses = Ipaddress::all();
        $countries = Country::all();
        $images = Image::all();
        return view('employee.create', compact('current_user', 'companies', 'designations','departments','ipaddresses','countries', 'images'));
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
            'name' => 'required',
            'email' => 'required|unique:employees',
            'bday' => 'nullable',
            'personal_no' => 'nullable|max:255',
            'department_id' => 'nullable',
            'designation_id' => 'nullable',
            'company_id' => 'nullable',
            'ipaddress_id' => 'nullable',
            'company_no' => 'nullable|max:255',
            'country_id' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'region' => 'nullable',
            'postal_code' => 'nullable',
            'employee_no' => 'required',
            'gender' => 'required',
            'cover_image' => 'sometimes|nullable|max:1999',
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // GEt just Extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            
        } elseif($request->has('cover_image'))  {
            $fileNameToStore = $request->input('cover_image');
        }
        else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create New List
        $employee = new Employee;
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->bday = $request->input('bday');
        $employee->user_id = auth()->user()->id;
        $employee->personal_no = $request->input('personal_no');
        $employee->department_id = $request->input('department_id');
        $employee->designation_id = $request->input('designation_id');
        $employee->company_id = $request->input('company_id');
        $employee->ipaddress_id = $request->input('ipaddress_id');
        $employee->company_no = $request->input('company_no');
        $employee->country_id = $request->input('country_id');
        $employee->address = $request->input('address');
        $employee->city = $request->input('city');
        $employee->region = $request->input('region');
        $employee->postal_code = $request->input('postal_code');
        $employee->employee_no = $request->input('employee_no');
        $employee->gender = $request->input('gender');
        $employee->cover_image = $fileNameToStore;
        // employeey->category = auth()->category()->category;
        $employee->save();
        
        // Return Back
        return redirect('/employee')->with('success', 'New Employee List Created!');
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
        $employee = Employee::find($id);
        $categories = Category::all()->pluck('name');
        $department = Department::where('id', $employee->department_id)->pluck('name')->first();
        $designation = Designation::where('id', $employee->designation_id)->pluck('name')->first();

        // $designation = $employee->designation_id;

        // dd($designation);

        $stocks = Stock::all();

        $employeeDevices = DB::table('stocks')->where('employee_id', $id)
        ->leftJoin('devices', 'devices.id', '=', 'stocks.device_id')
        ->leftJoin('categories', 'categories.id', '=', 'devices.category_id')
        ->select(DB::raw('categories.name as catName, categories.sub_cat as sub_cat, employee_id as empID, devices.name as devName, serial as deviceSerial, stocks.created_at as dateAdded'))
        ->orderBy('categories.sub_cat', 'asc')
        // ->groupBy('stocks.device_id')
        ->get()->toArray();

        // dd($devCounts);



        // $employeeDevices = DB::table('stocks')->where('employee_id', $id)
        // ->join('devices', 'devices.id', '=', 'stocks.device_id')
        // ->join('categories', 'devices.category_id', '=', 'categories.id')
        // ->pluck('serial','categories.name');



    //    $employeeDevices = DB::select('call peremployee(?)',array($id));
    //    DB::select('exec peremployee(?)',array($id));


        // ->get();

        // dd($employeeDevices);

        // foreach($stocks as $stock) {
        //     $stock->catcounts = DB::table('stocks')->where('employee_id', $id)
        //     ->join('devices', 'devices.id', '=', 'stocks.device_id')
        //     ->join('categories', 'devices.category_id', '=', 'categories.id')
        //     ->select('devices.category_id')
        //     // ->get()->pluck('name');
        //     ->get();

        //     dd($stock->catcounts);
        // }

        // $devCounts = DB::table('Stocks')
        // ->leftJoin('devices', 'devices.id', '=', 'stocks.device_id')
        // ->leftJoin('categories', 'categories.id', '=', 'devices.category_id')
        // ->where('employee_id', $id)
        // ->select(DB::raw('ifnull(count(serial),0) as seCount, categories.name as catNames, count(employee_id) as empTotal'))
        // ->groupBy('category_id')
        // ->get();

        // dd($devCounts);






        // var_dump(array_search('Monitor',$employeeDevices));
        
                
        // foreach ($employeeDevices as $empDev) {
        //          $empDev->laptop = Category::select('id')->where('name', 'Laptop')->first();
        //     if($empDev->category_id == $empDev->laptop) {
        //         dd($empDev->serial);
        //     } else {
        //         echo 'N/A';
        //     }
        // }

        // DB::table('users')->where('username', $user_input)->first();

        // dd( $employeeDevices);

        // foreach($employeeDevices as $empDev => $key) {
        //     if($empDev == "Laptop") {
        //         dd($key);
        //     }
        // }
    

        return view('employee.show', compact('employee', 'current_user', 'employeeDevices', 'department', 'designation'));
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
        $employee = Employee::find($id);
        $companies = Company::all();
        $designations = Designation::all();
        $departments = Department::all();
        $ipaddresses = Ipaddress::all();
        $images = Image::all();
        $countries = Country::all();
        
        return view('employee.edit')->with(compact('employee', 'current_user', 'companies','designations','departments','ipaddresses','images','countries'));
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
            'name' => 'required',
            'email' => 'email',
            'bday' => 'nullable',
            'personal_no' => 'required',
            'department_id' => 'nullable',
            'designation' => 'nullable',
            'company_id' => 'nullable',
            'ipaddress_id' => 'nullable',
            'company_no' => 'nullable',
            'country_id' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'region' => 'nullable',
            'postal_code' => 'nullable',
            'employee_no' => 'required',
            'gender' => 'required',
        ]);

         // Handle File Upload
         if($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // GEt just Extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } 

        // Create New List
        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->bday = $request->input('bday');
        $employee->user_id = auth()->user()->id;
        $employee->personal_no = $request->input('personal_no');
        $employee->department_id = $request->input('department_id');
        $employee->designation_id = $request->input('designation_id');
        $employee->company_id = $request->input('company_id');
        $employee->ipaddress_id = $request->input('ipaddress_id');
        $employee->company_no = $request->input('company_no');
        $employee->country_id = $request->input('country_id');
        $employee->address = $request->input('address');
        $employee->city = $request->input('city');
        $employee->region = $request->input('region');
        $employee->postal_code = $request->input('postal_code');
        $employee->employee_no = $request->input('employee_no');
        $employee->gender = $request->input('gender');
        if($request->hasFile('cover_image')){
            $employee->cover_image = $fileNameToStore;
        }
        $employee->save();
        
        // Return Back
        return redirect('/employee')->with('success', 'Updated Employee List!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if($employee->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$employee->cover_image);
        }

        $employee->delete();
        return redirect('/employee')->with('success', 'Employee Deleted!');
    }
}
