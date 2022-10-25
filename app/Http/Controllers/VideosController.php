<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index() {
        $directory = "img/thumbnail";
        $images = glob($directory . "/*.jpg");
    
        return view('videosIndex', ['images' => $images]);
    }
    
    public function video($codigodovideo) {
        $directory = "videos";
        $video = glob($directory . "/*$codigodovideo*")[0];
        return  view('video', ['video' => $video]);
    }  
    
    public function upload() {
        return view('upload');
     }

    public function store(Request $request)
    {
        if ($request->hasFile('fileVideo')) {
            $file = $request->file('fileVideo');
            // dd($file);
            // $file = $request->fileVideo;

            // $path = $request->fileVideo->path();
 
            $extension = $request->fileVideo->extension();

            $request->fileVideo->storeAs('videos', $nomeVideo . '.jpg');
            
            return back();
        }
 
        
    }

}
