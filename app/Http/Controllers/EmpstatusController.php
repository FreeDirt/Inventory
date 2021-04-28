<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empstatus;
use App\User;

class EmpstatusController extends Controller
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
        $empstatuses = Empstatus::all();

        return view('empstatus.index', compact('empstatuses', 'current_user'));
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
        return view('empstatus.create', compact('current_user'));
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
            'status' => 'required',
        ]);

        // Create New List
        $emptatus = new Empstatus;
        $emptatus->status = $request->input('status');
        $emptatus->save();
        
        // Return Back
        return redirect('/emptatus')->with('success', 'New status List Created!');
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
        $emptatus = Emptatus::find($id);
        return view('emptatus.show', compact('emptatus', 'current_user'));
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
        $empstatus = Empstatus::find($id);
        $empstatuses = Empstatus::all();

        // dd( $empstatus);
        return view('empstatus.edit', compact('empstatus', 'current_user','empstatuses'));
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
            'status' => 'required'
        ]);

        // Create New List
        $empstatus = Empstatus::find($id);
        $empstatus->status = $request->input('status');
        $empstatus->save();
        
        // Return Back
        return redirect('/empstatus')->with('success', 'Updated EmpStatus List!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empstatus = Empstatus::find($id);
        $empstatus->delete();
        return redirect('/empstatus')->with('success', 'EmpStatus Deleted!');
    }
}
