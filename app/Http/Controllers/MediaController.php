<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MediaController extends Controller
{
    /** 
     * Generate Upload View 
     * 
     * @return void 

    */  

    public  function upload()  
    {  
        return view('upload-view');  
    }  

    /** 
     * File Upload Method 
     * 
     * @return void 
     */  

    public  function uploadFile(Request $request)  
    {  
        $file = $request->file('file');  
        $fileName = time().'.'.$file->extension(); 
        $file->move(public_path('file'),$fileName);  

    return response()->json(['success'=>$fileName]);  

    }  
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);

        return view('media.index', compact('current_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
