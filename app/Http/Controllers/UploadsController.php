<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Gallery;
//use Input;
use Illuminate\Support\Facades\Input;
use DB;
use File;

class UploadsController extends BaseController {


    public function upload() {

        $file = Input::file('file');

        $name = time() . '-' .$file->getClientOriginalName();

        $file->move(public_path().'/uploads/', $name);

        $path = url('/uploads/'. $name);

        $array = array(
            'filelink' => $path
        );
        
        echo stripslashes(json_encode($array));
        
        // echo "<img src='$path' />";
    }


    public function deleteFile() {

        $file = Input::get('file_url');
        $file = parse_url(json_decode($file),PHP_URL_PATH);
        $file_path=public_path().$file;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    public function getImages()
    {

        $galleries = Gallery::where('type','photos')->with('photos')->get();
        $array = array();
        foreach($galleries as $gallery){
            
         foreach ($gallery->photos as $m) {
           $array[] = array(
              'filelink' => url($m->image()),
              'thumb' => url($m->image('thumb')),
              'image' => url($m->image()),
          );
       }
   }

   echo stripslashes(json_encode($array));

}

public function upload_file(Request $request){

    $file = $request->file('file');

    $name = $file->getClientOriginalName();

    $file->move(public_path().'/uploads/files/', $name);

    $array = array(
        'filelink' => asset('/uploads/files/'.$name),
        'filename' => self::getFileName($name)
    );
    
        //echo stripslashes(json_encode($array));

}

public function getFiles()
{
    $path = public_path().'/uploads/files';

    $files = array_values(array_filter(scandir($path), function($file) {
        return !is_dir($file);
    }));
    $array=array();
    foreach ($files as $file) {

     $array[] = array(
                'title' => self::getFileName($file), //some image
                'name' => $file, //image.jpg
                'link' => asset('/uploads/files/'.$file), //link
                'size' => self::fileSizer(File::size($path.'/'.$file)), //size
            );
 }

 echo stripslashes(json_encode($array));

}

public static function fileSizer($size){
    
    $size = $size/1024;
    if(round($size) >= 1024){
        return round($size/(1024))." Mb";
    } else {
        return round($size)." Kb";
    }

}

public static function getFileName($file){
    $position = strripos($file,'.');
    $filename = substr($file,0,($position));
    
    $filename = strtolower(str_replace('-',' ', str_replace('_', ' ', $filename)));
    return $filename;
}

}