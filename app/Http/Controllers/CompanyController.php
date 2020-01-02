<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;

class CompanyController extends Controller
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
        $companies = Company::orderBy('id', 'asc')->paginate(10);
        return view('company.index', compact('companies', 'current_user'));
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
        return view('company.create', compact('current_user'));
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
            'name' => 'required|unique:companies|max:255'
        ]);

        // Create New List
        $company = new company;
        $company->name = $request->input('name');
        // $company->company = auth()->company()->company;
        $company->save();
        
        // Return Back
        return redirect('/company')->with('success', 'New Company List Created!');
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
        $company = Company::find($id);
        return view('company.show', compact('company', 'current_user'));
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
        $company = Company::find($id);
        return view('company.edit', compact('company', 'current_user'));
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
            'name' => 'required'
        ]);

        // Create New List
        $company = Company::find($id);
        $company->name = $request->input('name');

        $company->save();
        
        // Return Back
        return redirect('/company')->with('success', 'Updated Company List!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect('/company')->with('success', 'Company Deleted!');
    }
}
