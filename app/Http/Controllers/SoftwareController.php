<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Software;

class SoftwareController extends Controller
{  /**
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

        $softwares = Software::all();

        return view('software.index', compact( 'current_user', 'softwares'));
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
        
        return view('software.create', compact('current_user'));
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
            'name' => 'required|unique:software',
            'description' => 'nullable',
            'version' => 'nullable',
            'developer' => 'nullable',
            'website' => 'nullable',
            'software_img' => 'image|nullable|max:1999',
        ]);

        if($request->hasFile('software_img')){
            $filenameWithExt = $request->file('software_img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('software_img')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('software_img')->storeAs('public/cover_images', $filenameToStore);
        } elseif($request->has('software_img')) {
            $filenameToStore = $request->input('software_img');
        } else {
            $filenameToStore = 'default.png';
        }

        // Create New List
        $software = new Software;
        $software->name = $request->input('name');
        // $software->software = auth()->software()->software;
        $software->software_img = $filenameToStore;
        $software->save();
        
        // Return Back
        return redirect('/software')->with('success', 'New Sofware List Created!');
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
        $software = Software::find($id);
        return view('software.show', compact('software', 'current_user'));
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
        $software = Software::find($id);
        $softwares = Software::all();

        // dd( $software);
        return view('software.edit', compact('software', 'current_user','softwares'));
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
            'description' => 'nullable',
            'version' => 'nullable',
            'developer' => 'nullable',
            'website' => 'nullable',
        ]);

         // Handle File Upload
         if($request->hasFile('software_img')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('software_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // GEt just Extension
            $extension = $request->file('software_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('software_img')->storeAs('public/cover_images', $fileNameToStore);
        } 

        // Create New List
        $software = Software::find($id);
        $software->name = $request->input('name');
        if($request->hasFile('software_img')){
            $software->software_img = $fileNameToStore;
        }

        $software->save();
        
        // Return Back
        return redirect('/software')->with('success', 'Updated Software List!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $software = Software::find($id);
        $software->delete();
        return redirect('/software')->with('success', 'software Deleted!');
    }
}
