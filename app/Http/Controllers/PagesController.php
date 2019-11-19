<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;

use Illuminate\Http\Request;

class PagesController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    
    public function gethome(){
        $id = auth()->user()->id;
        $current_user = User::find($id);
        return view('dashboard')->with('current_user', $current_user);
    }

    // public function inventory(){
    //     return view('inventory');
    // }

    public function tblist(){
        $id = auth()->user()->id;
        $current_user = User::find($id);
        return view('tblist')->with('current_user', $current_user);
    }

    public function contact(){
        $id = auth()->user()->id;
        $current_user = User::find($id);
        return view('contact')->with('current_user', $current_user);
    }
}
