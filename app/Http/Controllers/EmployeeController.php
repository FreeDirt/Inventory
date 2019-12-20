<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Employee;

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
        return view('employee.create', compact('current_user'));
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
            'company_no' => 'required|max:255',
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
        // $employee->user_id = auth()->user()->id;
        $employee->personal_no = $request->input('personal_no');
        $employee->company_no = $request->input('company_no');
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
        return view('employee.edit')->with(compact('employee', 'current_user'));
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
            'company_no' => 'required',
            'address' => 'required',
            'city' => 'required',
            'region' => 'required',
            'postal_code' => 'required',
            'employee_no' => 'required',
            'gender' => 'required',
        ]);

        // Create New List
        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->bday = $request->input('bday');
        $employee->user_id = auth()->user()->id;
        $employee->personal_no = $request->input('personal_no');
        $employee->company_no = $request->input('company_no');
        $employee->address = $request->input('address');
        $employee->city = $request->input('city');
        $employee->region = $request->input('region');
        $employee->postal_code = $request->input('postal_code');
        $employee->employee_no = $request->input('employee_no');
        $employee->gender = $request->input('gender');
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
        $employee->delete();
        return redirect('/employee')->with('success', 'Employee Deleted!');
    }
}
