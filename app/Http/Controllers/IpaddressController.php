<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ipaddress;
use App\User;

class IpaddressController extends Controller
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
        $ipaddresses = Ipaddress::orderBy('created_at', 'desc')->paginate(10);
        return view('ipaddress.index', compact('ipaddresses', 'current_user'));
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
        return view('ipaddress.create', compact('current_user'));
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
            'ip' => 'required|unique:ipaddresses',
            'description' => 'required'
        ]);

        // Create New List
        $ipaddress = new Ipaddress;
        $ipaddress->ip = $request->input('ip');
        $ipaddress->description = $request->input('description');
        // $ipaddress->ipaddress = auth()->ipaddress()->ipaddress;
        $ipaddress->save();
        
        // Return Back
        return redirect('/ipaddress')->with('success', 'New Ipaddress List Created!');
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
        $ipaddress = Ipaddress::find($id);
        return view('ipaddress.show', compact('ipaddress', 'current_user'));
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
        $ipaddress = Ipaddress::find($id);
        return view('ipaddress.edit', compact('ipaddress', 'current_user'));
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
            'ip' => 'required',
            'description' => 'required'
        ]);

        // Create New List
        $ipaddress = Ipaddress::find($id);
        $ipaddress->ip = $request->input('ip');
        $ipaddress->description = $request->input('description');

        $ipaddress->save();
        
        // Return Back
        return redirect('/ipaddress')->with('success', 'Updated Ipaddress List!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ipaddress = Ipaddress::find($id);
        $ipaddress->delete();
        return redirect('/ipaddress')->with('success', 'Ipaddress Deleted!');
    }
}
