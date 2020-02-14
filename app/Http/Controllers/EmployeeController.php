<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Company;
use App\Country;
use App\Designation;
use App\Department;
use App\Employee;
use App\Ipaddress;
use App\User;

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
    public function index()
    {
        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);
        $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        return view('employee.index', compact('employees', 'current_user'));
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
        return view('employee.create', compact('current_user', 'companies', 'designations','departments','ipaddresses','countries'));
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
            'bday' => 'required',
            'personal_no' => 'required|max:255',
            'department_id' => 'nullable',
            'designation_id' => 'nullable',
            'company_id' => 'nullable',
            'ipaddress_id' => 'nullable',
            'company_no' => 'required|max:255',
            'country_id' => 'nullable',
            'address' => 'required',
            'city' => 'required',
            'region' => 'required',
            'postal_code' => 'required',
            'employee_no' => 'required',
            'gender' => 'required',
            'cover_image' => 'image|nullable|max:1999',
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
        } else {
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
        return view('employee.show', compact('employee', 'current_user'));
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
        $countries = Country::all();
        return view('employee.edit')->with(compact('employee', 'current_user', 'companies','designations','departments','ipaddresses','countries'));
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
            'bday' => 'required',
            'personal_no' => 'required',
            'department_id' => 'nullable',
            'designation' => 'nullable',
            'company_id' => 'nullable',
            'ipaddress_id' => 'nullable',
            'company_no' => 'required',
            'country_id' => 'nullable',
            'address' => 'required',
            'city' => 'required',
            'region' => 'required',
            'postal_code' => 'required',
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
