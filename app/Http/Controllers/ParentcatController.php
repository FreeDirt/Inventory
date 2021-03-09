<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Parentcat;


class ParentcatController extends Controller
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
        $parent_categories = Parentcat::orderBy('id', 'asc')->paginate(10);
        return view('parentCat.index', compact('parent_categories', 'current_user'));
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
        // $user = User::where('id', $userId)->with('roles')->first();
        return view('parentCat.create', compact('current_user'));
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
            'name' => 'required|unique:categories|max:255'
        ]);

        // Create New List
        $parent_category = new Parentcat;
        $parent_category->name = $request->input('name');
        $parent_category->save();
        
        // Return Back
        return redirect('/parentCat')->with('success', 'New Parent Category List Created!');
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
        $parent_category = Parentcat::find($id);
        return view('parentCat.show', compact('parent_category', 'current_user'));
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
        $parent_category = Parentcat::find($id);
        $parent_categories = Parentcat::all();

        // dd( $category);
        return view('parentCat.edit', compact('parent_category', 'current_user','parent_categories'));
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
        $parent_category = Parentcat::find($id);
        $parent_category->name = $request->input('name');
        $parent_category->save();
        
        // Return Back
        return redirect('/parentCat')->with('success', 'Updated category List!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parent_category = Parentcat::find($id);
        $parent_category->delete();
        return redirect('/parentCat')->with('success', 'Parent Category Deleted!');
    }
}
