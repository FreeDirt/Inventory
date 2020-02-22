<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
        $current_userId = auth()->user()->id;
        $current_user = User::find($current_userId);
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.index', compact('current_user', 'users'));
        // return view('admin.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_userId = auth()->user()->id;
        $current_user = User::find($current_userId);
        $roles = Role::all();
        return view('admin.create', compact('current_user', 'roles'));
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
            'email' => 'required',
            'password' => 'required'
        ]);

        
        // Create New List
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $user->roles()->attach(Role::where('name', $request->input('roleId'))->first());
        Auth::login($user);
        return redirect('/admin')->with('success', 'Created a New User!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $current_userId = auth()->user()->id;
        $current_user = User::find($current_userId);
        $user = User::find($id);
        return view('admin.show', compact('current_user'))->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current_userId = auth()->user()->id;
        $current_user = User::find($current_userId);
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.edit', compact('user', 'roles', 'current_user'));
        // return view('admin.edit')->with('user', $user);
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
            'email' => 'email'
        ]);

        // Create New List
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->roles()->detach();
        $user->roles()->attach(Role::where('name', $request->input('roleId'))->first());
        $user->save();
        
        // Return Back
        return redirect('/admin')->with('success', 'Updated User List!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin')->with('success', 'User Deleted!');
    }
}
