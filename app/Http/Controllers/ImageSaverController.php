<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\FileUpload;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;



class ImageSaverController extends Controller
{
    public static function singleFileSaverBusiness(Request $request,$stamp){

        $file = Input::file('file');
    
                $save= new FileUpload;

                $save->image_name=$stamp;
    
                  $save->save();
    
                 $rules = array('file' => 'required'); //'required|mimes:jpg,gif,jpeg,txt,pdf,doc'
    
                  $validator = Validator::make(array('file'=> $file), $rules);
                     if($validator->passes()){
                     $location = public_path('img/main/' . $save->id.'.jpg');
                     ImageSaverController::squareSizedImage($file,600,$location);
                    //  $location1 = public_path('img/thumb/' .  $save->id.'.jpg');
                    //  ImageSaverController::squareSizedImage($file,300,$location1);
    
    
             }
    }
    
    
    public static function singleImageSaverMultiple(Request $request,$stamp){
    
        $files = Input::file('file');
    
        foreach ($files as $file) {
            $save= new FileUpload;
            $save->image_name=$stamp;
            $save->save();
    
            $rules = array('file' => 'required'); //'required|mimes:jpg,gif,jpeg,txt,pdf,doc'
    
              $validator = Validator::make(array('file'=> $file), $rules);
                 if($validator->passes()){
                 $location = public_path('img/main/' . $save->id.'.jpg');
                //  Image::make($file)->save($location);
                //  $location1 = public_path('img/thumb/' .  $save->id.'.jpg');
                 $img = Image::make($file);
                 $img->resize(null, 200,function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location1);
    
    
            }
        }  
    
    }

    public static function squareSizedImage($file,$dimension,$location)
    {
                $img = Image::make($file);
                $width  = $img->width();
                $height = $img->height();
                     
                    //canvas
                    $dimension = $dimension;
                    
                    $vertical   = (($width < $height) ? true : false);
                    $horizontal = (($width > $height) ? true : false);
                    $square     = (($width = $height) ? true : false);
                    
                    if ($vertical) {
                        $top = $bottom = 0;
                        $newHeight = ($dimension) - ($bottom + $top);
                        $img->resize(null, $newHeight, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    
                    } else if ($horizontal) {
                        $right = $left = 0;
                        $newWidth = ($dimension) - ($right + $left);
                        $img->resize($newWidth, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    
                    } else if ($square) {
                        $right = $left = 0;
                        $newWidth = ($dimension) - ($left + $right);
                        $img->resize($newWidth, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    
                    }

                $img->encode('png', 75)->resizeCanvas($dimension, $dimension, 'center', false, '#ffffff')->save($location);
    }
}
