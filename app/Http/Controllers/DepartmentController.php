<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\User;

class DepartmentController extends Controller
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
        $departments = Department::orderBy('created_at', 'desc')->paginate(10);
        return view('department.index', compact('departments', 'current_user'));
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
        return view('department.create', compact('current_user'));
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
            'name' => 'required|unique:brands|max:255',
            'description' => 'required'
        ]);

        // Create New List
        $department = new Department;
        $department->name = $request->input('name');
        $department->description = $request->input('description');
        // $department->department = auth()->department()->department;
        $department->save();
        
        // Return Back
        return redirect('/department')->with('success', 'New Department List Created!');
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
        $department = Department::find($id);
        return view('department.show', compact('department', 'current_user'));
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
        $department = Department::find($id);
        return view('department.edit', compact('department', 'current_user'));
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
            'description' => 'required'
        ]);

        // Create New List
        $department = Department::find($id);
        $department->name = $request->input('name');
        $department->description = $request->input('description');

        $department->save();
        
        // Return Back
        return redirect('/department')->with('success', 'Updated Department List!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect('/department')->with('success', 'Department Deleted!');
    }
}
