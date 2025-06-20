<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Parentcat;
use DB;

class CategoryController extends Controller
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
        // $categories = Category::orderBy('id', 'asc')->paginate(10);
        $parentcats = Parentcat::all();

        

        $categories = DB::table('parentcats')
            ->leftJoin('categories', 'parentcats.id', '=', 'categories.parent_cat')
            ->select(DB::raw('categories.id as catID, categories.name as catName, parentcats.name as parentNAME'))
            // ->groupBy('name')
            // ->paginate(10);
            ->get();
            // dd($categories);
        
        return view('category.index', compact('categories', 'current_user', 'parentcats'));
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
        return view('category.create', compact('current_user'));
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
            'name' => 'required|unique:categories|max:255',
            'parent_cat' => 'required'
        ]);

        // Create New List
        $category = new Category;
        $category->name = $request->input('name');
        $category->parent_cat = $request->input('parent_cat');
        // $category->category = auth()->category()->category;
        $category->save();
        
        // Return Back
        return redirect('/category')->with('success', 'New Category List Created!');
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
        $category = Category::find($id);
        return view('category.show', compact('category', 'current_user'));
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
        $category = Category::find($id);
        $categories = Category::all();

        // dd( $category);
        return view('category.edit', compact('category', 'current_user','categories'));
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
            'parent_cat' => 'required'
        ]);

        // Create New List
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->parent_cat = $request->input('parent_cat');

        $category->save();
        
        // Return Back
        return redirect('/category')->with('success', 'Updated category List!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category')->with('success', 'Category Deleted!');
    }
}
