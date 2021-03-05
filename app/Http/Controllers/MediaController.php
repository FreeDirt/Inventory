<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;

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

        $images = Image::all();

        return view('media.index', compact('current_user', 'images'));
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
        $input = $request->all();

        $file = $request->file('file');

        // Handle File Upload
        if($file) {
            // Get filename with the extension
            $filenameWithExt = $file->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get fileSize
            $filesize = $file->getClientSize();
            // GEt just Extension
            $extension = $file->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $file->storeAs('public/cover_images', $fileNameToStore);

            $multi_images = Image::create([
                'image_title' => $filenameWithExt,
                'image_name' => $fileNameToStore,
                'image_size' => $filesize,
                'image_extension' => $extension
            ]);

            if ($multi_images) {
                return redirect('/media')->with('success', 'Photo Uploaded');
            }
        } 

        // if($file) {
        //     // Get filename with the extension
        //     $filename = $file->getClientOriginalName();
        //     // Get fileSize
        //     $filesize = $file->getClientSize();
        //     // GEt just Extension
        //     $extension = $file->getClientOriginalExtension();
        //     // Filename to store
        //     $file_title = time().'.'.$extension;
        //     // Upload Image
        //     $path = $file->storeAs('public/cover_images', $file_title);
        //     $file->move('public/cover_images' , $file_title);

        //     $multi_images = Image::create([
        //         'image_title' => $file_title,
        //         'image_name' => $filename,
        //         'image_size' => $filesize,
        //         'image_extension' => $extension
        //     ]);

        //     if ($multi_images) {
        //         echo "true";
        //     }
        // } 

        // return redirect('/media')->with('success', 'Images Uploaded');
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
