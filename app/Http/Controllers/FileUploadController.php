<?php

namespace App\Http\Controllers;

use App\FileUpload;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image = FileUpload::latest()->first();
        return view('FileUpload.createimage', compact('image'));
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // $this->validate($request, [
    //     //     'image_name' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
    
    //     //  ]);
    //     $originalImage= $request->file('image_name');
    //     $originalPath = public_path().'/images/';
      
    //     $imagemodel= new FileUpload();
    //     $imagemodel->image_name=time().$originalImage->getClientOriginalName();
    //     $imagemodel->save();

    //     return back()->with('success', 'Your images has been successfully Upload');
    // }


    public static function sliderMultipleImage(Request $request,$stamp,$name){

        $files = Input::file($name);
    
        foreach ($files as $file) {
            $save= new FileData;
    
            $save->timestamp=$stamp;
    
            $save->save();
    
            $rules = array('file' => 'required'); //'required|mimes:jpg,gif,jpeg,txt,pdf,doc'
    
              $validator = Validator::make(array('file'=> $file), $rules);
                 if($validator->passes()){
                 $location = public_path('img/main/' . $save->id.'.jpg');
                 $main_img = Image::make($file);
                 $main_img->resize(600, 300,function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);
                 $location1 = public_path('img/thumb/' .  $save->id.'.jpg');
                 $img = Image::make($file);
                 $img->resize(300, 150,function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location1);
    
    
            }
        }  
    
    }

        

    /**
     * Display the specified resource.
     *
     * @param  \App\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function show(FileUpload $fileUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function edit(FileUpload $fileUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileUpload $fileUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileUpload $fileUpload)
    {
        //
    }
}
